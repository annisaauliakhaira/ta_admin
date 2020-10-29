<?php

namespace App\Http\Controllers\API\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\courses;
use App\Http\Resources\management\courses as coursesResource;

class CoursesController extends Controller
{
    public function getAllData(Type $var = null)
    {
        try{
            $data=courses::all();
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>coursesResource::collection($data)
            ], 200);
        }

        catch(\Exception $e){
            return response()->json([
                'success'=>false,
                'description'=>'Gagal Mengambil Data',
                'errors'=>$e->getMessage()
            ], 405);
        }
    }

    public function getData($id)
    {
        try {
            $totalData = coursesResource::where('id',$id)->get()->count();
  
            if(!$totalData>0){
              return response()->json([
                  'success' => false,
                  'description' => 'Data tidak ditemukan'
              ], 404);
            }
  
            return response()->json([
              'success' => true,
              'total_row' => $totalData,
              'data'    => cousesResource::findOrFail($id),
            ], 200);
  
          }
          catch (\Exception $e) {
            return response()->json([
              'success' => false,
              'description' => 'Gagal Mengambil Data',
              'errors'    => $e->getMessage(),
            ], 405);
          }
    }
}
