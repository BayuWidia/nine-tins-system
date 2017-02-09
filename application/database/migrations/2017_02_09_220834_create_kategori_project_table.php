<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_project', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned()->nullable();
            $table->string('nama_kategori_project', 255)->nullable();
            $table->string('keterangan_lkategori_project', 225)->nullable();
            $table->integer('flag_lkategori_project')->nullable();
            $table->timestamps();
        });

        Schema::table('kategori_project', function(Blueprint $table){
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
        Schema::table('kategori_project', function (Blueprint $table) {
            //
        });
    }
}
