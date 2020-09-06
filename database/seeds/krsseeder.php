<?php

use Illuminate\Database\Seeder;

class krsseeder extends Seeder
{
    
    public function run()
    {
        DB::table('krs')->insert([
            [
                'id'=>'1',
                'class_id'=>'1',
                'student_id'=>'6'
            ],
            [
                'id'=>'2',
                'class_id'=>'1',
                'student_id'=>'7'
            ],
            [
                'id'=>'3',
                'class_id'=>'1',
                'student_id'=>'8'
            ],
            [
                'id'=>'4',
                'class_id'=>'1',
                'student_id'=>'9'
            ],
            [
                'id'=>'6',
                'class_id'=>'2',
                'student_id'=>'6'
            ],
            [
                'id'=>'7',
                'class_id'=>'2',
                'student_id'=>'7'
            ],
            [
                'id'=>'8',
                'class_id'=>'2',
                'student_id'=>'8'
            ],
            [
                'id'=>'9',
                'class_id'=>'2',
                'student_id'=>'9'
            ]
        ]);
    }
}
