<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class berita_acara extends Model
{
    protected $table = "berita_acara";
    protected $guarded = [];

    public function ToBeMain()
    {
        return $this->belongsTo(maintenance::class , 'maintenance_id' , 'id');
    }
}
