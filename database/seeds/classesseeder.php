<?php

use Illuminate\Database\Seeder;

class classesseeder extends Seeder
{
    
    public function run()
    {
        DB::table('classes')->insert([
            [
                'id'=>'1',
                'name'=>'Big Data A',
                'courses_id'=>'1',
                'period_id'=>'1'
            ],
            [
                'id'=>'2',
                'name'=>'Big Data B',
                'courses_id'=>'1',
                'period_id'=>'1'
            ],
            [
                'id'=>'3',
                'name'=>'Basis Data Lanjut A',
                'courses_id'=>'2',
                'period_id'=>'2'
            ],
            [
                'id'=>'4',
                'name'=>'Basis Data Lanjut B',
                'courses_id'=>'2',
                'period_id'=>'2'
            ],
            [
                'id'=>'5',
                'name'=>'Pemograman Web A',
                'courses_id'=>'3',
                'period_id'=>'2'
            ],
            [
                'id'=>'6',
                'name'=>'Pemograman Web B',
                'courses_id'=>'3',
                'period_id'=>'2'
            ],
            [
                'id'=>'7',
                'name'=>'Data Mining A',
                'courses_id'=>'4',
                'period_id'=>'1'
            ],
            [
                'id'=>'8',
                'name'=>'Data Mining B',
                'courses_id'=>'4',
                'period_id'=>'1'
            ],
            [
                'id'=>'9',
                'name'=>'Riset Operasional A',
                'courses_id'=>'5',
                'period_id'=>'2'
            ],
            [
                'id'=>'10',
                'name'=>'Riset Operasional B',
                'courses_id'=>'5',
                'period_id'=>'2'
            ]
        ]);
    }
}
