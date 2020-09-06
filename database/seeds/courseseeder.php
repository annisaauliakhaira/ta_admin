<?php

use Illuminate\Database\Seeder;

class courseseeder extends Seeder
{
    
    public function run()
    {
        DB::table('courses')->insert([
            [
                'id'=>'1',
                'name'=>'Big Data',
                'sks'=>'3'
            ],
            [
                'id'=>'2',
                'name'=>'Basis Data Lanjut',
                'sks'=>'3'
            ],
            [
                'id'=>'3',
                'name'=>'Pemograman Web',
                'sks'=>'3'
            ],
            [
                'id'=>'4',
                'name'=>'Data Mining',
                'sks'=>'3'
            ],
            [
                'id'=>'5',
                'name'=>'Riset Operasional',
                'sks'=>'2'
            ]
        ]);
    }
}
