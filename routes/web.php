<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('lang/{lang}', [App\Http\Controllers\zenContactController::class, 'lang'])->name('lang.switch');

Route::group(['middleware' => 'lang'], function() {
    Route::get('/', function () {
        return view('Home');
    });

    Route::get('/home', function () {
        return view('Home');
    });

    Route::get('/services', function () {
        return view('Services');
    });
      Route::get('/House_cleaning', function () {
        return view('HouseCleaning');
    });
      Route::get('/Office_cleaning', function () {
        return view('OfficeCleaning');
    });
         Route::get('/Gym_cleaning', function () {
        return view('GymCleaning');
    });
   

    Route::get('/gallery', function () {
        return view('Gallery');
    });

  

    Route::get('/contact', function () {
        return view('Contact');
    });
       Route::get('/about', function () {
        return view('about');
    });

    Route::post('/contact', [App\Http\Controllers\zenContactController::class, 'contact'])->name('contact');
});