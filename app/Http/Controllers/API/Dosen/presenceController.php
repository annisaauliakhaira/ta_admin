<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\presence;
use App\Http\Resources\dosen\presence as presence_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class presenceController extends Controller
{
    public function getData(Request $request)
    {
        try{
            $data = presence::where('code', $request->code)->first();
            $data->status=1;
            $data->update();
            return response()->json([
                'success'=>true,
                'data'=>new presence_($data)
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => $e->getMessage(),
              ], 405);
        }
    }

    public function getHistory()
    {
        try{
            $id=Auth::user()->id;
            $data = DB::select("SELECT courses.name as courses_name, classes.name as class_name,  examschedule.date,  COUNT(presence.student_id) AS total, COUNT(IF(presence.status=0, presence.student_id, null)) AS tidak_hadir, COUNT(IF(presence.status=1, presence.student_id, null)) AS hadir, COUNT(IF(presence.status=2, presence.student_id, null)) AS izin  FROM `presence` JOIN examschedule ON examschedule.examtype_id=presence.examtype_id AND examschedule.class_id=presence.class_id JOIN classes ON examschedule.class_id=classes.id JOIN courses ON courses.id=classes.courses_id JOIN lecturerclass ON classes.id=lecturerclass.class_id JOIN lecturer ON lecturerclass.lecturer_id=lecturer.id WHERE lecturer.id=$id GROUP BY courses.name, examschedule.date, classes.name ");
            return response()->json([
                'success'=>true,
                'data'=>$data
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => $e->getMessage(),
              ], 405);
        }
    }

    public function updateManual($code, $presence_status)
    {
        try{
            $data = presence::where('code', $code)->first();
            $data->status=$presence_status;
            $data->update();
            return response()->json([
                'success'=>true,
                'data'=>new presence_($data)
            ]);

        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => $e->getMessage(),
              ], 405);
        }
    }
    
}
