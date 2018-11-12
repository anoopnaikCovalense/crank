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
//Compile and Run API Methods
Route::post('/compilehack','CompileRunHackController@comp_run');
Route::post('/compile','CompileRunController@comp_run');

//Store Submissison
Route::post('/store','SubmissionController@store');
Route::post('/ans_store','MCQController@ans_store');



