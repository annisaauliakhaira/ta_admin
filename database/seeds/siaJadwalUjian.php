<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\{exam_schedule, classes};

class siaJadwalUjian extends Seeder
{
    public function run()
    {
        $data = helper::get("v1/kelas-ujian");
        $idStaff = [637, 632, 638, 648, 649, 650];
        if($data){
            $datas = $data->data;
            foreach ($datas as $data) {
                if(!exam_schedule::find($data->id)){
                    $isKelas = classes::find($data->class_id);
                    if($isKelas){
                        exam_schedule::create([
                            'id'=>$data->id,
                            'start_hour'=>$data->mulai,
                            'ending_hour'=>$data->selesai,
                            'date'=>$data->tanggal,
                            'status'=>0,
                            'room_id'=>$data->room_id,
                            'class_id'=>$data->class_id,
                            'staff_id'=> $idStaff[rand(0,count($idStaff)-1)],
                            'examtype_id'=>$data->examtype=="T" ? 1 : 2,
                        ]);
                    }
                }
            }

        }
    }
}
