<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{period};

class siaPeriod extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/periode");
        if($data){
            $datas = $data->data;
            foreach($datas as $data){
                period::create([
                    'id' => $data->id,
                    'year' => $data->tahun,
                    'semester' => $data->periode,
                    'status' => 0
                ]);
            }
        }
        
        period::latest('id')->first()->update([
            'status' => 1
        ]);
    }
}
