<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pesanan_id');
            $table->unsignedInteger('produk_id');
            $table->string('nama');
            $table->unsignedInteger('harga');
            $table->unsignedInteger('qty');
            $table->decimal('berat', 5, 2);
            $table->decimal('ongkir', 10, 2);
            $table->unsignedInteger('toko_id');
            $table->string('bukti_kirim')->nullable();
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
        Schema::drop('pesanan_details');
    }
}
