<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class req_material extends Model
{
    protected $table = "request_material";
    protected $guarded = [];

    public function haveReq_perbaikan()
    {
        return $this->belongsTo(req_perbaikan::class , 'id' , 'id_request_perbaikan'  );
    }
}
