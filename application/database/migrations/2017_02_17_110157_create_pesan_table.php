<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->string('nama', 255)->nullable();
            $table->string('email', 225)->nullable();
            $table->string('subject', 225)->nullable();
            $table->longText('pesan')->nullable();
            $table->integer('flag_pesan')->nullable();
            $table->timestamps();
        });

        Schema::table('pesan', function(Blueprint $table){
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
        // Schema::drop('pesan');
    }
}
