<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\user\lecturer;
use App\Http\Resources\user\user;
use Validator;

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

			if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
				$user = Auth::user();
				$token =  $user->createToken('nApp')->accessToken;
				return response()->json([
                    'success' => true,
                    'message'=>'Login Berhasil',
                    'data' => [                     
                        'token' => $token,
                        'name' => $user->lecturer->name,
                        'nip' => $user->lecturer->nip, 
                    ], 
                    
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
}
