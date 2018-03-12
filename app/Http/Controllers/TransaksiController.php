<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\BarangTukars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function sendTransaction() {

        $user = Auth::user()->id;
        $id = $_GET['id'];
        $id_user_good = $_GET['id_user_good'];
        $id_good = $_GET['id_good'];

        $isUser1 = Transaksi::where("user_1",$user)->where("user_2",$id)->
                        where("id_barang_1", $id_user_good)->
                        where("id_barang_2", $id_good)->first();

        $isAccepted;

        if($isUser1 !=null){
          $transaksi1 = Transaksi::where("user_1",$user)->
                                      where("user_2",$id)->
                                    where("id_barang_1", $id_user_good)->
                                  where("id_barang_2", $id_good)->first();


          $isAccepted = ($transaksi1->user_1_acc == 1);
          if($isAccepted){

          } else {
            $transaksi1->user_1_acc = 1;
            $transaksi1->save();
          }

          if($transaksi1->user_2_acc == 1){
            // delete item
            BarangTukars::where("id",$id_user_good)->delete();
            BarangTukars::where("id",$id_good)->delete();
          }

        } else {
          $transaksi2 = Transaksi::where("user_2",$user)->
                                      where("user_1",$id)->
                                    where("id_barang_2", $id_user_good)->
                                  where("id_barang_1", $id_good)->first();
          $isAccepted = ($transaksi2->user_2_acc == 1);
          if($isAccepted){

          } else {
            $transaksi2->user_2_acc = 1;
            $transaksi2->save();
          }

          if($transaksi2->user_1_acc == 1){
              // delete item
              BarangTukars::where("id",$id_user_good)->delete();
              BarangTukars::where("id",$id_good)->delete();
          }
        }



        return Redirect::back()->with('message','Transaksi Telah Disetujui !')->with('isAccepted',$isAccepted);
    }
}
