<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{room};

class siaRuangan extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/ruangan");
        if($data){
            $datas = $data->data;
            foreach ($datas as $data) {
               room::create([
                    'id' => $data->id,
                    'name' => $data->name,
                    'latitude' => 0,
                    'longitude' => 0,
                    'building_id' => $data->building_id
               ]);
            }

        }
    }
}
