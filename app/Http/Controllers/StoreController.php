<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BarangTukars;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index() {
    	if (Auth::check()) {
            $data['barangs'] = BarangTukars::where('id_user', '=', Auth::id())->get();
            return view('my_store', $data);
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
         $id_barang = $req->get('id');
            $data['barang_detail'] = BarangTukars::find($id_barang);
        if (isset($_GET['edit'])) {
            if ($_GET['edit'] == "true") {
                return view('edit_barang', $data);
            }
        } else {
            return view('view_my_barang', $data);
        }
    }
}
