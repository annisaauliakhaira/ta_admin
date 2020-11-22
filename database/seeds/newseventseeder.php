<?php

use Illuminate\Database\Seeder;

class newseventseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsevent')->insert([
            [
                'id'=>'1',
                'news_event'=>'Aldo berdiskusi dengan Malik selama ujian',
                'exam_id'=>'A11'
            ],
            [
                'id'=>'2',
                'news_event'=>'Dira Yosfiranda Terlambat datang ujian',
                'exam_id'=>'A12'
            ],
            [
                'id'=>'3',
                'news_event'=>'Murdayani sering izin ke toilet selama ujian',
                'exam_id'=>'B23'
            ],
            [
                'id'=>'4',
                'news_event'=>'Murdayani sering izin ke toilet selama ujian',
                'exam_id'=>'B24'
            ]
        ]);
    }
}
