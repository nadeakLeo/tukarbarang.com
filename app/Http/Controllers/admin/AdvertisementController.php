<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advertisements;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function index() {
    	$data['ads'] = Advertisements::all();
    	return view('admin.advertisement.index', $data);
    }

    public function new() {
    	return view('admin.Advertisement.new');
    }

    public function store(Request $request) {
    	$ads = new Advertisements;

    	$ads->name = Input::get('name');
    	$ads->link = Input::get('link');
    	$ads->description = Input::get('description');
    	$pict = $request->file('image');
    	$filename = date("Y-m-d").'-'.$pict->getClientOriginalName();
        Storage::disk('ads')->putFileAs('img', $pict, $filename);
        $ads->path_pict = $filename;

        $ads->save();

        return redirect('admin/advertisements');

    }

    public function edit() {
    	$data['ads'] = Advertisements::find($_GET['id']);
    	return view('admin.advertisement.edit', $data);
    }
 	
 	public function update() {
 		$id = Input::get('id');
    	$ads = Advertisements::find($id);

    	$ads->name = Input::get('name');
    	$ads->link = Input::get('link');
    	$ads->description = Input::get('description');
    	// $pict = $request->file('image');
    	// $filename = date("Y-m-d").'-'.$pict->getClientOriginalName();
     //    Storage::disk('ads')->putFileAs('img', $pict, $filename);
        // $ads->path_pict = $filename;

        $ads->save();

        return redirect('admin/advertisements');

    }

    public function delete() {
    	$ads = Advertisements::find($_GET['id']);

    	$ads->delete();
    	Storage::disk('ads')->delete('img/'.$ads->path_pict);

    	return back();
    }
}
