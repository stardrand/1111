<?php
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

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
  
