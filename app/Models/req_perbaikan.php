<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class req_perbaikan extends Model
{
    protected $table = "request_perbaikan";
    protected $guarded = [];

    public function getMaintenance()
    {
        return $this->belongsTo(maintenance::class , 'id_maintenance' , 'id');
    }
    public function haveManyMaterial()
    {
        return $this->hasMany(req_material::class , 'id_request_perbaikan');
    }
}
