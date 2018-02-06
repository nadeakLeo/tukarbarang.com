<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show() {
    	$user = User::find(Auth::id());
    	return view('profile')->with('user', $user);
    }
}
