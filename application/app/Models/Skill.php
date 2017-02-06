<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  protected $table = 'keahlian';

  protected $fillable = [
    'nama_keahlian', 'keterangan_keahlian', 'persentase', 'flag_keahlian'
  ];

}
