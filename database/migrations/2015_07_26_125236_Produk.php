<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('toko_id');
            $table->string('nama')->index();
            $table->string('tipe')->index();
            $table->unsignedInteger('kategori_id');
            $table->string('deskripsi');
            $table->unsignedInteger('stock');
            $table->unsignedInteger('harga');
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
        Schema::drop('produk');
    }
}
