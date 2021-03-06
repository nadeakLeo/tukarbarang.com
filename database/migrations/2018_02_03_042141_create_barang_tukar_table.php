<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTukarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_tukar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')
                  ->unsigned();
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('kondisi');
            $table->string('path_gambar');
            $table->string('harapan_tukar');
            $table->float('berat')->nullable();
            $table->float('panjang')->nullable();
            $table->float('lebar')->nullable();
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
        Schema::dropIfExists('barang_tukar');
    }
}
