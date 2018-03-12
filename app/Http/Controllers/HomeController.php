<?php

namespace App\Http\Controllers;

use Faker\Provider\File;
use Illuminate\Http\Request;
use App\BarangTukars;
use App\Advertisements;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $data['barangs'] = BarangTukars::where('id_user', '!=', Auth::id())->get();
            $data['ads'] = Advertisements::all();
            return view('home', $data);
        } else {
            return view('welcome');
        }
        
    }

    public function fileUpload(Request $request) {
        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image_name = $image->getClientOriginalName();
            $destinationPath = public_path('\img\barang_tukar');
            $image->move($destinationPath, $name);
//            $this->save();

            $file = new BarangTukars;
            $file->id_user = Auth::id();
            $file->nama_barang = strtolower ( $request->input('item_name') );
            $file->kategori = $request->input('item_category');
            $file->kondisi = $request->input('item_status');
            $file->path_gambar = $name;
            $file->harapan_tukar = strtolower ( $request->input('item_preffer') );
            Str::lower($file->harapan_tukar);
            $file->berat = $request->input('item_weight');
            $file->panjang = $request->input('item_long');
            $file->lebar = $request->input('item_width');
            $file->save();
            $data['barangs'] = BarangTukars::where('id_user', '=', Auth::id())->get();
            return view('my_store', $data);
        }
    }

    public function editfileUpload(Request $request) {
        $file = BarangTukars::find($request->input('id'));
        if ($request->hasFile('item_image')) {
            $image_name = $image->getClientOriginalName();
            $destinationPath = public_path('\img\barang_tukar');
            $image->move($destinationPath, $name);
            $image = $request->file('item_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $file->path_gambar = $name;
        } else {
            $file->path_gambar = $request->input('path');
        }
        
        $file->id = $request->input('id');
        $file->id_user = Auth::id();
        $file->nama_barang = strtolower ( $request->input('item_name') );
        $file->kategori = $request->input('item_category');
        $file->kondisi = $request->input('item_status');
        $file->harapan_tukar = strtolower ( $request->input('item_preffer') );
        Str::lower($file->harapan_tukar);
        $file->berat = $request->input('item_weight');
        $file->panjang = $request->input('item_long');
        $file->lebar = $request->input('item_width');
        $file->save();

        return redirect('/mybarang?id='.$file->id);
    }
}
