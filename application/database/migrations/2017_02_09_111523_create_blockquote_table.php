<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockquoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blockquote', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->string('nama_blockquote', 255)->nullable();
            $table->string('keterangan_blockquote', 225)->nullable();
            $table->integer('flag_blockquote')->nullable();
            $table->string('url_foto', 255)->nullable();
            $table->timestamps();
        });

        Schema::table('blockquote', function(Blueprint $table){
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
        // Schema::drop('blockquote');
    }
}
