<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Partner;
use App\BarangTukars;
use Illuminate\Support\Facades\Storage;
use App\Terms;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index() {
     	if (Auth::check()) {
             $data['barangs'] = BarangTukars::where('id_user', '=', Auth::id())->get();

             return view('chat/show_my_item', $data);
         } else {
             return view('welcome');
         }
     }

     public function viewMessage() {
        $partners = Auth::user()->partners();
        return view('chat/index')->with('partners', $partners);;
     }

     public function viewBarang(Request $req) {
     	$id_barang = $req->get('id');
     	$data['barang_detail'] = BarangTukars::find($id_barang);
     	return view('view_barang', $data);
     }

     public function viewMyBarang(Request $req) {
            $id = $req->get('id');
             $data['barang_detail'] = BarangTukars::where('id_user', $id)->get();
             $data['id_owner'] = $_GET['id_owner'];
             $data['id_good'] = $_GET['id_good'];



             $isPartner = Partner::where('user_id',Auth::user()->id)->where('partner_id',$data['id_owner'])->first();

             if(!$isPartner){
               $newPartner = new Partner;
               $newPartner->user_id = Auth::user()->id;
               $newPartner->partner_id = $data['id_owner'];
               $newPartner->save();
               $newPartner1 = new Partner;
               $newPartner1->user_id = $data['id_owner'];
               $newPartner1->partner_id = Auth::user()->id;
               $newPartner1->save();
             }




             return view('chat/show_my_item', $data);
     }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $terms = Terms::find(1);
        $id = $_GET['id_owner'];

        $isAccepted;
        $partner = User::find($id);




        $flag = isset($_GET["id_user_good"]);
        if($flag) {
          $id_user_good = $_GET['id_user_good'];
          $id_good = $_GET['id_good'];



          $isExistTransaction1 = Transaksi::where('user_1',Auth::user()->id)->
              where('user_2',$id)->where('id_barang_1',$id_user_good)->
              where('id_barang_2',$id_good)->first();
          $isExistTransaction2 = Transaksi::where('user_2',Auth::user()->id)->
              where('user_1',$id)->where('id_barang_2',$id_user_good)->
              where('id_barang_1',$id_good)->first();

          if($isExistTransaction1 == null && $isExistTransaction2 == null) {
            $transaksi = new Transaksi;
            $transaksi->user_1 = Auth::user()->id;
            $transaksi->user_2 = $id;
            $transaksi->id_barang_1 = $id_user_good;
            $transaksi->id_barang_2 = $id_good;
            $transaksi->user_1_acc = 0;
            $transaksi->user_2_acc = 0;
            $transaksi->save();
            $isAccepted = false;
          } else {
            $isUser1 = Transaksi::where("user_1",Auth::user()->id)->where("user_2",$id)->where("id_barang_1", $id_user_good)->
            where("id_barang_2", $id_good)->first();

            if($isUser1 != null){
              $transaksi_1 = Transaksi::where("user_1",Auth::user()->id)->
                                          where("user_2",$id)->
                                        where("id_barang_1", $id_user_good)->
                                      where("id_barang_2", $id_good)->first();
             if($transaksi_1->user_1_acc == 1){
                 $isAccepted = true;
             }else {
               $isAccepted = false;
             }


            } else {
              $transaksi_2 = Transaksi::where("user_2",Auth::user()->id)->
                                          where("user_1",$id)->
                                        where("id_barang_2", $id_user_good)->
                                      where("id_barang_1", $id_good)->first();
              if($transaksi_2->user_2_acc == 1){
                $isAccepted = true;
              } else {
                $isAccepted = false;
              }

            }
          }


          return view('chat/show')->with('partner', $partner)->with('flag', $flag)->
                                    with('id_user_good', $id_user_good)->
                                    with('id_good', $id_good)->with('isAccepted',$isAccepted)->
                                    with('terms', $terms);
        } else {
          $getTransaksi = Transaksi::where("user_2",Auth::user()->id)->
                                      where("user_1",$id)->first();
        $getTransaksi2 = Transaksi::where("user_1",Auth::user()->id)->
                                    where("user_2",$id)->first();
         if($getTransaksi != null){
           $id_user_good = $getTransaksi->id_barang_2;
           $id_good = $getTransaksi->id_barang_1;
           $transaksi_2 = Transaksi::where("user_2",Auth::user()->id)->
                                       where("user_1",$id)->
                                     where("id_barang_2", $id_user_good)->
                                   where("id_barang_1", $id_good)->first();
           if($transaksi_2->user_2_acc == 1){
             $isAccepted = true;
           } else {
             $isAccepted = false;
           }
           $flag = true;
           return view('chat/show')->with('partner', $partner)->with('flag', $flag)->
                                     with('id_user_good', $id_user_good)->
                                     with('id_good', $id_good)->with('isAccepted',$isAccepted);
         } elseif (  $getTransaksi2 != null) {
           $id_user_good = $getTransaksi2->id_barang_1;
           $id_good = $getTransaksi2->id_barang_2;
           $transaksi_2 = Transaksi::where("user_1",Auth::user()->id)->
                                       where("user_2",$id)->
                                     where("id_barang_1", $id_user_good)->
                                   where("id_barang_2", $id_good)->first();
           if($transaksi_2->user_1_acc == 1){
             $isAccepted = true;
           } else {
             $isAccepted = false;
           }
           $flag = true;
           return view('chat/show')->with('partner', $partner)->with('flag', $flag)->
                                     with('id_user_good', $id_user_good)->
                                     with('id_good', $id_good)->with('isAccepted',$isAccepted)->
                                     with('terms', $terms);
         }else {
           return view('chat/show')->with('partner', $partner)->with('flag', $flag)->
                                     with('terms', $terms);
         }


        }




    }

    public function showPartner($id){

      $partner = User::find($id);
      return view('chat.showPartner')->with('partner',$partner);


        $terms = Terms::find(1);
        return view('chat/show')->with('partner', $partner)
                                ->with('terms', $terms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function getChat($id){


        $chats = Chat::where(function ($query) use ($id) {
          $query->where('user_id', '=', Auth::user()->id)->where('partner_id' , '=' , $id);
        })->orWhere(function ($query) use ($id) {
          $query->where('user_id', '=', $id)->where('partner_id' , '=' , Auth::user()->id);
        })->get();

        return $chats;
    }


    public function sendChat(Request $request) {
        Chat::create([
            'user_id' => $request->user_id,
            'partner_id' => $request->partner_id,
            'chat' => $request->chat
        ]);

        return [];
    }
}
