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
    Route::post('login', 'API\User\LecturerController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'API\User\LecturerController@details');
        Route::post('examschedule', 'API\Dosen\ExamSchdeuleController@getAllData');
        Route::post('about', 'API\Dosen\AboutController@getAllData');
        Route::post('examclass', 'API\Dosen\ExamClassesController@getAllData');
        Route::post('examclass/{id}', 'API\Dosen\ExamClassesController@getData');
        Route::post('logout', 'API\User\LecturerController@logout');
        
    });
});

Route::group(['prefix' => 'staff'], function(){
    Route::post('login', 'API\User\StaffController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'API\User\StaffController@details');
        Route::post('examschedule','API\Staff\ExamScheduleContoller@getAllData');
        Route::post('about', 'API\Staff\AboutController@getAllData');
        Route::post('examclass/{id}', 'API\Staff\ExamClassesController@getData');
        Route::post('logout', 'API\User\StaffController@logout');
        
    });
});

Route::group(['prefix' => 'student'], function(){
    Route::post('login', 'API\User\StudentController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'API\User\StudentController@details');
        Route::post('examschedule','API\Student\ExamScheduleController@getAllData');
        Route::post('about','API\Student\AboutController@getAllData');
        Route::post('logout', 'API\User\StudentController@logout');
    });
});

Route::group(['prefix'=>'building'], function(){

    Route::post('getAllData', 'API\Management\BuildingController@getAllData');
    Route::post('getData\{id}', 'API\Management\BuildingController@getData');
});

Route::group(['prefix'=>'courses'], function(){
    Route::post('getAllData', 'API\Management\CoursesController@getAllData');
    Route::post('getData\{id}', 'API\Management\CoursesController@getData');
});

Route::post('period', 'API\Management\PeriodController@getAllData');
Route::post('examtype', 'API\Management\ExamtypeController@getAllData');
Route::post('room', 'API\RoomController@getAllData');
Route::post('classes', 'API\ClassesController@getAllData');



