<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameKategoriProjectColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori_project', function($table) {
            $table->renameColumn('flag_lkategori_project', 'flag_kategori_project');
        });
    }


    public function down()
    {
        Schema::table('kategori_project', function($table) {
            $table->renameColumn('flag_kategori_project', 'flag_lkategori_project');
        });
    }
}
