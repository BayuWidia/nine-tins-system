<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->string('nama_lokasi', 255)->nullable();
            $table->string('keterangan_lokasi', 225)->nullable();
            $table->integer('flag_lokasi')->nullable();
            $table->timestamps();
        });

        Schema::table('lokasi', function(Blueprint $table){
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lokasi', function (Blueprint $table) {
            //
        });
    }
}
