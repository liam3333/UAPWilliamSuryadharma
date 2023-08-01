<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThumbController;
use App\Http\Controllers\RegisterController;

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
    return view('register');
});

Route::get('/register', [RegisterController::class, 'register']);
Route::get('/login', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [RegisterController::class, 'login']);
Route::get('/logout', [RegisterController::class, 'logout']);

Route::get('/home', [HomeController::class, 'home'])->middleware('auth');
Route::post('/filter', [HomeController::class, 'filter']);
Route::get('/wishlist', [HomeController::class, 'wishlist'])->middleware('auth');
Route::get('/communicate', [HomeController::class, 'communicate'])->middleware('auth');
Route::put('/top-up', [HomeController::class, 'topup']);

Route::post('/thumb', [ThumbController::class, 'thumb']);