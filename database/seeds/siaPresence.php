<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{presence, student, krs, exam_schedule};
use Illuminate\Support\Str;

class siaPresence extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/kelas-ujian-mahasiswa");
        if($data){
            $datas = $data->data;
            foreach($datas as $data){
                $nim = student::where('nim',$data->mahasiswaNim)->first();
                if($nim){
                    $isKrs = krs::where('student_id',$nim->id)->where('class_id',$data->class_id)->first();
                    $isJadwal = exam_schedule::where('examtype_id',$data->examtype=="T" ? 1 : 2)->where('class_id',$data->class_id)->first();
                    if($isKrs && $isJadwal){
                        $presence = presence::where('class_id',$data->class_id)->where('student_id',$nim->id)->where('examtype_id',$data->examtype=="T" ? 1 : 2)->first();
                        if(!$presence){
                            $dataCreate = [
                                'class_id'=>$data->class_id,
                                'student_id'=>$nim->id,
                                'examtype_id'=>$data->examtype=="T" ? 1 : 2,
                                'status'=>0,
                                'code'=>Str::random(50)
                            ];
                            presence::create($dataCreate);
                        }
                    }
                }
            }
        }
    }
}
