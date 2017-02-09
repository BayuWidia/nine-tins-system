<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  protected $table = 'tentang';

  protected $fillable = [
    'id_user', 'nama_tentang', 'keterangan_tentang', 'flag_tentang'
  ];

}
