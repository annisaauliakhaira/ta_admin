<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\presence;
use App\Http\Resources\dosen\presence as presence_;

class presenceController extends Controller
{
    public function getData(Request $request)
    {
        try{
            $data = presence::where('code', $request->code)->first();
            return response()->json([
                'success'=>true,
                'data'=>new presence_($data)
            ]);

        }
        catch(Exception $e){
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => $e->getMessage(),
              ], 405);
        }
    }
}
