<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brand';
    protected $primaryKey='bid';
    public $timestamps=false;
    protected $guarded=[];
}
