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
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('welcome');
    }
});
Route::get('/test', function()
{
    return Auth::user()->test();
});




Route::get('/createPet',function(){
    return view('createPet');
});
Route::resource('mood', 'MoodController');
Route::resource('drink', 'DrinkController');
Route::resource('sleep', 'SleepController');
Route::resource('snack', 'SnackController');
Route::resource('weight', 'WeightController');
Route::resource('workout', 'WorkoutController');
Route::resource('friends_users', 'FriendsController');
Route::resource('height', 'HeightController');

Route::post('mood/edit/{id}', 'MoodController@update')->name('mood.update');
Route::post('drink/edit/{id}', 'DrinkController@update')->name('drink.update');
Route::post('sleep/edit/{id}', 'SleepController@update')->name('sleep.update');
Route::post('snack/edit/{id}', 'SnackController@update')->name('snack.update');
Route::post('weight/edit/{id}', 'WeightController@update')->name('weight.update');
Route::post('workout/edit/{id}', 'WorkoutController@update')->name('workout.update');
Route::post('height/edit/{id}', 'HeightController@update')->name('height.update');
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

Route::get('/profile/{username}', 'ProfilesController@show')->name('profile');
Route::get('/profile/{username}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::post('/profile/{username}/update', 'ProfilesController@update')->name('profile.update');
Route::post('/profile/{username}/updateImage', 'ProfilesController@updateImage')->name('profile.update');
Route::get('/profile/{username}/mood', 'ProfilesController@mood')->name('profile.mood');
Route::get('/profile/{username}/sleep', 'ProfilesController@sleep')->name('profile.sleep');
Route::get('/profile/{username}/sleep', 'ProfilesController@sleep')->name('profile.sleep');



Route::get('/friends', 'FriendsController@getIndex'); // get all friends, pending requests and sent requests
Route::get('/friends/delete/{id}', 'FriendsController@destroy'); // delete the friend id
Route::get('/friends/add/{id}', 'FriendsController@createRequest'); // create a request to user User.id
Route::get('/friends/cancel/{id}', 'FriendsController@declineRequest'); // delete PendingRequest from PendingRequests table . id = pending_request id
Route::get('/friends/accept/{id}', 'FriendsController@acceptRequest'); // delete PendingRequest from pendingRequests table, create a new entry in friends table. id = pending_request id
Route::get('/friends/decline/{id}', 'FriendsController@declineRequest'); // same as /friends/cancel/{id}

