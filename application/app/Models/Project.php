<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  protected $table = 'keahlian';

  protected $fillable = [
    'id_user','id_lokasi', 'id_kategori_project', '	id_client', 'nama_project' , 'keterangan_project' , 'waktu_project' , 'status_project' , 'logo_project' , 'tags' , 'harga_project' , 'flag_project'
  ];

}
