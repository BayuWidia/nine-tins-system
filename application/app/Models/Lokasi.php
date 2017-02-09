<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
  protected $table = 'lokasi';

  protected $fillable = [
    'id_user','nama_lokasi', 'keterangan_lokasi', 'flag_lokasi'
  ];

}
