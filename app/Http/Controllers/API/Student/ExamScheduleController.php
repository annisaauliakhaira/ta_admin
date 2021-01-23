<?php

namespace App\Http\Controllers\API\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\presence;
use App\Http\Resources\student\examschedule as examscheduleResource;
use App\Http\Resources\student\about as aboutResource;
use Illuminate\Support\Facades\Auth;

class ExamScheduleController extends Controller
{
    public function getAllData(Request $request)
    {
        try{
            $student_id=app('auth')->user()->id;
            $data=presence::select('presence.*')->where('student_id','=', $student_id)->where('examtype_id', $request->examtype_id)->distinct()->get();
            return response()->json([
                'succes'=>true,
                'total_row'=>$data->count(),
                'data'=>examscheduleResource::collection($data)
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
