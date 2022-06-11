<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Routing\RouteGroup;

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
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::get('/bts', [DashboardController::class, 'bts']);
    Route::get('/operator', [DashboardController::class, 'operator']);
    Route::get('/monitoring', [DashboardController::class, 'monitoring']);
    Route::get('/maps', [DashboardController::class, 'maps']);
});
