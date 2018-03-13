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
    		$transaction['user_1_name'] = User::find($transaction->user_1)->name;
    		$transaction['user_2_name'] = User::find($transaction->user_2)->name;
    		$transaction['barang_1'] = User::find($transaction->id_barang_1)->nama_barang;
    		$transaction['barang_2'] = User::find($transaction->id_barang_2)->nama_barang;
    		if ($transaction->user_1_acc == 0 && $transaction->user_2_acc == 0) {
    			$transaction['status'] = "No Deal";
    		} else if ($transaction->user_1_acc == 0 && $transaction->user_2_acc == 1) {
    			$transaction['status'] = "Partner Deal";
    		} else if ($transaction->user_1_acc == 1 && $transaction->user_2_acc == 0) {
    			$transaction['status'] = "User Deal";
    		} else  if ($transaction->user_1_acc == 1 && $transaction->user_2_acc == 1) {
    			$transaction['status'] = "Deal";
    		}
    	}

    	$data['transactions'] = $transactions;
    	return view('admin.transaction.index', $data);
    }
}
