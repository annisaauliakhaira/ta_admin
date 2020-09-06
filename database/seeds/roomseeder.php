<?php

use Illuminate\Database\Seeder;

class roomseeder extends Seeder
{
    
    public function run()
    {
        DB::table('room')->insert([
            [
                'id'=>'1',
                'name'=>'A 1.1',
                'latitude'=>912732987928.0000993093,
                'longitude'=>232392898239.3829283,
                'building_id'=>'1'
            ],
            [
                'id'=>'2',
                'name'=>'A 1.2',
                'latitude'=>912732987928.0000993093,
                'longitude'=>12292898239.329283,
                'building_id'=>'1'
            ],
            [
                'id'=>'3',
                'name'=>'B 1.1',
                'latitude'=>912732987928.0000993093,
                'longitude'=>392898239.3829283,
                'building_id'=>'2'
            ],
            [
                'id'=>'4',
                'name'=>'B 1.2',
                'latitude'=>18276372.9298738,
                'longitude'=>989978218.0829839,
                'building_id'=>'2'
            ],
            [
                'id'=>'5',
                'name'=>'H 2.1',
                'latitude'=>91727387.89282,
                'longitude'=>827879390.01092818,
                'building_id'=>'6'
            ],
            [
                'id'=>'7',
                'name'=>'H 2.2',
                'latitude'=>14228372.0298392,
                'longitude'=>12923989.0898398,
                'building_id'=>'6'
            ],
            [
                'id'=>'8',
                'name'=>'H 2.3',
                'latitude'=>9278718.08398290,
                'longitude'=>92932712.039892000,
                'building_id'=>'6'
            ]
        ]);
    }
}
