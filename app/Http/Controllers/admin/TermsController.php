<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Terms;

class TermsController extends Controller
{
	private $rule = [
		'terms' => 'required'
	];
	
    public function index() {
    	$data['terms'] = Terms::find(1);

    	if (isset($_GET['status'])) {
    		if ($_GET['status'] == 'success') {
    			$data['succ'] = "Term and Agreement successfully updated";
    		}
    	}

    	return view('admin.terms.index', $data);
    }

    public function store() {    	
    	$table = Terms::find(1);

    	$table->terms = Input::get('terms');

    	$table->save();

    	return redirect('admin/terms?status=success');
    }
}
