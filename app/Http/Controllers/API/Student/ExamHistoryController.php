<?php

namespace App\Http\Controllers\API\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\presence as ps;
use App\Http\Resources\student\examshistory as examhistoryResource;

class ExamHistoryController extends Controller
{
    public function getHistory(Request $request)
    {
        try{
            $id=Auth::user()->id;
            $data =ps::select('presence.*')->join('examschedule', function($join)
            {
                $join->on('presence.class_id', '=', 'examschedule.class_id');
                $join->on('presence.examtype_id', '=', 'examschedule.examtype_id');
            })->join('krs', function($join)
            {
                $join->on('presence.class_id', '=', 'krs.class_id');
                $join->on('presence.student_id', '=', 'krs.student_id');
            })->where('krs.student_id', $id)->where('examschedule.examtype_id', $request->examtype_id)->distinct()->get();
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>examhistoryResource::collection($data)
            ]); 
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => $e->getMessage(),
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
