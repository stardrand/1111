<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $bname = request()->bname??'';
        $where=[];
        if($bname){
            $where[]=['bname','like',"%$bname%"];
        }
        $pageSize = config('app.pageSize');
        $data = Brand::where($where)->orderby('bid','desc')->paginate($pageSize);
        return view("brand.list",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except("_token");
        $validator=Validator::make($data,[
            'bname'=>['required','unique:brand'],
            'burl'=>'required',
        ],[
            'bname.required'=>'品牌名称必填',
            'bname.unique'=>'品牌已存在',
            'burl.required'=>'品牌网址必填',
        ]);
        if($validator->fails()){
            return redirect('brand/create')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('bimg')){
            $data['bimg'] = $this->upload('bimg');
        }
        $res = Brand::create($data);
        if($res){
            return redirect("/brand/list");
        }
    }

    function upload($filename){
        if(request()->file($filename)->isValid()){
            $file = request()->file($filename);
            $info = $file->store($filename);
            return $info;
        }
        exit("未获取文件");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bid)
    {
        $data = Brand::find($bid);
        return view("brand.edit",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bid)
    {
        $data = $request->except('_token');
        if($request->hasFile('bimg')){
            $data['bimg'] = $this->upload('bimg');
        }
        $res = Brand::where('bid',$bid)->update($data);
        if($res){
            return redirect("/brand/list");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bid)
    {
        $res = Brand::destroy($bid);
        if($res){
            echo json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
}
