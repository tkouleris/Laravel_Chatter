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

    if($user = Auth::user())
    {
        return redirect()->route('chatter');
    }

    return view('welcome');
});

Auth::Routes();

Route::get('/chatter', 'ChatController@index')
                            ->name('chatter')
                            ->middleware('auth');

Route::post('/send', 'MessageController@send')
                            ->name('send')
                            ->middleware('auth');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('profile', 'UserController@update_avatar')->middleware('auth');
