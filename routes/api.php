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
        Route::post('isLogin', 'API\User\LecturerController@isLogin');
        Route::post('changePassword', 'API\User\LecturerController@changePassword');
        Route::post('details', 'API\User\LecturerController@details');
        Route::post('examschedule', 'API\Dosen\ExamSchdeuleController@getAllData');
        Route::post('about', 'API\Dosen\AboutController@getAllData');
        Route::post('examclass', 'API\Dosen\ExamClassesController@getAllData');
        Route::post('examclass/{id}', 'API\Dosen\ExamClassesController@getData');
        Route::post('presence', 'API\Dosen\presenceController@getData');
        Route::post('updateManual/{code}/{presence_status}', 'API\Dosen\presenceController@updateManual');
        Route::post('logout', 'API\User\LecturerController@logout');
        Route::post('saveNews/{exam_id}', 'API\Dosen\NewsEventController@saveNews');
        Route::post('show/{id}', 'API\Dosen\NewsEventController@show');
        Route::post('delete/{id}', 'API\Dosen\NewsEventController@delete');
        Route::post('update/{id}', 'API\Dosen\NewsEventController@update');
        Route::post('getHistory', 'API\Dosen\presenceController@getHistory');
        Route::post('saveLatLong/{id}', 'API\Dosen\geofenceController@saveLatLong');

        
    });
});

Route::group(['prefix' => 'staff'], function(){
    Route::post('login', 'API\User\StaffController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('isLogin', 'API\User\StaffController@isLogin');
        Route::post('changePassword', 'API\User\StaffController@changePassword');
        Route::post('details', 'API\User\StaffController@details');
        Route::post('examschedule','API\Staff\ExamScheduleContoller@getAllData');
        Route::post('about', 'API\Staff\AboutController@getAllData');
        Route::post('examclass/{id}', 'API\Staff\ExamClassesController@getData');
        Route::post('logout', 'API\User\StaffController@logout');
        Route::post('saveNews/{exam_id}', 'API\Staff\NewsEventController@saveNews');
        Route::post('show/{id}', 'API\Staff\NewsEventController@show');
        Route::post('delete/{id}', 'API\Staff\NewsEventController@delete');
        Route::post('update/{id}', 'API\Staff\NewsEventController@update');
        Route::post('presence', 'API\Staff\presenceController@getData');
        Route::post('updateManual/{code}/{presence_status}', 'API\Staff\presenceController@updateManual');
        Route::post('saveLatLong/{id}', 'API\Staff\geofenceController@saveLatLong');
        
    });
});

Route::group(['prefix' => 'student'], function(){
    Route::post('login', 'API\User\StudentController@login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('changePassword', 'API\User\StudentController@changePassword');
        Route::post('isLogin', 'API\User\StudentController@isLogin');
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



