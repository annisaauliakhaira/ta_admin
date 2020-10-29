<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room;
use App\Http\Resources\room as roomResource;

class RoomController extends Controller
{
    public function getAllData(Request $request)
    {
        try{
            $data=room::select('room.*')->get();
                                        
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>roomResource::collection($data)
            ], 200);
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
