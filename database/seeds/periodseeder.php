<?php

use Illuminate\Database\Seeder;

class periodseeder extends Seeder
{
    
    public function run()
    {
        DB::table('period')->insert([
            [
                'id'=>'1',
                'year'=>2020,
                'semester'=>1,
                'status'=>0
            ],
            [
                'id'=>'2',
                'year'=>2020,
                'semester'=>2,
                'status'=>1
            ]
        ]);
    }
}
