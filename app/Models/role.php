<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = "role";
    protected $guarded = [];

    public function getUsers()
    {
        return $this->hasMany(pegawai::class , 'id_role');
    }

}
