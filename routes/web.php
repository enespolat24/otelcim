<?php

use App\Models\Ilan;
use Illuminate\Support\Facades\Route;

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

Route::get('/ilanliste', function () {
    $ilan = Ilan::all();
    return view('ilanliste.list',compact('ilan'));
});
Auth::routes();

Route::get('/chat/{to_user_id}', [App\Http\Controllers\ChatController::class ,'mesajAt']);
Route::get('/chat', [App\Http\Controllers\ChatController::class ,'mesajlar']);





Route::group(['middleware' => 'auth'], function () {
    Route::resource('oda', 'RoomController');
    Route::get('profil', 'ProfileController@profile')->name('profile');
    Route::post('profil', 'ProfileController@update')->name('profile.update');
    Route::get('oda', 'RoomController@index')->name('rooms');
    Route::post('reservations/store', 'ReservationController@store')->name('reservation.store');
    Route::get('your_reservations', 'ReservationController@your_reservations')->name('your-reservations');
});


