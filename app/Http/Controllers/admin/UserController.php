<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function index() {
    	$data['users'] = User::all();
    	return view('admin.user.index', $data);
    }
}
