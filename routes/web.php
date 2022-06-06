<?php

use App\Models\Ilan;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
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
    return view('ilanliste.list', compact('ilan'));
})->middleware('verified');

Auth::routes();
Route::get('/detay/{id}', [App\Http\Controllers\IlanController::class ,'ilanDetay'])->middleware('verified');


Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class,'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}',[App\Http\Controllers\Auth\VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
Route::post('/email/resend', [App\Http\Controllers\Auth\VerificationController::class,'resend'])->name('verification.resend');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/profilim', function(){
    return view('profil');
})->middleware('auth');
Route::get('rezervasyonlarım',[App\Http\Controllers\RezervasyonController::class,'index'])->middleware('auth');
Route::post('/change-password', [App\Http\Controllers\UserController::class, 'changePasswordPost'])->middleware('auth');
Route::get('/ilanlarim',[App\Http\Controllers\IlanController::class,'ilanlarim'])->middleware('auth');
Route::get('profil-guncelle',[App\Http\Controllers\UserController::class,'profilGuncelle'])->middleware('auth');
Route::post('/change-email', [App\Http\Controllers\UserController::class, 'changeEmailPost'])->middleware('auth');
Route::get('ilan-edit/{id}', [App\Http\Controllers\IlanController::class, 'ilanEdit'])->middleware('auth');
Route::get('ilan-ekle',[App\Http\Controllers\IlanController::class,'ilanEkleSayfa'])->middleware('auth');
Route::post('ilan-ekle-form',[App\Http\Controllers\IlanController::class,'ilanEkle'])->middleware('auth');
Route::post('/cevap-ekle' , [App\Http\Controllers\QuestionController::class,'cevapla'])->middleware('auth');
Route::post('/ilan-fotograf-guncelle', [App\Http\Controllers\IlanController::class, 'ilanFotografGuncelle'])->middleware('auth');
Route::post('/ilan-fiyat-guncelle/{id}', [App\Http\Controllers\IlanController::class,'fiyatGuncelle'])->middleware('auth');
Route::post('/ilan-baslik-aciklama-guncelle/{id}', [App\Http\Controllers\IlanController::class,'ilanBaslikAciklama'])->middleware('auth');
Route::post('/rezervasyon-yap', [App\Http\Controllers\RezervasyonController::class,'rezervasyonYap'])->middleware('auth');
Route::post('rezervasyon-iptal/{id}', [App\Http\Controllers\RezervasyonController::class,'rezervasyonIptal'])->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
    // // Route::resource('oda', 'RoomController');
    // // Route::get('profil', 'ProfileController@profile')->name('profile');
    // // Route::post('profil', 'ProfileController@update')->name('profile.update');
    // Route::get('oda', 'RoomController@index')->name('rooms');
    // Route::post('reservations/store', 'ReservationController@store')->name('reservation.store');
    // Route::get('your_reservations', 'ReservationController@your_reservations')->name('your-reservations');
});
