<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->timestamps();
        });
        
        // insert kategori
        $data = ['semua'=>'Semua',
                 'lukisan'=>'Lukisan',
                 'perabotan'=>'Perabotan',
                 'boneka'=>'Boneka',
                 'tas'=>'Tas',
                 'aksesoris'=>'Aksesoris',
                 'vintage'=>'Vintage',
                 'pernikahan'=>'Pernikahan',
                 'pria'=>'Pria',
                 'wanita'=>'Wanita'];
        foreach ($data as $k=>$v) {
            DB::table('kategoris')->insert(
                array('name'=>$k,
                      'label'=>$v,
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
        Schema::drop('kategoris');
    }
}
