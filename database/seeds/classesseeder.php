<?php

use Illuminate\Database\Seeder;

class classesseeder extends Seeder
{
    
    public function run()
    { 
        DB::table('classes')->insert([
            [
                'id'=>'TSI203-01',
                'name'=>'Bahasa Pemograman Lanjut',
                'courses_id'=>'TSI203',
                'period_id'=>'1'
            ],
            [
                'id'=>'TSI203-02',
                'name'=>'Bahasa Pemograman Lanjut',
                'courses_id'=>'TSI203',
                'period_id'=>'1'
            ],
            [
                'id'=>'TSI309-01',
                'name'=>'Basis Data Lanjut',
                'courses_id'=>'TSI309',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI309-02',
                'name'=>'Basis Data Lanjut',
                'courses_id'=>'TSI309',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI409-01',
                'name'=>'Customer Relationship Management',
                'courses_id'=>'TSI409',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI409-02',
                'name'=>'Customer Relationship Management',
                'courses_id'=>'TSI409',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI207-01',
                'name'=>'Dasar Infrastuktur Teknologi',
                'courses_id'=>'TSI207',
                'period_id'=>'1'
            ],
            [
                'id'=>'TSI207-02',
                'name'=>'Dasar Infrastuktur Teknologi',
                'courses_id'=>'TSI207',
                'period_id'=>'1'
            ],
            [
                'id'=>'EKM103-01',
                'name'=>'Dasar-Dasar Manajemen',
                'courses_id'=>'EKM103',
                'period_id'=>'1'
            ],
            [
                'id'=>'EKM103-02',
                'name'=>'Dasar-Dasar Manajemen',
                'courses_id'=>'EKM103',
                'period_id'=>'1'
            ],
            [
                'id'=>'TSI103-01',
                'name'=>'Dasar-Dasar Pemrograman',
                'courses_id'=>'TSI103',
                'period_id'=>'1'
            ],
            [
                'id'=>'TSI103-02',
                'name'=>'Dasar-Dasar Pemrograman',
                'courses_id'=>'TSI103',
                'period_id'=>'1'
            ],
            [
                'id'=>'TSI303-01',
                'name'=>'Data Mining',
                'courses_id'=>'TSI303',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI303-02',
                'name'=>'Data Mining',
                'courses_id'=>'TSI303',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI403-01',
                'name'=>'E-Commerce',
                'courses_id'=>'TSI403',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI403-02',
                'name'=>'E-Commerce',
                'courses_id'=>'TSI403',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI405-01',
                'name'=>'Enterprise Architecture',
                'courses_id'=>'TSI405',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI405-02',
                'name'=>'Enterprise Architecture',
                'courses_id'=>'TSI405',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI301-01',
                'name'=>'Implementasi dan Integrasi Sistem Informasi',
                'courses_id'=>'TSI301',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI301-02',
                'name'=>'Implementasi dan Integrasi Sistem Informasi',
                'courses_id'=>'TSI301',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI311-01',
                'name'=>'Keamanan Sistem Informasi',
                'courses_id'=>'TSI311',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI311-02',
                'name'=>'Keamanan Sistem Informasi',
                'courses_id'=>'TSI311',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI401-01',
                'name'=>'Komputer dan Masyarakat',
                'courses_id'=>'TSI401',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI401-02',
                'name'=>'Komputer dan Masyarakat',
                'courses_id'=>'TSI401',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI205-01',
                'name'=>'Manajemen Basis Data',
                'courses_id'=>'TSI205',
                'period_id'=>'2'
            ],
            [
                'id'=>'TSI205-02',
                'name'=>'Manajemen Basis Data',
                'courses_id'=>'TSI205',
                'period_id'=>'2'
            ],
        ]);
    }
}
