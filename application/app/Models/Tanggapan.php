<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tanggapan extends Authenticatable
{

    protected $table = 'tanggapan';
    protected $fillable = [
        'id_user','id_pesan', 'tanggapan'
    ];


    public function users()
	{
		return $this->hasMany('App\Models\User');
	}
}
