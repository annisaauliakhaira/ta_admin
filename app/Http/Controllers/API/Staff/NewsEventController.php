<?php

namespace App\Http\Controllers\API\Staff;

use App\Http\Controllers\Controller;
use App\newsevent;
use Illuminate\Http\Request;
use App\Http\Resources\staff\newsevent as newseventResource;
use Validator;

class NewsEventController extends Controller
{
    public function saveNews($exam_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news_event' => 'required'
            
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()],402);
        }
        
        $event = new newsevent();
        $event->id=\Str::random(5);
        $event->exam_id=$exam_id;
        $event->news_event=$request->news_event;
        $event->save();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menyimpan Data',
            'data'=> $event
            
        ], 201);
        
    }

    public function show($id)
    {
        try{
            $data=newsevent::select('newsevent.*')->join('examschedule', 'examschedule.id', '=', 'newsevent.exam_id')->where('examschedule.id', '=', $id)->get();
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>newseventResource::collection($data)
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

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news_event' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()],402);
        }
        $event = newsevent::find($id);
        $event->news_event=$request->news_event;
        $event->update();
        return response()->json([
            'success' => true,
            'message' => 'Update Berita Acara Berhasil',
            'data'=> $event
            
        ], 201);
    }

    public function delete($id)
    {
        $event=newsevent::find($id);
        $event->delete();
        return response()->json([
        'success' => true,
        'message' => 'Delete Berhasil',
        'data'=> $event
                
        ], 201);
        
        
    }
}
