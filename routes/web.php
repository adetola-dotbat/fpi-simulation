<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\FlutterwaveController;

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
    return view('fastrans.index');
})->middleware('auth');

Route::get('login',[AuthController::class,'index'])->name('login')->middleware('guest');
Route::get('register',[AuthController::class,'register_view'])->name('register')->middleware('guest');

Route::post('register',[AuthController::class,'register'])->name('register.user')->middleware('guest');


    Route::post('login',[AuthController::class,'login'])->name('login.user');

    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::get('admin',[AuthController::class,'admin_log'])->name('home')->middleware('auth');
    Route::get('checkpack',[AuthController::class,'checkpack'])->name('checkpack')->middleware('auth');
  
// botmancontroller
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

// flutterwavecontroller
Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');