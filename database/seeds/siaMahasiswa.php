<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{user, student};
use Illuminate\Support\Str;

class siaMahasiswa extends Seeder
{

    public function run()
    {
        $data = helper::get("v1/mahasiswa");
        if($data){
            $datas = $data->data;
            foreach ($datas as $data) {
               $user=  user::create([
                    // 'id' => Str::random(11),
                    'username' => $data->nim,
                    'status'=>3,
                    'password'=>app('hash')->make('student123'),
                    // 'email'=>$data->nim.'@student.unand.ac.id'
                ]);

                $student=student::create([
                    'id'=>$user->id,
                    'nim'=>$data->nim,
                    'name' => $data->nama
                ]);
            }

        }
    }
}
