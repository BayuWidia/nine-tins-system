<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  protected $table = 'video';

  protected $fillable = [
    'id_user','url_video', 'judul_video', 'flag_video'
  ];

 
}
