<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{user, staff};
use Illuminate\Support\Str;

class siaStaff extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/staff");
        if($data){
            $datas = $data->data;
            foreach ($datas as $data) {
               if($data->nama!=null || $data->nama!=""){
                $user=  user::create([
                    // 'id' => Str::random(11),
                    'username' => $data->username,
                    'status'=>4,
                    'password'=>app('hash')->make('staff123'),
                    // 'email'=>$data->username.'@unand.ac.id'
                ]);

                staff::create([
                    'id'=>$user->id,
                    'name' => $data->nama
                ]);
               }
            }

        }
    }
}
