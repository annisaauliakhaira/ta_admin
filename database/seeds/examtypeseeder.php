<?php

use Illuminate\Database\Seeder;

class examtypeseeder extends Seeder
{
    
    public function run()
    {
        DB::table('examtype')->insert([
            [
                'id'=>1,
                'name'=>'UTS'
            ],
            [
                'id'=>2,
                'name'=>'UAS'
            ]
        ]);
    }
}
