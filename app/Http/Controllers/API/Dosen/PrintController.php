<?php

namespace App\Http\Controllers\Api\Dosen;

use App\Http\Controllers\Controller;
use App\exam_schedule;
use PDF;
use App\Helper\helper;

class PrintController extends Controller
{
    public function printDaftarHadir($id)
    {
        $dataPrint = exam_schedule::find($id);
        if(!app('auth')->user()->lecturer->email){
            return response()->json([
                'success'=>false,
                'data'=> "Email User Belum Ada."
            ], 409);
        }

        if(!$dataPrint->verified){
            return response()->json([
                'success'=>false,
                'data'=> "Data Ujian Belum di Konfirmasi Pengawas"
            ], 409);
        }

        $dataEmail = [
            'to' => app('auth')->user()->lecturer->email,
            'name' => app('auth')->user()->lecturer->name,
            'kelas' => $dataPrint->classe->name,
            'Tanggal_ujian' => $dataPrint->date,
            'waktu_mulai' => $dataPrint->start_hour,
            'waktu_selesai' => $dataPrint->ending_hour,
            'title' => "DAFTAR KEHADIRAN UJIAN",
            'titlePDF' => "DAFTAR KEHADIRAN UJIAN_".$dataPrint->classe->name.'_'.$dataPrint->examtype->name.'.pdf'
        ];
        helper::sendMail((object)$dataEmail, $dataPrint, 'print.pesertaujian');
        return response()->json([
            'success'=>true,
            'data'=> "Laporan Daftar Kehadian Ujian dikirim KeEmail ".app('auth')->user()->lecturer->email
        ], 200);
    }

    public function cetakBeritaAcara($id)
    {
        $dataPrint = exam_schedule::find($id);
        if(!app('auth')->user()->lecturer->email){
            return response()->json([
                'success'=>false,
                'data'=> "Email User Belum Ada."
            ], 409);
        }

        if(!$dataPrint->verified){
            return response()->json([
                'success'=>false,
                'data'=> "Data Ujian Belum di Konfirmasi Pengawas"
            ], 409);
        }

        $dataEmail = [
            'to' => app('auth')->user()->lecturer->email,
            'name' => app('auth')->user()->lecturer->name,
            'kelas' => $dataPrint->classe->name,
            'Tanggal_ujian' => $dataPrint->date,
            'waktu_mulai' => $dataPrint->start_hour,
            'waktu_selesai' => $dataPrint->ending_hour,
            'title' => "Daftar Berita Acara",
            'titlePDF' => "Daftar Berita Acara_".$dataPrint->classe->name.'_'.$dataPrint->examtype->name.'.pdf'
        ];
        helper::sendMail((object)$dataEmail, $dataPrint, 'print.beritaacara');
        return response()->json([
            'success'=>true,
            'data'=> "Laporan Daftar Berita Acara dikirim KeEmail ".app('auth')->user()->lecturer->email
        ], 200);
    }
}
