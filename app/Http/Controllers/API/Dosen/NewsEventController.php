<?php

namespace App\Http\Controllers\API\Dosen;

use App\newsevent;
use App\exam_schedule as es;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\dosen\newsevent as newseventResource;
use Validator;

class NewsEventController extends Controller
{
    public function saveNews($exam_id, Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'news_event' => 'required',
            
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
            'message' => 'Input Berita Acara Berhasil',
            'data'=> $event,
            
        ], 201);

    }

    public function show($id)
    {
        try{
            $data=newsevent::select('newsevent.*')->join('examschedule', 'examschedule.id', '=', 'newsevent.exam_id')->where('examschedule.id', '=', $id)->distinct()->get();
            return response()->json([
                'success'=>true,
                'total_row'=>$data->count(),
                'data'=>newseventResource::collection($data)
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
    public function delete($id){
        $event=newsevent::find($id);
        $event->delete();
        return response()->json([
            'success' => true,
            'message' => 'Delete Berita Acara Berhasil',
            'data'=> $event
        ], 201);
    }

}
