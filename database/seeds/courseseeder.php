<?php

use Illuminate\Database\Seeder;

class courseseeder extends Seeder
{
    
    public function run()
    {
        DB::table('courses')->insert([
            [
                'id'=>'TSI203',
                'name'=>'Bahasa Pemograman Lanjut',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI309',
                'name'=>'Basis Data Lanjut',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI409',
                'name'=>'Customer Relationship Management',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI207',
                'name'=>'Dasar Infrastuktur Teknologi',
                'sks'=>'3'
            ],
            [
                'id'=>'EKM103',
                'name'=>'Dasar-Dasar Manajemen',
                'sks'=>'2'
            ],
            [
                'id'=>'TSI103',
                'name'=>'Dasar-Dasar Pemrograman',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI303',
                'name'=>'Data Mining',
                'sks'=>'2'
            ],
            [
                'id'=>'TSI403',
                'name'=>'E-Commerce',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI405',
                'name'=>'Enterprise Architecture',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI301',
                'name'=>'Implementasi dan Integrasi Sistem Informasi',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI311',
                'name'=>'Keamanan Sistem Informasi',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI401',
                'name'=>'Komputer dan Masyarakat',
                'sks'=>'2'
            ],
            [
                'id'=>'TSI205',
                'name'=>'Manajemen Basis Data',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI307',
                'name'=>'Manajemen Proyek SI',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI415',
                'name'=>'Pemrograman Database',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI101',
                'name'=>'Pengantar Sistem Informasi',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI201',
                'name'=>'Sistem Informasi Geografi',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI419',
                'name'=>'Spesifikasi Bahasa Pemograman',
                'sks'=>'3'
            ],
            [
                'id'=>'TSI413',
                'name'=>'Supply Chain Management',
                'sks'=>'3'
            ],
        ]);
    }
}
