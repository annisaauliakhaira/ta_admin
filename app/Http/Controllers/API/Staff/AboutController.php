<?php

namespace App\Http\Controllers\API\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\staff;
use App\Http\Resources\staff\about as aboutResource;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function getAllData(Type $var = null)
    {
        try{
            $data=staff::all();
            return response()->json([
                'succes'=>true,
                'total_row'=>$data->count(),
                'data'=>aboutResource::collection($data)
            ], 202);
        }

        catch(Exception $e){
            return response()->json([
                'succes'=>false,
                'description'=>'Gagal Mengambil Data',
                'errors'=>$e->getMessage()
            ], 405);
        }
    }
}
