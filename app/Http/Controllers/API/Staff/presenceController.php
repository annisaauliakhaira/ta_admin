<?php

namespace App\Http\Controllers\API\Staff;

use App\Http\Controllers\Controller;
use App\presence;
use App\Http\Resources\staff\presence as presence_;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class presenceController extends Controller
{
    public function getData(Request $request) 
    {
        try{
            $data = presence::select('presence.*')->where('code', $request->code)->join('examschedule', function($join)
            {
                $join->on('presence.class_id', '=', 'examschedule.class_id');
                $join->on('presence.examtype_id', '=', 'examschedule.examtype_id');
            })->where('staff_id', Auth::user()->id)->first();
            if($data){
                if($data->status==0){
                    $data->status=1;
                    $data->update();
                    return response()->json([
                        'success'=>true,
                        'data'=>new presence_($data),
                        'pesan' => '-'
    
                    ]);
                }
    
                return response()->json([
                    'success' => true,
                    'data' => new presence_($data),
                    'pesan' => 'Telah Mengambil Absen'
                ]);
            }    
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    =>"-",
            ], 405);

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
