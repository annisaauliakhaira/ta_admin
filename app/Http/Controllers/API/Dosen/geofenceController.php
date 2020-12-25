<?php

namespace App\Http\Controllers\API\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room;
use Validator;

class geofenceController extends Controller
{
    public function saveLatLong($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lat' => 'required',
            'lng' => 'required',
            
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()],402);
        }
        
        $room = room::find($id);
        $room->latitude=$request->lat;
        $room->longitude=$request->lng;
        $room->update();

        return response()->json([
            'success' => true,
            'message' => 'Update Berhasil',
            'data'=> $room,
            
        ], 201);

    }
}
