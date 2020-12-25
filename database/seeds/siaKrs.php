<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{krs, student};

class siaKrs extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/kelas-mahasiswa");
        if($data){
            $datas = $data->data;
            foreach($datas as $data){
                $mahasiswa = student::where('nim',$data->mahasiswaNim)->first();
                if($mahasiswa){
                    krs::create([
                        'class_id'=>$data->class_id,
                        'student_id'=>$mahasiswa->id
                    ]);
                }
            }
        }
        
    }
}
