<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{building};

class siaGedung extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/gedung");
        if($data){
            $datas = $data->data;
            foreach ($datas as $data) {
               building::create([
                    'id' => $data->id,
                    'name' => $data->name,
               ]);
            }

        }
    }
}
