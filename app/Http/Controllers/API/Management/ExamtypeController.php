<?php

namespace App\Http\Controllers\API\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\examtype;
use App\Http\Resources\management\examtype as examtypeResource;

class ExamtypeController extends Controller
{
    public function getAllData(Request $request)
    {
        try{
            $data=examtype::all();
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>examtypeResource::collection($data)
            ], 200);
        }
        catch(\Exception$e){
            return response()->json([
                'succes'=>false,
                'description'=>'Gagal Mengambil Data',
                'errors'=>$e->getMessage()
            ], 405);
        }
    }
}
