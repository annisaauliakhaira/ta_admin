<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\user\student;
use App\Http\Resources\user\user;
use App\student as AppStudent;
use Validator;

class StudentController extends Controller
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
            $username=$request->username;
            $isStudent=AppStudent::select('student.*', 'user.username')->join('user', 'student.id', '=', 'user.id')
            ->where('username', $request->username)->orwhere('nim', $request->username)->first();
            if(!$isStudent){
                $validator->errors()->add('username','Wrong Username');
                return $this->MessageError($validator->errors(), 422);
            }
            $username=$isStudent->username;


			if(Auth::attempt(['username' =>$username, 'password' => $request->password])){
				$user = Auth::user();
				$token =  $user->createToken('nApp')->accessToken;
				return response()->json([
                    'success' => true,
                    'message' =>'Login Berhasil',
                    'data' => [
                        'token' => $token,
                        'name' => $user->student->name,
                        'nim' => $user ->student->nim
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
            $student = Auth::user()->student;
			return response()->json([
                'success' => true,
                'data'=> [
                    'user'=>new user($user),
                    'student'=>new student($student)
                ]
                
            ], $this->successStatus);
        }
        
        public function logout(){
            if(Auth::check()){
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
                $user = Auth::user();
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
}
