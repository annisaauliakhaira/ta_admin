<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\exam_schedule;
use App\Http\Resources\dosen\examschedule as examscheduleResource;
use Illuminate\Support\Facades\Auth;

class ExamSchdeuleController extends Controller
{
    public function getAllData(Request $request)
    {
        try{
            $data=exam_schedule::select('examschedule.*')->join('lecturerclass','examschedule.class_id','=','lecturerclass.class_id')
                                                        ->where('lecturerclass.lecturer_id',Auth::user()->id)->distinct()->get(); 
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>examscheduleResource::collection($data)
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
}
