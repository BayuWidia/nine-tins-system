<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriProject extends Model
{
  protected $table = 'kategori_project';

  protected $fillable = [
    'id_user','nama_kategori_project', 'keterangan_kategori_project', 'flag_kategori_project'
  ];

}
