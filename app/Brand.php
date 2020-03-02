<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brand';   //表名
    protected $primaryKey='bid'; //id
    public $timestamps=false; //时间
    //黑名单
    protected $guarded =[];

}
