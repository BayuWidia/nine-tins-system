<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blockquote extends Model
{
  protected $table = 'blockquote';

  protected $fillable = [
    'id_user','nama_blockquote', 'keterangan_blockquote', 'url_blockquote', 'flag_blockquote'
  ];

}
