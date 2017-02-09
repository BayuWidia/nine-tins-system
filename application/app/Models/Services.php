<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
  protected $table = 'service';

  protected $fillable = [
    'id_user','nama_service', 'keterangan_service', 'url_service', 'flag_service'
  ];

}
