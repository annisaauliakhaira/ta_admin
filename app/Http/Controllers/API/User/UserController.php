<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\user\user;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
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
				$success['token'] =  $user->createToken('nApp')->accessToken;
				return response()->json(['success' => $success], $this->successStatus);
			}
			else{
				return response()->json(['error'=>'Login Gagal'], 401);
			}
		}


		public function details()
		{
			$user = Auth::user();
			return response()->json(['success' => $user], $this->successStatus);
		}

		public function logout()
		{
			$user = Auth::user()->logout();
			return response()->json([
                'success' => true,
				'message' =>"Logout Berhasil"
            ], $this->successStatus);
		}
}
