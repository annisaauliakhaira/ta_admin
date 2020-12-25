<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\user\staff;
use App\Http\Resources\user\user;
use App\staff as AppStaff;
use Illuminate\Support\Facades\{Hash, Validator};

class StaffController extends Controller
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
            $isstaff=AppStaff::select('staff.*', 'user.username')->join('user', 'staff.id', '=', 'user.id')
            ->where('username', $request->username)->first();
            if(!$isstaff){
                $validator->errors()->add('username','Wrong Username');
                return $this->MessageError($validator->errors(), 422);
            }
            $username=$isstaff->username;

			if(Auth::attempt(['username' =>$username, 'password' => $request->password])){
				$user = Auth::user();
				$token =  $user->createToken('nApp')->accessToken;
				return response()->json([
                    'success' => true,
                    'message' => 'Login Berhasil',
                    'data'=>[
                        'token' => $token,
                        'name' =>$user->staff->name,
                        'nip' =>$user->staff->nip
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
            $staff = Auth::user()->staff;
			return response()->json([
                'success' => true,
                'data'=>[
                    'user'=>new user($user),
                    'staff'=> new staff($staff)
                ]
            ], $this->successStatus);
        }
        
        public function logout()
        {
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

        public function changePassword(Request $request)
        {
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
                        Auth::user()->AauthAcessToken()->delete();
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
}
