<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\User;

class TransactionController extends Controller
{
    public function index() {
    	$transactions = Transaksi::all();
    	foreach($transactions as $transaction) {
    		$transaction['user_1_name'] = User::find($transaction->user_1);
    		$transaction['user_2_name'] = User::find($transaction->user_2);
    		$transaction['barang_1'] = User::find($transaction->id_barang_1);
    		$transaction['barang_2'] = User::find($transaction->id_barang_2);
    	}

    	$data['transactions'] = $transactions;
    	return view('admin.transaction.index', $data);
    }
}
