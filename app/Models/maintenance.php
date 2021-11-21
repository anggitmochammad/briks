<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class maintenance extends Model
{
    use SoftDeletes;
    protected $table = "maintenance";
    protected $guarded = [];

    public function haveOne_to_req_perbaikan()
    {
        return $this->hasOne(req_perbaikan::class , 'id_maintenance');
    }
    public function haveMany_to_req_perbaikan()
    {
        return $this->HasMany(req_perbaikan::class , 'id_maintenance');
    }
    public function havePeralatan()
    {
        return $this->belongsTo(peralatan::class , 'id_peralatan' , 'id');
    }
    public function ToBeritaAcara()
    {
        return $this->hasOne(berita_acara::class , 'maintenance_id');
    }
}
