<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index() {
    	if (session('isAdminAktif')) {
    		return "Dah Login";
    	} else {
    		return redirect("/admin/login");
    	}
    }
}
