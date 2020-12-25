<?php

use Illuminate\Database\Seeder;

class krsseeder extends Seeder
{
    
    public function run()
    {
        DB::table('krs')->insert([
            [
                'class_id'=>'TSI203-01',
                'student_id'=>'24'
            ],
            [
                'class_id'=>'TSI203-01',
                'student_id'=>'26'
            ],
            [
                'class_id'=>'TSI203-01',
                'student_id'=>'28'
            ],
            [
                'class_id'=>'TSI203-01',
                'student_id'=>'30'
            ],
            [
                'class_id'=>'TSI203-01',
                'student_id'=>'32'
            ],

            [
                'class_id'=>'TSI203-02',
                'student_id'=>'25'
            ],
            [
                'class_id'=>'TSI203-02',
                'student_id'=>'27'
            ],
            [
                'class_id'=>'TSI203-02',
                'student_id'=>'29'
            ],
            [
                'class_id'=>'TSI203-02',
                'student_id'=>'31'
            ],
            [
                'class_id'=>'TSI203-02',
                'student_id'=>'33'
            ],

            
            [
                'class_id'=>'TSI309-01',
                'student_id'=>'14'
            ],
            [
                'class_id'=>'TSI309-01',
                'student_id'=>'16'
            ],
            [
                'class_id'=>'TSI309-01',
                'student_id'=>'18'
            ],
            [
                'class_id'=>'TSI309-01',
                'student_id'=>'20'
            ],
            [
                'class_id'=>'TSI309-01',
                'student_id'=>'22'
            ],
            
            [
                'class_id'=>'TSI309-02',
                'student_id'=>'15'
            ],
            [
                'class_id'=>'TSI309-02',
                'student_id'=>'17'
            ],
            [
                'class_id'=>'TSI309-02',
                'student_id'=>'19'
            ],
            [
                'class_id'=>'TSI309-02',
                'student_id'=>'21'
            ],
            [
                'class_id'=>'TSI309-02',
                'student_id'=>'23'
            ],
        ]);
    }
}
