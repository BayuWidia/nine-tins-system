<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  protected $table = 'keahlian';

  protected $fillable = [
    'id_user','nama_keahlian', 'keterangan_keahlian', 'persentase', 'flag_keahlian'
  ];

}
