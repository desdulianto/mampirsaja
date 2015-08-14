<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOngkirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongkir', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kota_asal');
            $table->string('propinsi_asal');
            $table->string('kota_tujuan');
            $table->string('propinsi_tujuan');
            $table->unsignedInteger('ongkos');
            $table->timestamps();
        });

        $this->data_awal();
    }

    protected function data_awal()
    {
        $data = [
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Jakata Barat','propinsi_tujuan'=>'Jakarta','ongkos'=>13000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Jakarta Selatan','propinsi_tujuan'=>'Jakarta','ongkos'=>13000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Jakarta Pusat','propinsi_tujuan'=>'Jakarta','ongkos'=>13000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Jakarta Timur','propinsi_tujuan'=>'Jakarta','ongkos'=>13000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Jakarta Utara','propinsi_tujuan'=>'Jakarta','ongkos'=>13000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Kisaran','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Limapuluh','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Sidikalang','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Lubuk Pakam','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Dolok Sanggul','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Kabanjahe','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Rantau Prapat','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Kota Pinang','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Aek Kanopan','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Stabat','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Panyabungan','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Gunung Sitoli','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Lahomi','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Teluk Dalam','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Lotu','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Sibuhuan','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Gunung Tua','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Salak','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Panguruan','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Sei Rampah','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Raya','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Sipirok','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Pandan','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Tarutung','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Balige','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Binjai','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Medan','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>5000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Gunungsitoli','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Padangsidempuan','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Pematangsiantar','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Sibolga','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Tanjungbalai','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],
            ['kota_asal'=>'Medan','propinsi_asal'=>'Sumatera Utara','kota_tujuan'=>'Tebing Tinggi','propinsi_tujuan'=>'Sumatera Utara','ongkos'=>10000 ],];
       foreach ($data as $item) {
           $kota_asal = $item['kota_asal'];
           $propinsi_asal = $item['propinsi_asal'];
           $kota_tujuan = $item['kota_tujuan'];
           $propinsi_tujuan = $item['propinsi_tujuan'];
           $ongkos = $item['ongkos'];
           DB::table('ongkir')->insert(
               array('kota_asal'=>$kota_asal,
               'propinsi_asal'=>$propinsi_asal,
               'kota_tujuan'=>$kota_tujuan,
               'propinsi_tujuan'=>$propinsi_tujuan,
               'ongkos'=>$ongkos
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
        Schema::drop('ongkir');
    }
}
