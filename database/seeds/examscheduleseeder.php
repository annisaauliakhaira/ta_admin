<?php

use Illuminate\Database\Seeder;

class examscheduleseeder extends Seeder
{
    
    public function run()
    {
        DB::table('examschedule')->insert([
            [
                'id'=>'A11',
                'start_hour'=>'13:30:00',
                'ending_hour'=>'14:30:00',
                'date'=>'2020-06-13',
                'status'=>0,
                'room_id'=>'7',
                'class_id'=>'1',
                'staff_id'=>'4',
                'examtype_id'=>2,
                'news_event'=>'dira berdiskusi dengan murda'
            ],
            [
                'id'=>'A12',
                'start_hour'=>'13:30:00',
                'ending_hour'=>'14:30:00',
                'date'=>'2020-06-13',
                'status'=>0,
                'room_id'=>'8',
                'class_id'=>'2',
                'staff_id'=>'5',
                'examtype_id'=>2,
                'news_event'=>'aldo sering minta izin ke toilet'
            ],
            [
                'id'=>'B23',
                'start_hour'=>'07:30:00',
                'ending_hour'=>'09:00:00',
                'date'=>'2020-06-10',
                'status'=>0,
                'room_id'=>'7',
                'class_id'=>'3',
                'staff_id'=>'5',
                'examtype_id'=>2,
                'news_event'=>'-'
            ],
            [
                'id'=>'B24',
                'start_hour'=>'07:30:00',
                'ending_hour'=>'09:00:00',
                'date'=>'2020-06-10',
                'status'=>0,
                'room_id'=>'8',
                'class_id'=>'4',
                'staff_id'=>'4',
                'examtype_id'=>2,
                'news_event'=>'-'
            ],
        ]);
    }
}
