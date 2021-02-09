<?php

namespace App\Http\Controllers\API\Dosen;

use App\exam_schedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{presence};
use App\Http\Resources\dosen\presence as presence_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class presenceController extends Controller
{
    public function getData(Request $request)
    {
        try{
            $data = presence::where('code', $request->code)->join('lecturerclass','lecturerclass.class_id','=','presence.class_id')->where('lecturer_id', Auth::user()->id)->first();
            if($data){
                if($data->status==0){
                    $data->status=1;
                    $data->update();
                    return response()->json([
                        'success'=>true,
                        'data'=>new presence_($data),
                        'pesan' => '-'
    
                    ]);
                }
    
                return response()->json([
                    'success' => true,
                    'data' => new presence_($data),
                    'pesan' => 'Telah Mengambil Absen'
                ]);
            }    
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    =>"-",
            ], 405);

        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => $e->getMessage(),
              ], 405);
        }
    }

    public function getHistory(Request $request)
    {
        try{
            $id=Auth::user()->id;
            $typeId = $request->type_id;
            $data = DB::select("SELECT courses.name as courses_name, classes.name as class_name, examschedule.verified as verified_at,  examschedule.date, examschedule.id AS exam_id, examschedule.waktu_masuk, examtype.name as examtype, room.name as room,date_format(examschedule.start_hour, '%H:%i') as start_hour,  date_format(examschedule.ending_hour, '%H:%i') as ending_hour, examschedule.status, COUNT(presence.student_id) AS total, COUNT(IF(presence.status=0, presence.student_id, null)) AS tidak_hadir, COUNT(IF(presence.status=1, presence.student_id, null)) AS hadir, COUNT(IF(presence.status=2, presence.student_id, null)) AS izin  FROM `presence` JOIN examschedule ON examschedule.examtype_id=presence.examtype_id AND examschedule.class_id=presence.class_id JOIN examtype ON examschedule.examtype_id=examtype.id JOIN classes ON examschedule.class_id=classes.id JOIN room ON examschedule.room_id=room.id JOIN courses ON courses.id=classes.courses_id JOIN lecturerclass ON classes.id=lecturerclass.class_id JOIN lecturer ON lecturerclass.lecturer_id=lecturer.id WHERE lecturer.id=$id and examtype.id=$typeId GROUP BY courses.name, examschedule.date, classes.name, examschedule.verified, examschedule.id, examschedule.waktu_masuk, examtype.name, room.name, examschedule.start_hour, examschedule.ending_hour, examschedule.status");
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
            $data = presence::where('code', $code)->join('lecturerclass','lecturerclass.class_id','=','presence.class_id')->where('lecturer_id', Auth::user()->id)->first();
            if($data){
                $data->status=$presence_status;
                $data->update();
                return response()->json([
                    'success'=>true,
                    'data'=>new presence_($data)
                ]);
            }
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    =>"",
            ], 405);

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
