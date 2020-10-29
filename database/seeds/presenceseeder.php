<?php

use Illuminate\Database\Seeder;

class presenceseeder extends Seeder
{
    
    public function run()
    {
        DB::table('presence')->insert([
            [
                'id'=>'1',
                'krs_id'=>'1',
                'schedule_id'=>'A11',
                'status'=>0,
                'code'=>'jhasjhuehuskj123'
            ],
            [
                'id'=>'2',
                'krs_id'=>'2',
                'schedule_id'=>'A11',
                'status'=>0,
                'code'=>'jhasjhuehuskj111'
            ],
            [
                'id'=>'3',
                'krs_id'=>'7',
                'schedule_id'=>'A12',
                'status'=>0,
                'code'=>'jhasjhuehuskj133'
            ],
            [
                'id'=>'4',
                'krs_id'=>'7',
                'schedule_id'=>'A11',
                'status'=>0,
                'code'=>'jhasjhuehuskj000'
            ],
        ]);
    }
}
