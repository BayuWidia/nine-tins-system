<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
  protected $table = 'fitur';

  protected $fillable = [
    'id_user','nama_fitur', 'keterangan_fitur', 'url_fitur', 'flag_fitur'
  ];

}
