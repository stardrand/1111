<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $u_name=request()->u_name??'';
        $where=[];
        if($u_name){
            $where[]=['u_name','like',"%$u_name%"];
        }
        $pageSize=config('app.pageSize');
        $res=User::where($where)
                    ->paginate($pageSize);
        return view('user.index',['res'=>$res,'u_name'=>$u_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    public function add()
    {   
        $u_name=request()->u_name;
        $res=User::where(['u_name'=>$u_name])->count();
        // echo $res;
        echo json_encode(['code'=>'00000','msg'=>'ok','count'=>$res]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=$request->except('_token');
        

        if($request->hasFile('u_img')){
            $res['u_img']=upload('u_img');
        };
        unset($res['u_pwds']);
        // dd($res);
        $res['u_pwd']=encrypt($res['u_pwd']);
        // dd($res);
        $data=User::create($res);
        if($data){
            return redirect('user');
        }
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
    public function edit($id)
    {
        $res=User::find($id);
        $res['u_pwd']=decrypt($res['u_pwd']);
        return view('user.edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $res=$request->except('_token');
        if($request->hasFile('u_img')){
            $res['u_img']=upload('u_img');
        };
        unset($res['u_pwds']);
        // dd($res);
        $res['u_pwd']=encrypt($res['u_pwd']);
        // dd($res);
        $data=User::where('u_id',$id)->update($res);
        if($data){
            return redirect('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date=User::destroy($id);
        // dd($res);
        if($date){
            echo json_encode(['code'=>"1",'fond'=>"成功"]);
            // exit;
        }else{
            echo json_encode(['code'=>"2",'fond'=>"删除失败"]);
            // exit;
        } 
    }
}
