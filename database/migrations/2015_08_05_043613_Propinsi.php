<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Propinsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('propinsi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('propinsi');
            $table->string('kota');
        });

       $data = [
           ['kota'=>'Jakata Barat', 'propinsi'=>'Jakarta'],
           ['kota'=>'Jakarta Selatan', 'propinsi'=>'Jakarta'],
           ['kota'=>'Jakarta Pusat', 'propinsi'=>'Jakarta'],
           ['kota'=>'Jakarta Timur', 'propinsi'=>'Jakarta'],
           ['kota'=>'Jakarta Utara', 'propinsi'=>'Jakarta'],
           ['kota'=>'Kisaran','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Limapuluh','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sidikalang','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Lubuk Pakam','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Dolok Sanggul','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Kabanjahe','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Rantau Prapat','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Kota Pinang','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Aek Kanopan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Stabat','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Panyabungan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Gunung Sitoli','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Lahomi','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Teluk Dalam','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Lotu','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sibuhuan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Gunung Tua','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Salak','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Panguruan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sei Rampah','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Raya','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sipirok','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Pandan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Tarutung','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Balige','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Binjai','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Medan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Gunungsitoli','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Padangsidempuan','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Pematangsiantar','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Sibolga','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Tanjungbalai','propinsi'=>'Sumatera Utara'],
           ['kota'=>'Tebing Tinggi','propinsi'=>'Sumatera Utara'],
           ];
       foreach ($data as $item) {
           $kota = $item['kota'];
           $propinsi = $item['propinsi'];
           DB::table('propinsi')->insert(
               array('kota'=>$kota,
                     'propinsi'=>$propinsi
                 )
           );
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('propinsi');
    }
}
