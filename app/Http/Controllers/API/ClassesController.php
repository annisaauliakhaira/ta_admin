<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\classes;
use App\Http\Resources\classes as classesResource;

class ClassesController extends Controller
{
    public function getAllData(Request $request)
    {
        try{
            $data=classes::select('classes.*')->get();
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>classesResource::collection($data)
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
