<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BarangTukars;
use Illuminate\Support\Facades\Storage;

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
        //
        $id = $_GET['id_owner'];
        $data['id'] = $_GET['id_owner'];
        $data['id_user'] = $_GET['id'];
        $data['id_user_good'] = $_GET['id_user_good'];
        $data['id_good'] = $_GET['id_good'];
        $partner = User::find($id);

        return view('chat/show')->with('partner', $partner);
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
      $id_owner = $_GET['id_owner'];
      $data['id_user_good'] = $_GET['id_user_good'];

      $data['id_good'] = $_GET['id_good'];
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
