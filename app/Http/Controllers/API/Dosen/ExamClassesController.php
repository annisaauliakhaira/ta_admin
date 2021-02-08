<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\presence as ps;
use App\Http\Resources\dosen\examclasses as examclassResource;
use Illuminate\Support\Facades\Auth; 

class ExamClassesController extends Controller
{

    public function getData($id)
    {
        try{
            $data=ps::select('presence.*')->join('examschedule', function($join)
            {
                $join->on('presence.class_id', '=', 'examschedule.class_id');
                $join->on('presence.examtype_id', '=', 'examschedule.examtype_id');
            })->where('examschedule.id', $id)->get();
            // dd($data);
            // dd($data); 
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>examclassResource::collection($data)
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'succes'=>false,
                'description'=>'Gagal Mengambil Data',
                'erros'=>$e->getMessage()
            ], 405);
        }
    }
   
}
