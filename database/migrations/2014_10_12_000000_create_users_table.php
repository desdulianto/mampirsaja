<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('role', 10);
            $table->string('username')->unique();
            $table->rememberToken();
            $table->timestamps();
        });

        // insert admin user
        DB::table('users')->insert(
            array('nama_depan'=>'Des',
                  'nama_belakang'=>'Duliant',
                  'gender'=>'male',
                  'email'=>'desdulianto@gmail.com',
                  'password'=>Hash::make('secret'),
                  'role'=>'admin',
                  'username'=>'desdulianto'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
