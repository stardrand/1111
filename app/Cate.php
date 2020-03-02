<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table='cate';   //表名
    protected $primaryKey='cate_id'; //id
    public $timestamps=false; //时间
    //黑名单
    protected $guarded =[];
}
