<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
//========================Home Controller============================
//HomePage
 Route::get('/home', 'HomeController@index')->name('home');
//Create Challenge
 Route::get('/newchallenge','HomeController@newchallenge')->name('newchallenge');
 //====================Mail Controller===============
 Route::get('/send','MailController@send')->name('send');
Route::get('/sentoAll','MailController@sendtoAll')->name('sendtoAll');
//========================Submission Controller============================
//Challenges Submitted
 Route::get('/submissions','SubmissionController@challenges_submitted')->name('submissions');
 //submitted Details
 Route::get('/submission_details', 'SubmissionController@submission_details')->name('submission_details');
//Submitted Users
Route::get('/submittedusers','SubmissionController@submitted_users')->name('submittedusers');
 //accept reject page
 Route::get('/accept_reject','SubmissionController@Accept_Reject')->name('accept_reject');
 //set status Accept or reject
 Route::get('/setstatus','SubmissionController@set_status')->name('setstatus');
//========================Challenge Controller============================
Route::group(['middleware' => 'auth'], function(){
 //Selected Challenge Details
 Route::get('/challenge', 'ChallengeController@challenge_details')->name('challenge');
});
 //Challenges to be solved
 Route::get('/mychallenges', 'ChallengeController@mychallenges')->name('mychallenges');
 //Store new challenge
 Route::post('/newchallenge', 'ChallengeController@store')->name('newchallenge');
 //Delete Challenge
 Route::get('/delete', 'ChallengeController@delete')->name('delete');
 //Edit Challange
 Route::post('/edit', 'ChallengeController@edit')->name('edit');
 //Prev Details To Update
 Route::get('/prevdetails', 'ChallengeController@prevdetails')->name('prevdetails');

 //validator
 Route::post('/validator', 'ChallengeController@validator')->name('validator');
//===========================================================================
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify')->name('verify');
