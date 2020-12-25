<?php

namespace App\Helper;

class helper{
    public static function get($link)
    {
        try{
            $baseUrl = 'http://127.0.0.1:8000';
            $option = array('http'=>array('header'=>"User-Agent:MyAgent/1.0\r\n"));
            $context = stream_context_create($option);
            $data = file_get_contents($baseUrl.'/'.$link, false, $context);
            return json_decode($data);

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}