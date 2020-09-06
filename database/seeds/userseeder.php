<?php

use Illuminate\Database\Seeder;
use App\User;
use App\lecturer as dosen;

class userseeder extends Seeder
{

    public function run()
    {
        DB::table('user')->insert([
            [
                'id' => 1,
                'username' => 'husnilk',
                'password' => app('hash')->make('dosen123'),
                'status' => 2,
                'email' => 'husnilk@fti.unand.ac.id',
            ],
            [
                'id' => 2,
                'username' => 'hafidyz',
                'password' => app('hash')->make('dosen12'),
                'status' => 2,
                'email' => 'hafidyz@gmail.com',
            ],
            [
                'id' => 3,
                'username' => 'mezaslv',
                'password' => app('hash')->make('rahasia'),
                'status' => 2,
                'email' => 'mezaslv@gmail.com',
            ],
            [
                'id' => 4,
                'username' => 'nindy',
                'password' => app('hash')->make('rahasia'),
                'status' => 3,
                'email' => 'nindy@gmail.com',
            ],
            [
                'id' => 5,
                'username' => 'asih',
                'password' => app('hash')->make('rahasia'),
                'status' => 3,
                'email' => 'asih@gmail.com',
            ],
            [
                'id' => 6,
                'username' => 'gabriel',
                'password' => app('hash')->make('rahasia'),
                'status' => 4,
                'email' => 'gabriely@gmail.com',
            ],
            
            [
                'id' => 7,
                'username' => 'aldo',
                'password' => app('hash')->make('rahasia'),
                'status' => 4,
                'email' => 'reshap@gmail.com',
            ],

            [
                'id' => 8,
                'username' => 'anggia',
                'password' => app('hash')->make('rahasia'),
                'status' => 4,
                'email' => 'reyorzk@gmail.com',
            ],

            [
                'id' => 9,
                'username' => 'dira',
                'password' => app('hash')->make('rahasia'),
                'status' => 4,
                'email' => 'diranda@gmail.com',
            ],


        ]);

        DB::table('lecturer')->insert([
            [
                'id'=> '1',
                'name'=> 'Husnil Kamil, M.T',
                'nik'=> '123123',
                'nip'=> '42342342',
                'address'=>'Jln. ',
                'gender'=>'male'
            ],
            [
                'id'=> '2',
                'name'=> 'Hafid Yoza Putra, M.T',
                'nik'=> '123123',
                'nip'=> '198001102008121002',
                'address'=>'Jln. ',
                'gender'=>'male'
            ],
            [
                'id'=> '3',
                'name'=> 'Meza Silvana, M.T',
                'nik'=> '14141414',
                'nip'=> '198604232008022009',
                'address'=>'Jln. ',
                'gender'=>'female'
            ],


        ]);

        DB::table('staff')->insert([
            [
                'id'=> '4',
                'name'=> 'Nindi',
                'nik'=> '123123',
                'nip'=> '8182971',
                'gender'=>'female'
            ],
            [
                'id'=> '5',
                'name'=> 'Asi',
                'nik'=> '1111111',
                'nip'=> '1234567',
                'gender'=>'female'
            ]
        ]);

        DB::table('student')->insert([
            [
                'id'=> '6',
                'name'=> 'Gabriel Azrial Putri',
                'nim'=> '1611521005',
                'gender'=>'female'
            ],
            [
                'id'=> '7',
                'name'=> 'Reinaldo Shandev Pratama',
                'nim'=> '1611522012',
                'gender'=>'male'
            ],
            [
                'id'=> '8',
                'name'=> 'Anggia Okta Yorizka',
                'nim'=> '1611522020',
                'gender'=>'female'
            ], 
            [
                'id'=> '9',
                'name'=> 'Dira Yosfiranda',
                'nim'=> '1611522004',
                'gender'=>'female'
            ]
        ]);        
    }
}
