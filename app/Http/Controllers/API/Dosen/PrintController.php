<?php

namespace App\Http\Controllers\Api\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\exam_schedule;
use PDF;

class PrintController extends Controller
{
    public function printDaftarHadir($id)
    {
        ini_set('max_execution_time', 300);
        $data = exam_schedule::find($id);
        $pdfName = "DAFTAR HADIR UJIAN_".$data->classe->name.'_'.$data->examtype->name.'.pdf';
        $pdf = PDF::loadView('print.pesertaujian', array('data' => $data));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->download($pdfName);
        return $pdf->stream();
    }

    public function cetakBerita($id)
    {
        ini_set('max_execution_time', 300);
        $data = exam_schedule::find($id);
        $pdfName = "BERITA ACARA UJIAN_".$data->classe->name.'_'.$data->examtype->name.'.pdf';
        $pdf = PDF::loadView('print.beritaacara', array('data' => $data));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->download($pdfName);
        return $pdf->stream();
    }
}
