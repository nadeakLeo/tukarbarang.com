<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_1')->unsigned();
          $table->integer('user_2')->unsigned();
          $table->integer('id_barang_1')->unsigned();
          $table->integer('id_barang_2')->unsigned();
          $table->integer('user_1_acc')->unsigned();
          $table->integer('user_2_acc')->unsigned();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
