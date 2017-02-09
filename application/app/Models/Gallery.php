<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  protected $table = 'gallery';

  protected $fillable = [
    'id_user','url_gambar', 'keterangan_gambar', 'flag_gambar'
  ];
}
