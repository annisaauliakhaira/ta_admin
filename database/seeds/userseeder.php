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
                'username' => 'mezaslv',
                'password' => app('hash')->make('dosen123'),
                'status' => 2,
                'email' => 'mezaslv@gmail.com',
            ],
            [
                'id' => 3,
                'username' => 'rickyakbr',
                'password' => app('hash')->make('dosen123'),
                'status' => 2,
                'email' => 'rickyakbar@gmail.com',
            ],
            [
                'id' => 4,
                'username' => 'hasdiptr',
                'password' => app('hash')->make('dosen123'),
                'status' => 2,
                'email' => 'hasdiputra@gmail.com',
            ],
            [
                'id' => 5,
                'username' => 'suryaafnrs',
                'password' => app('hash')->make('dosen123'),
                'status' => 2,
                'email' => 'suryaafnarius@gmail.com',
            ],
            [
                'id' => 6,
                'username' => 'fajirlakbr',
                'password' => app('hash')->make('dosen123'),
                'status' => 2,
                'email' => 'fajrilakbar@gmail.com',
            ],
            
            [
                'id' => 7,
                'username' => 'harissrym',
                'password' => app('hash')->make('dosen123'),
                'status' => 2,
                'email' => 'harissuryamen@gmail.com',
            ],

            [
                'id' => 8,
                'username' => 'nindy',
                'password' => app('hash')->make('staff123'),
                'status' => 3,
                'email' => 'nindymalisha@gmail.com',
            ],

            [
                'id' => 9,
                'username' => 'nurkumala',
                'password' => app('hash')->make('staff123'),
                'status' => 3,
                'email' => 'nurkumalasari@gmail.com',
            ],

            [
                'id' => 10,
                'username' => 'dwihrln',
                'password' => app('hash')->make('staff123'),
                'status' => 3,
                'email' => 'dewiherlina@gmail.com',
            ],
            
            [
                'id' => 11,
                'username' => 'asih',
                'password' => app('hash')->make('staff123'),
                'status' => 3,
                'email' => 'qadriasih@gmail.com',
            ],
            
            [
                'id' => 12,
                'username' => 'erizal',
                'password' => app('hash')->make('staff123'),
                'status' => 3,
                'email' => 'erizal@gmail.com',
            ],
            
            [
                'id' => 13,
                'username' => 'sriwhyn',
                'password' => app('hash')->make('staff123'),
                'status' => 3,
                'email' => 'sriwahyuni@gmail.com',
            ],
             
            [
                'id' => 14,
                'username' => 'annisa',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'khairaannisa@gmail.com',
            ],
             
            [
                'id' => 15,
                'username' => 'reshap',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'reshap@gmail.com',
            ],
             
            [
                'id' => 16,
                'username' => 'diray',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'dira@gmail.com',
            ],
             
            [
                'id' => 17,
                'username' => 'noradzll',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'noradzillah@gmail.com',
            ],
            
            [
                'id' => 18,
                'username' => 'reyorzk',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'reyorzk@gmail.com',
            ],
            
            [
                'id' => 19,
                'username' => 'murda',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'murdayani@gmail.com',
            ],
            
            [
                'id' => 20,
                'username' => 'malik',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'malik@gmail.com',
            ],
            
            [
                'id' => 21,
                'username' => 'asraf',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'asraf@gmail.com',
            ],
            
            [
                'id' => 22,
                'username' => 'farel',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'farel@gmail.com',
            ],
            
            [
                'id' => 23,
                'username' => 'apis',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'hafidz@gmail.com',
            ],
            
            [
                'id' => 24,
                'username' => 'annisawr',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'annisawr@gmail.com',
            ],
            
            [
                'id' => 25,
                'username' => 'diohrf',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'diohrf@gmail.com',
            ],
            
            [
                'id' => 26,
                'username' => 'mhamdi',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'mhamdi@gmail.com',
            ],
            
            [
                'id' => 27,
                'username' => 'erickok',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'erickok@gmail.com',
            ],
            
            [
                'id' => 28,
                'username' => 'nadillasyq',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'nadillasyq@gmail.com',
            ],
            
            [
                'id' => 29,
                'username' => 'yolandaapr',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'yolandaapr@gmail.com',
            ],
            
            [
                'id' => 30,
                'username' => 'yuliaagst',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'yuliaagst@gmail.com',
            ],
            
            [
                'id' => 31,
                'username' => 'novanvn',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'novanvn@gmail.com',
            ],
            
            [
                'id' => 32,
                'username' => 'afifmln',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'afifmln@gmail.com',
            ],
            
            [
                'id' => 33,
                'username' => 'rahmajsm',
                'password' => app('hash')->make('student123'),
                'status' => 4,
                'email' => 'rahmajsm@gmail.com',
            ],

        ]);

        DB::table('lecturer')->insert([
            [
                'id'=> '1',
                'name'=> 'Husnil Kamil, M.T',
                'nik'=> '123123',
                'nip'=> '198201182008121002',
                'address'=>'Jln. ',
                'gender'=>'male'
            ],
            [
                'id'=> '2',
                'name'=> 'Meza Silvana, M.T',
                'nik'=> '123123',
                'nip'=> '198103252008122003',
                'address'=>'Jln. ',
                'gender'=>'female'
            ],
            [
                'id'=> '3',
                'name'=> 'Ricky Akbar, M.Kom',
                'nik'=> '14141414',
                'nip'=> '198410062012121001',
                'address'=>'Jln. ',
                'gender'=>'male'
            ],
            [
                'id'=> '4',
                'name'=> 'Hasdi Putra, M.T',
                'nik'=> '14141414',
                'nip'=> '198327072008121003',
                'address'=>'Jln. ',
                'gender'=>'male'
            ],
            [
                'id'=> '5',
                'name'=> 'Prof. Surya Afnarius. Ph.d',
                'nik'=> '14141414',
                'nip'=> '196404091995121001',
                'address'=>'Jln. ',
                'gender'=>'male'
            ],   
            [
                'id'=> '6',
                'name'=> 'Fajril Akbar, M.Sc',
                'nik'=> '14141414',
                'nip'=> '198001102008121002',
                'address'=>'Jln. ',
                'gender'=>'male'
            ],    
            [
                'id'=> '7',
                'name'=> 'Haris Suryamen, M.Sc',
                'nik'=> '14141414',
                'nip'=> '197503232012121001',
                'address'=>'Jln. ',
                'gender'=>'male'
            ],  


        ]);

        DB::table('staff')->insert([
            [
                'id'=> '8',
                'name'=> 'Nindy Malisha, SE',
                'nik'=> '123123',
                'nip'=> '19890616201502162001',
                'gender'=>'female'
            ],
            [
                'id'=> '9',
                'name'=> 'Nur Kumala Sari, S.Kom',
                'nik'=> '1111111',
                'nip'=> '19890616201601162001',
                'gender'=>'female'
            ],
            [
                'id'=> '10',
                'name'=> 'Dewi Herlina, A.Md',
                'nik'=> '1111111',
                'nip'=> '197803222001122002',
                'gender'=>'female'
            ],
            [
                'id'=> '11',
                'name'=> 'Qadriasih Wina Putri, MM',
                'nik'=> '1111111',
                'nip'=> '19880511201601163001',
                'gender'=>'female'
            ],
            [
                'id'=> '12',
                'name'=> 'Erizal',
                'nik'=> '1111111',
                'nip'=> '196811012014091002',
                'gender'=>'male'
            ],
            [
                'id'=> '13',
                'name'=> 'Sri Wahyu Hasni, A.Md',
                'nik'=> '1111111',
                'nip'=> '198910119201302162001',
                'gender'=>'female'
            ]
        ]);

        DB::table('student')->insert([
            [
                'id'=> '14',
                'name'=> 'Annisa Aulia Khaira',
                'nim'=> '1611521006',
                'gender'=>'female'
            ],
            [
                'id'=> '15',
                'name'=> 'Reinaldo Shandev Pratama',
                'nim'=> '1611522012',
                'gender'=>'male'
            ],
            [
                'id'=> '16',
                'name'=> 'Dira Yosfiranda',
                'nim'=> '1611522004',
                'gender'=>'female'
            ], 
            [
                'id'=> '17',
                'name'=> 'Nor Adzillah Adya',
                'nim'=> '1611521004',
                'gender'=>'female'
            ],
            [
                'id'=> '18',
                'name'=> 'Anggia Okta Yorizka',
                'nim'=> '1611521020',
                'gender'=>'female'
            ],
            [
                'id'=> '19',
                'name'=> 'Murdayani',
                'nim'=> '1611529002',
                'gender'=>'female'
            ],
            [
                'id'=> '20',
                'name'=> 'Malik Abdul Aziz Lubis',
                'nim'=> '1611521016',
                'gender'=>'male'
            ],
            [
                'id'=> '21',
                'name'=> 'Miftahul Asraf',
                'nim'=> '1611523012',
                'gender'=>'male'
            ],
            [
                'id'=> '22',
                'name'=> 'M. Farel Aleski',
                'nim'=> '1611522006',
                'gender'=>'male'
            ],
            [
                'id'=> '23',
                'name'=> 'Muhammad Alhafidz',
                'nim'=> '1611521002',
                'gender'=>'male'
            ],
            [
                'id'=> '24',
                'name'=> 'Annisa Wistia Rizalmi',
                'nim'=> '1711521006',
                'gender'=>'female'
            ],
            [
                'id'=> '25',
                'name'=> 'Dio Harvandy',
                'nim'=> '1711522004',
                'gender'=>'male'
            ],
            [
                'id'=> '26',
                'name'=> 'Muhammad Hamdi',
                'nim'=> '1711522014',
                'gender'=>'male'
            ],
            [
                'id'=> '27',
                'name'=> 'Erick Okta Wirdana',
                'nim'=> '1711521002',
                'gender'=>'male'
            ],
            [
                'id'=> '28',
                'name'=> 'Nadilla Syihaq',
                'nim'=> '1711521012',
                'gender'=>'female'
            ],
            [
                'id'=> '29',
                'name'=> 'Yolanda Apricilia',
                'nim'=> '1711521014',
                'gender'=>'female'
            ],
            [
                'id'=> '30',
                'name'=> 'Yulia Agustin',
                'nim'=> '1711523006',
                'gender'=>'female'
            ],
            [
                'id'=> '31',
                'name'=> 'Nova Noviana',
                'nim'=> '1711521001',
                'gender'=>'female'
            ],
            [
                'id'=> '32',
                'name'=> 'Afif Maulana Isman',
                'nim'=> '1711522012',
                'gender'=>'male'
            ],
            [
                'id'=> '33',
                'name'=> 'Rahmania Jasmin',
                'nim'=> '1711522002',
                'gender'=>'female'
            ],
        ]);        
    }
}
