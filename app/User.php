<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';   //表名
    protected $primaryKey='u_id'; //id
    public $timestamps=false; //时间
    //黑名单
    protected $guarded =[];
}