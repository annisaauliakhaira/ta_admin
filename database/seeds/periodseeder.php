<?php

use Illuminate\Database\Seeder;
use App\Helper\helper;
use App\period;

class periodseeder extends Seeder
{
    
    public function run()
    {
        $data = helper::get('/v1/list-semester');
        if($data){
            foreach($data->data as $mData){
               period::create(
                    [
                        'id'=>$mData->id,
                        'year'=>$mData->tahun,
                        'periode'=>$mData->periode,
                        'status'=>0
                    ]
                );
            }
        }

        $semester_aktif=helper::get('/v1/semester-aktif');
        if($semester_aktif){
            $period = period::find($semester_aktif->data->id);
            $period->status=1;
            $period->update();
        }
        
    }
}
