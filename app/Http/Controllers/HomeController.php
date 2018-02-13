<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangTukars;
use Illuminate\Support\Facades\Auth;

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
            return view('home', $data);
        } else {
            return view('welcome');
        }
        
    }

    public function fileUpload(Request $request) {
        $this->validate($request, [
            'item_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $this->save();

            return back()->with('success','Image Upload successfully');
        }

    }
}
