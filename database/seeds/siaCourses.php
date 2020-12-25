<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{courses};

class siaCourses extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/matkul");
        if($data){
            $datas = $data->data;
            foreach($datas as $data){
                courses::create([
                    "id"=> $data->id,
                    "name"=> $data->name,
                    "sks"=> $data->sks
                ]);
            }
        }
        
    }
}
