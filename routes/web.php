<?php
use App\Events\FormSubmited;
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

Route::get('/chatter', function () {
    return view('chatter');
});

Route::get('/sender', function () {
    return view('sender');
});

Route::post('/sender', function () {
    $text = request()->text;
    event(new FormSubmited($text));
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
