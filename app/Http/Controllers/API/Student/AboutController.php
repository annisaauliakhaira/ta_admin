<?php

namespace App\Http\Controllers\API\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\student;
use App\user;
use App\Http\Resources\student\about as aboutResource;


class AboutController extends Controller
{
    public function getAllData(Request $request)
    {
        try{
            $data=student::all();
            return response()->json([
                'succes'=>true,
                'total_row'=>$data->count(),
                'data'=>aboutResource::collection($data)
            ], 202);
        }

        catch(\Exception $e){
            return response()->json([
                'succes'=>false,
                'description'=>'Gagal Mengambil Data',
                'errors'=>$e->getMessage()
            ], 405);
        }
    }
}
