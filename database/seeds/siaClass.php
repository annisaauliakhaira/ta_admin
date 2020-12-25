<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{classes};

class siaClass extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/kelas");
        if($data){
            $datas = $data->data;
            foreach ($datas as $data) {
               classes::create([
                "id"=>$data->id,
                "name"=> $data->name,
                "courses_id"=>$data->courses_id,
                "period_id"=> $data->period_id
               ]);
            }

        }
    }
}
