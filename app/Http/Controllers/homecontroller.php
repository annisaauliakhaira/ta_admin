<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function dashboard(Type $var = null)
    {
        return view('admin.index');
    }
}
