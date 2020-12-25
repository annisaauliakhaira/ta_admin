<?php

namespace App\Http\Controllers\API\Staff;

use App\Http\Controllers\Controller;
use App\presence;
use App\Http\Resources\staff\presence as presence_;
use Illuminate\Http\Request;

class presenceController extends Controller
{
    public function getData(Request $request) 
    {
        try{
            $data = presence::where('code', $request->code)->first();
            $data->status=1;
            $data->update();
            return response()->json([
                'success'=>true,
                'data'=>new presence_($data)
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

    public function updateManual($code, $presence_status)
    {
        try{
            $data = presence::where('code', $code)->first();
            $data->status=$presence_status;
            $data->update();
            return response()->json([
                'success'=>true,
                'data'=>new presence_($data) 
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
