<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('member', 'C_members');
Route::group(['prefix' => 'member'], function () {
    Route::apiResource('{member_id}/assistance', 'Assistances');
    Route::apiResource('{member_id}/tipoff', 'TipOffs');
    Route::apiResource('{member_id}/attendanceRegister', 'AttendanceRegisters');
    Route::apiResource('{member_id}/p_member', 'P_members');
    Route::apiResource('{member_id}/incident', 'Incidents');
});

Route::group(['prefix' => 'incident'], function () {
    Route::apiResource('{incident_id}/assistance', 'Assistances');
    Route::apiResource('{incident_id}/tipoff', 'TipOffs');
    Route::apiResource('{incident_id}/user/{member_id}/multimedia', 'Multimedias');
});

/* Route::group(['prefix' => 'multimedia'], function(){
        Route::apiResource('{multimedia_id}/assistance', 'Assistances');
        Route::apiResource('{multimedia_id}/tipoff', 'TipOffs');
        Route::apiResource('{multimedia_id}/multimedia', 'Multimedias');
        
    });*/

Route::group(['prefix' => 'meeting'], function () {
    Route::apiResource('{meeting_id}/attendanceRegister', 'AttendanceRegisters');
});

Route::group(['prefix' => 'p_member'], function () {
    Route::apiResource('{p_member_id}/meeting', 'Meetings');
    Route::apiResource('patrol', 'Patrols');
});

Route::group(['prefix' => 'patrol'], function () {
    Route::apiResource('{patrol_id}/p_member', 'P_members');
});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

//Get all incidents
Route::get('getIncidents', 'Incidents@getAll');

//Get all TipOffs
Route::get('getTipOffs', 'TipOffs@getAll');

//Get all Meetings
Route::get('getMeetings', 'Meetings@getAll');

Route::post('assistance', 'Assistances@store');

Route::get('emergencyservices', 'EmergencyServices@index');
Route::post('emergencyservices', 'EmergencyServices@store');
