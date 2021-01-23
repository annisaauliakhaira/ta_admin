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
                                                        ->where('lecturerclass.lecturer_id',Auth::user()->id)->where('examtype_id', $request->examtype_id)->distinct()->get(); 
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

    public function changeStatus($id)
    {
        try {
            $data = exam_schedule::find($id);
            if($data->status==0){
                $data->status = 1;
                $data->waktu_masuk = now();
                $data->update();
                return response()->json([
                    'success'=>true,
                    'data'=>"Berhasil Merubah Data"
                ]);
            }
            return response()->json([
                'success'=>false,
                'data'=>"Sudah Masuk ke Area"
            ],405);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'description' => 'Gagal Merubah Data',
                'errors'    => $e->getMessage(),
            ], 405);
        }
    }

}
