<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\user\lecturer;
use App\Http\Resources\user\user;
use App\lecturer as AppLecturer;
use Illuminate\Support\Facades\{Hash, Storage, Validator};

class LecturerController extends Controller
{
    public $successStatus = 200;

		public function login(Request $request){

            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required'
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()],402);
            }
            $username = $request->username;
            $isdosen=AppLecturer::select('lecturer.*','user.username')->join("user", "lecturer.id", "=", "user.id")->where("username", $request->username)->orwhere("nip", $request->username)->first();
            // dd($isdosen);   
            if(!$isdosen){
                $validator->errors()->add('username','Wrong Username');
                return $this->MessageError($validator->errors(), 422);
            }
            $username = $isdosen->username;

			if(Auth::attempt(['username' =>$username, 'password' => $request->password])){
				$user = Auth::user();
				$token =  $user->createToken('nApp')->accessToken;
				return response()->json([
                    'success' => true,
                    'message' => 'Login Berhasil',
                    'data'=>[
                        'token' => $token,
                        'name' =>$user->lecturer->name,
                        'nip' =>$user->lecturer->nip
                    ]
                    
                ], $this->successStatus);
			}
			else{
				return response()->json([
                    'success' => false,
                    'message' => 'login gagal'
                ], 401);
			}
		}

		public function details()
		{
            $user = Auth::user();
            $lecturer = Auth::user()->lecturer;
			return response()->json([
                'success' => true,
                'data'=>[
                    'user'=>new user($user),
                    'lecturer'=> new lecturer($lecturer)
                ]
            ], $this->successStatus);
        }
        
        public function logout()
        {
            if (Auth::check()) {
                Auth::user()->AauthAcessToken()->delete();
             }
             return response()->json([
                'success' => true,
				'message' =>"Logout Berhasil"
            ], $this->successStatus);
		
        }

        public function isLogin()
        {
            try{
                $user = app('auth')->user();
                if($user){
                    return response()->json([
                        'success' => true,
                        'message' =>['isLogin'=>true]
                    ], $this->successStatus);
                }
                return response()->json([
                    'success' => true,
                    'message' =>['isLogin'=>false] 
                ],401);
            }catch(\Exception $e){
                return response()->json([
                    'success' => true,
                    'message' =>['isLogin'=>false]
                ], 401);
            }
        }

        public function changePassword(Request $request){
            $validator = Validator::make($request->all(), [
                'old_password'          => 'required',
                'new_password'          => 'required',
                'confirm_password'      => 'required|same:new_password',
            ]);

            if($validator->fails()){
                return response()->json([
                    'success' => false,
                    'message' =>$validator->errors()
                ],403);
            }

            try {
                $user = Auth::user();    
                $password = $request->old_password;
                if($user){
                    $userPass = $user->password;
                    if(Hash::check($password, $userPass)){
                        $user->password = Hash::make($request->new_password); 
                        $user->update();
                        return response()->json([
                            'success' => true,
                            'message' =>['changePassword'=>true]
                        ], $this->successStatus);
                    }else{
                        $validator->errors()->add('old_password','Password not same with old Password');
                        return response()->json([
                            'success' => false,
                            'message' => $validator->errors()
                        ], 401);
                    }
                }
            } catch (\Exception $th) {
                return response()->json([
                    'success' => true,
                    'message' =>['changePassword'=>false]
                ], 401);
            }
        }

        public function changePicture(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'image' =>'required|image|mimes:jpg,png,jpeg,gif'
            ]);

            if($validator->fails()){
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 401);
            }
            try{
                if($request->hasFile('image') && $request->image->isValid()){
                    $user = app('auth')->user();
                    $old_image = $user->image;
                    $fileext = $request->image->extension();
                    $filename = $user->FileNameimage().'.'.$fileext;
                    $user->image = $request->file('image')->storeAs('images', $filename,'public');
                    $user->update();
                    if($old_image){
                        Storage::disk('public')->delete($old_image);
                    }
                    return response()->json([
                        'success' => true,
                        'message' =>['changePicture'=>true]
                    ], $this->successStatus);
                }
            } catch (\Exception $th) {
                return response()->json([
                    'success' => false,
                    'message' =>$th->getMessage()
                ], $this->successStatus);
            }
        }
}
