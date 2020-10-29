<?php

namespace App\Http\Controllers\API\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\exam_schedule as es;
use App\Http\Resources\staff\examclasses as examclassResource;
use Illuminate\Support\Facades\Auth;

class ExamClassesController extends Controller
{
    public function getData($id)
    {
        try{
            $data=es::find($id)->classe->krses;
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
