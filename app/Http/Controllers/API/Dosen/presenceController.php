<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\presence;
use App\lecturer as Lecturer;
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
        catch(Exception $e){
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
            $data = DB::select("SELECT classes.id as class_id, classes.name as class_name,  examschedule.date,  COUNT(presence.id) AS total, COUNT(IF(presence.status=0, presence.id, null)) AS tidak_hadir, COUNT(IF(presence.status=1, presence.id, null)) AS hadir, COUNT(IF(presence.status=2, presence.id, null)) AS izin  FROM `presence` JOIN examschedule ON examschedule.id=presence.schedule_id JOIN classes ON examschedule.class_id=classes.id JOIN lecturerclass ON classes.id=lecturerclass.class_id JOIN lecturer ON lecturerclass.lecturer_id=lecturer.id WHERE lecturer.id=$id GROUP BY classes.id, examschedule.date, classes.name ");
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

    public function updateManual($id, $presence_status)
    {
        try{
            $data = presence::find($id);
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
