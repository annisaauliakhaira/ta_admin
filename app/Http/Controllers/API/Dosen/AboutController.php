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
            $data=Auth::user()->lecturer;
            return response()->json([
                'success'=>true,
                'data'=>new aboutResource($data)
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
