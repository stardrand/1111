<?php

//     function upload($filename){
//         if(request()->file($filename)->isValid()){
//             $file = request()->file($filename);
//             $info = $file->store($filename);
//             return $info;
//         }
//         exit("未获取文件");
//     }





// use AlibabaCloud\Client\AlibabaCloud;
// use AlibabaCloud\Client\Exception\ClientException;
// use AlibabaCloud\Client\Exception\ServerException;

  function cateinfo($info,$p_id=0,$level=1){
    static $res=[];
    foreach($info as $k=>$v) {
        if ($v['p_id']==$p_id){
            $v['level']=$level;
            $res[] = $v;
            cateinfo($info, $v['cate_id'],$v['level'] + 1);
        }
    }
    return $res;
}
  

/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function showMsg($status,$message = '',$data = array()){
    $result = array(
        'status' => $status,
        'message' =>$message,
        'data' =>$data
    );
    exit(json_encode($result));
}

 	/**
     * 上传文件
     */
    function upload($filename){
        //判断上传中有误错误
        if (request()->file($filename)->isValid()){
            //接受值
            $photo = request()->file($filename);
            //上传位置
            $store_result = $photo->store('uploads');
            return $store_result;
        }
    }


    function typeconff($data,$p_id=0,$level=0){
    if(!$data){
        return ;
    }
    static $atr=[];
    foreach($data as $k=>$v){
        if($v->p_id==$p_id){
            $v->level=$level;
            $atr[]=$v;

            typeconff($data,$v->cate_id,$level+1);
        }
    }
    return $atr;
}


    //多个文件上传
    function Moreuploads($filename){
        $photo = request()->file($filename);
        if(!is_array($photo)){
          return;
        } 
       
        foreach( $photo as $v ){
           if ($v->isValid()){
             $store_result[] = $v->store('uploads');
           }
        }
          
        return $store_result;
     }


