<?php

namespace App\Http\Controllers\API\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\exam_schedule;
use App\Http\Resources\staff\examschedule as examscheduleResource;
use Illuminate\Support\Facades\Auth;

class ExamScheduleContoller extends Controller
{
    public function getAllData(Request $request) 
    {
        try{
            $data=exam_schedule::select('examschedule.*')->join('staff','examschedule.staff_id','=','staff.id')
                                                        ->where('staff_id',Auth::user()->id)->where('examtype_id', $request->examtype_id)->distinct()->get();
            return response()->json([
                'success'=>true,
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

    public function verified($id)
    {
        try {
            $data = exam_schedule::find($id);
            $data->verified = now();
            $data->update();
            return response()->json([
                'success'=>true,
                'data'=>"Berhasil Merubah Data"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'description' => 'Gagal Merubah Data',
                'errors'    => $e->getMessage(),
            ], 405);
        }
    }
}
