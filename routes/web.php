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
Route::get('/cricketSearch','PageController@home');
Route::post('/cricketSearch',PageController@result);
Route::post('/results',PageController@return);
*/

Route::get('/', function()
{
    return view('welcome');
});



Route::get('/createPet',function(){
    return view('createPet');
});


Route::resource('mood', 'MoodController');


Route::get('/home','FormController@homelist');
Route::get('/tables','FormController@list');
Route::get('/graphs','FormController@chart');
Route::get('calendar','EventController@calendar');
Route::post('/home','FormController@store');
Route::post('/menu1','FormController@store');
Route::post('/list','FormController@list');
Auth::routes();
Route::get('/list',function(){
    return view('list');
});