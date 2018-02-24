<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index() {
    	return view('admin.auth.login');
    }
}
