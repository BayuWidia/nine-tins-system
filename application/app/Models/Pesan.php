<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pesan extends Authenticatable
{

    protected $table = 'pesan';
    protected $fillable = [
        'id_user','nama', 'email', 'subject', 'pesan', 'flag_pesan'
    ];


    public function users()
	{
		return $this->hasMany('App\Models\User');
	}

	public function tanggapan()
	{
		return $this->hasMany('App\Models\Tanggapan');
	}
}
