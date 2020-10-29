<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lecturer;
use App\user;
use App\Http\Resources\dosen\about as aboutResource;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function getAllData(Request $request)
    {
        try{
            $data=lecturer::select('lecturer.*')->get();
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>aboutResource::collection($data)
            ], 202);
        }

        catch(\Exception $e){
            return response()->json([
                'success'=>false,
                'description'=>'Gagal Mengambil Data',
                'errors'=>$e->getMessage()
            ], 405);
        }
    }
}
