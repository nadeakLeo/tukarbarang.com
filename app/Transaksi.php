<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $fillable = [
        'user_1', 'id_barang_1', 'user_2', 'id_barang_2', 'user_1_acc', 'user_2_acc'
    ];
}
