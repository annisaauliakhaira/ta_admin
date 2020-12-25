<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{lecturer_class, lecturer};
use Illuminate\Support\Str;

class siaLecturerClass extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/kelas-dosen");
        if($data){
            $datas = $data->data;
            foreach($datas as $data){
                $lecturer = lecturer::where('nip',$data->nipDosen)->first();
                if($lecturer){
                    lecturer_class::create([
                        'id' => Str::random(10),
                        'class_id'=>$data->class_id,
                        'lecturer_id'=>$lecturer->id
                    ]);
                }
            }
        }
        
    }
}
