<?php

namespace App\Http\Controllers\API\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\period;
use App\Http\Resources\management\period as periodeResource;

class PeriodController extends Controller
{
    public function getAllData(Request $request)
    {
        try{
            $data = period::all();
            return response()->json([
              'success' => true,
              'total_row' => $data->count(),
              'data'    => periodeResource::collection($data),
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
