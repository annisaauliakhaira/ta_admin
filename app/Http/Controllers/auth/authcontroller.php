<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class authcontroller extends Controller
{
    public function getlogin(Type $var = null)
    {
        return view('auth.login');
    }

    public function postlogin(Request $req)
    {
        $req->validate([
            'username'=> 'required',
            'password'=>'required',
        ]);

        
        if($user=Auth::attempt(['username' => $req->username, 'password' => $req->password, 'status' =>1])){
            return redirect('/dashboard');
        }
        dd(2);
    }
}
