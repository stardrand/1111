<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Brand;
use App\Shop;
class IndexController extends Controller
{
    public function index(){
        $shop_name=request()->shop_name;
        $where=[];
        if($shop_name){
            $where[]=['shop_name','like','%'.$shop_name.'%'];
        }
        $brandinfo=Brand::all();
        $shopinfo=Shop::where($where)->limit(10)->get();
    return  view('index.index',['brandinfo'=>$brandinfo,'shopinfo'=>$shopinfo,'shop_name'=>$shop_name]);
    }

}
