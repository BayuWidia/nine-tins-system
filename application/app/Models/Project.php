<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $table = 'project';

  protected $fillable = [
    'id_user','id_lokasi', 'id_kategori_project', '	id_client', 'nama_project' , 'keterangan_project' , 'waktu_project' , 'status_project' , 'logo_project' , 'tags' , 'harga_project' , 'flag_project'
  ];


	public function master_user()
	{
	  return $this->belongsTo('App\Models\User', 'id_user');
	}


	public function master_lokasi()
	{
  		return $this->belongsTo('App\Models\Lokasi', 'id_lokasi');
	}

	public function master_kategori_project()
	{
  		return $this->belongsTo('App\Models\KategoriProject', 'id_kategori_project');
	}

	public function master_client()
	{
  		return $this->belongsTo('App\Models\Client', 'id_client');
	}

}
