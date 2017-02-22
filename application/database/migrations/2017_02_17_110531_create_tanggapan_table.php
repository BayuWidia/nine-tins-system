<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanggapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('id_pesan')->unsigned()->nullable();
            $table->longText('tanggapan')->nullable();
            $table->integer('flag_pesan')->nullable();
            $table->timestamps();
        });

        Schema::table('tanggapan', function(Blueprint $table){
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('tanggapan', function(Blueprint $table){
            $table->foreign('id_pesan')->references('id')->on('pesan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tanggapan');
    }
}
