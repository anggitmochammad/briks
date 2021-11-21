<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class peralatan extends Model
{
    use SoftDeletes;
    protected $table = "peralatan";
    protected $guarded = [];

    public function haveManyMain()
    {
        $this->hasMany(maintenance::class , 'id');
    }
}
