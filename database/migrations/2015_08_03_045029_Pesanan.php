<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->unsignedInteger('user_id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kota');
            $table->string('propinsi');
            $table->string('kode_pos');
            $table->string('email');
            $table->string('telepon');
            $table->unsignedInteger('pembayaran_id')->nullable();
            $table->boolean('terkirim')->default(false);
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
        Schema::drop('pesanan');
        //
    }
}
