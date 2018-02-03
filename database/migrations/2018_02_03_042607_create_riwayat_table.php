<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik')
                  ->unsigned();
            $table->foreign('id_pemilik')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->integer('id_penukar')
                  ->unsigned();
            $table->foreign('id_penukar')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->integer('id_barang')
                  ->unsigned();
            $table->foreign('id_barang')
                  ->references('id')
                  ->on('barang_tukar')
                  ->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('riwayat');
    }
}
