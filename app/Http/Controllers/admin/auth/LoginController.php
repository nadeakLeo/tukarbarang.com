<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;
use App\AdminUsers;

class LoginController extends Controller
{
	private $rules = [
		"username" => "required",
		"password" => "required"
	];

    public function index() {
    	return view('admin.auth.login');
    }

    public function signin(Request $request) {
    	$validation = Validator::make(Input::all(), $this->rules);

    	if ($validation->fails()) {
    		return view('admin.auth.login')->withErrors($validation);
    	} else {
    		$user = AdminUsers::where('username', $request->input("username"))
                              ->where('password', $request->input("password"))
                              ->first();
            if (count($user) == 0) {
                $data['failLogin'] = "Invalid credentials. Please Try Again!";
                return view('admin.auth.login', $data);
            } else {
                session(['idAdminAktif' => $user->id]);
                return redirect('/admin/dashboard');
            }
    	}
    }
}
