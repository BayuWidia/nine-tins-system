<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';
    protected $fillable = [
        'name', 'id_jabatan', 'email', 'password', 'level', 'url_foto', 'facebook', 'twitter', 'activated'
    ];


    public function master_jabatan()
    {
      return $this->belongsTo('App\Models\Jabatan', 'id_jabatan');
    }
}
