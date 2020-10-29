<?php

namespace App\Http\Controllers\API\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\building;
use App\Http\Resources\management\building as buildingResource;

class BuildingController extends Controller
{
    public function getAllData(Type $var = null)
    {
        try{
            $data=building::all();
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>buildingResource::collection($data)
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'success'=>false,
                'description'=>'Gagal mengambil data',
                'errors'=>$e->getMessage()
            ], 405);
        }
    }

    public function getData($id)
    {
        try{
            $totalData=building::where('id',$id)->get()->count();

            if(!$totalData>0){
                return response()->json([
                    'success'=>false,
                    'description'=>'Data Tidak Ditemukan'
                ], 404);
            }

            return response()->json([
                'succes'=>trus,
                'total_row'=>$totalData,
                'data'=>buildingResource::findOrFail($id)
            ], 200);
        }

        catch(\Exception $e){
            return response()->json([
                'success'=>false,
                'description'=>'Gagal mengambil data',
                'errors'=>$e->getMessage()
            ], 405);
        }
    }
}
