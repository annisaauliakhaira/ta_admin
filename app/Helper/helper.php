<?php

namespace App\Helper;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

class helper{
    public static function get($link)
    {
        try{
            $baseUrl = 'http://127.0.0.1:8000';
            $option = array('http'=>array('header'=>"User-Agent:MyAgent/1.0\r\n"));
            $context = stream_context_create($option);
            $data = file_get_contents($baseUrl.'/'.$link, false, $context);
            return json_decode($data);

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public static function sendMail($dataEmail, $dataPrint, $file)
    {  
        ini_set('max_execution_time', 300);
        $pdf = PDF::loadView($file, array('data' => $dataPrint));
        $pdf->setPaper('a4', 'potrait');
        Mail::send('print.emailTemplate', array('data' => $dataEmail), function($message)use($dataEmail, $pdf) {
            $message->to($dataEmail->to, $dataEmail->to)
                    ->subject($dataEmail->title)
                    ->attachData($pdf->output(), $dataEmail->titlePDF);
        });
        return "Berhasil Mengirim Email";
    }
}