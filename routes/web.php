<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\queries;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
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

Route::get('/', [queries::class, 'index']);
Route::get('/secret', function() {
    echo "<h1>Welcome Whoever</h1>";
})->middleware('auth.basic');

Route::get('register', [RegistrationController::class, 'register'])->middleware('guest');
Route::post('register', [RegistrationController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'logout'])->middleware('auth');

Route::get('login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');

Route::get('dashboard', function() {
    return view('dashboard');
})->middleware('auth');
