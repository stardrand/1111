<?php
    function upload($filename){
        if(request()->file($filename)->isValid()){
            $file = request()->file($filename);
            $info = $file->store($filename);
            return $info;
        }
        exit("未获取文件");
    }






?>