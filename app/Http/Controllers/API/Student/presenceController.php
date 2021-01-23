<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\presence;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class presenceController extends Controller
{
    public function updateWaktu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'class_id' => 'required',
            'type' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()],402);
        }
        
        try {
            $data = presence::where('code', $request->code)->where('student_id', Auth::user()->id)->where('class_id',$request->class_id)->first();
            if($data){
                
                if($request->type=="start_time"){
                    if($data->presence_time_start){
                        return response()->json([
                            'success' => false,
                            'description' => 'Gagal Merubah Data Start Time'
                        ], 405);
                    }
                    $data->presence_time_start = now();
                }

                if($request->type=="end_time"){
                    if($data->presence_time_end){
                        return response()->json([
                            'success' => false,
                            'description' => 'Gagal Merubah Data End Time'
                        ], 405);
                    }
                    $data->presence_time_end = now();
                }
                
                $data->update();
                return response()->json([
                    'success'=>true,
                    'data'=> "Berhasil Merubah Data"
                ]);
            }
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => "Data not found",
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'description' => 'Gagal Mengambil Data',
                'errors'    => $e->getMessage(),
            ], 405);
        }
    }

    public function getHistory(Request $request)
    {
        # code...
    }
}
