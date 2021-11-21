<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class pegawai extends Authenticatable
{
    use SoftDeletes;
    protected $table        = "user";
    protected $guarded = [];

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getRole()
    {
        return $this->belongsTo(role::class, 'id_role' , 'id');
    }

}
