<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('id_lokasi')->unsigned()->nullable();
            $table->integer('id_kategori_project')->unsigned()->nullable();
            $table->integer('id_client')->unsigned()->nullable();
            $table->string('nama_project', 255)->nullable();
            $table->string('keterangan_project', 225)->nullable();
            $table->string('waktu_project', 50)->nullable();
            $table->string('status_project', 50)->nullable();
            $table->string('logo_project', 225)->nullable();
            $table->string('tags', 225)->nullable();
            $table->double('harga_project');
            $table->integer('flag_project')->nullable();
            $table->timestamps();
        });

        Schema::table('project', function(Blueprint $table){
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('project', function(Blueprint $table){
            $table->foreign('id_lokasi')->references('id')->on('lokasi');
        });

        Schema::table('project', function(Blueprint $table){
            $table->foreign('id_kategori_project')->references('id')->on('kategori_project');
        });

        Schema::table('project', function(Blueprint $table){
            $table->foreign('id_client')->references('id')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project', function (Blueprint $table) {
            //
        });
    }
}
