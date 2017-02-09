<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
  protected $table = 'testimonial';

  protected $fillable = [
    'nama_testimonial', 'keterangan_testimonial', 'url_testimonial', 'flag_testimonial'
  ];

}
