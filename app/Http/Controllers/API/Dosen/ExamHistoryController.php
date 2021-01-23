<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\presence as ps;

class ExamHistoryController extends Controller
{

    public function PresenceHistory($id)
    {
        try {
            $data= ps::select('student.name', 'student.nim', 'presence.status', 'presence.presence_time_start', 'presence.presence_time_end')->join('examschedule', function($join)
            {
                $join->on('presence.class_id', '=', 'examschedule.class_id');
                $join->on('presence.examtype_id', '=', 'examschedule.examtype_id');
            })->join('student', 'presence.student_id', '=', 'student.id')->where('examschedule.id', $id)->get();
            return response()->json([
                'success'=>true,
                'data'=>$data
            ]); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => $e->getMessage(),
              ], 405);
        }
    }

}
