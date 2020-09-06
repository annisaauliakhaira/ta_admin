<?php

use Illuminate\Database\Seeder;

class lecturerclassesseeder extends Seeder
{
    
    public function run()
    {
        DB::table('lecturerclass')->insert([
            [
                'id'=>'1',
                'class_id'=>'1',
                'lecturer_id'=>1
            ],
            [
                'id'=>'2',
                'class_id'=>'1',
                'lecturer_id'=>2 
            ],
            [
                'id'=>'3',
                'class_id'=>'2',
                'lecturer_id'=>3
            ],
            [
                'id'=>'4',
                'class_id'=>'3',
                'lecturer_id'=>2
            ],
            [
                'id'=>'5',
                'class_id'=>'4',
                'lecturer_id'=>1
            ],
            [
                'id'=>'6',
                'class_id'=>'4',
                'lecturer_id'=>3
            ],
            [
                'id'=>'7',
                'class_id'=>'5',
                'lecturer_id'=>2
            ],
            [
                'id'=>'8',
                'class_id'=>'6',
                'lecturer_id'=>1
            ],
            [
                'id'=>'9',
                'class_id'=>'8',
                'lecturer_id'=>3
            ],
            [
                'id'=>'10',
                'class_id'=>'9',
                'lecturer_id'=>3
            ]
        ]);
    }
}
