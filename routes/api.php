<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'lecturer'], function(){
    Route::post('login', 'API\LecturerController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'API\LecturerController@details');
        
    });
});

Route::group(['prefix' => 'staff'], function(){
    Route::post('login', 'API\StaffController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'API\StaffController@details');
        
    });
});

Route::group(['prefix' => 'student'], function(){
    Route::post('login', 'API\StudentController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'API\StudentController@details');
        
    });
});
