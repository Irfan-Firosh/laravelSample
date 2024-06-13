<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\queries;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');

Route::post('logout/admin', [SessionController::class, 'logoutAdmin'])->middleware('auth:admin')->name('logout.admin');
Route::post('logout/user', [SessionController::class, 'logoutUser'])->middleware('auth:web')->name('logout.user');


Route::prefix('admin')->group(function() {
    Route::get('', [adminController::class, 'dashboard' ])->middleware('auth:admin')->name('admin-dash');
    Route::get('/organizations', [adminController::class, 'organizations'])->name('admin.orgs')->middleware('auth:admin');
    Route::get('/users', [adminController::class, 'userPage'])->name('admin.users')->middleware('auth:admin');
    Route::get('/users/update/{id}', [adminController::class, 'createU'])->name('admin.updateCreate')->middleware('auth:admin');
    Route::post('/users/update/{id}', [adminController::class, 'update'])->name('admin.updatePost')->middleware('auth:admin');
    Route::get('/users/delete/{id}', [adminController::class, 'destroy'])->name('admin.destroy')->middleware('auth:admin');
});

Route::get('dashboard', function() {
    return view('dashboard');
})->middleware('auth:web')->name('user-dash');

