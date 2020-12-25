<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{user, lecturer};
use Illuminate\Support\Str;

class siaDosen extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/dosen");
        if($data){
            $datas = $data->data;
            foreach ($datas as $data) {
               $user=  user::create([
                    // 'id' => Str::random(11),
                    'username' => $data->nip,
                    'status'=>2,
                    'password'=>app('hash')->make('dosen123'),
                    // 'email'=>$data->nip.'@student.unand.ac.id'
                ]);

                $dosen=lecturer::create([
                    'id'=>$user->id,
                    'nip'=>$data->nip,
                    'name' => $data->nama
                ]);
            }

        }
    }
}
