<?php

use Illuminate\Database\Seeder;

class buildingseeder extends Seeder
{
    
    public function run()
    {
        DB::table('building')->insert([
            [
                'id'=>'1',
                'name'=>'Gedung A'
            ],
            [
                'id'=>'2',
                'name'=>'Gedung B'
            ],
            [
                'id'=>'3',
                'name'=>'Gedung C'
            ],
            [
                'id'=>'4',
                'name'=>'Gedung D',
            ],
            [
                'id'=>'5',
                'name'=>'Gedung E'
            ],
            [
                'id'=>'6',
                'name'=>'Gedung H'
            ]
        ]);
    }
}
