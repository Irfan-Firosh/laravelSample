<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\queries;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Models\Contacts;
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

Route::get('/', [queries::class, 'index'])->name('home');

Route::get('register', [RegistrationController::class, 'register'])->name('register.create');
Route::post('register', [RegistrationController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');

Route::post('logout/admin', [SessionController::class, 'logoutAdmin'])->middleware('auth:admin')->name('logout.admin');
Route::post('logout/user', [SessionController::class, 'logoutUser'])->middleware('auth:web')->name('logout.user');


Route::prefix('admin')->group(function() {
    Route::get('', [adminController::class, 'dashboard' ])->middleware('auth:admin')->name('admin-dash');
    Route::get('/organizations', [adminController::class, 'organizations'])->name('admin.orgs')->middleware('auth:admin');
    Route::get('/users', [adminController::class, 'userPage'])->name('admin.users')->middleware('auth:admin');
    Route::get('/users/update/{id}', [adminController::class, 'createU'])->name('admin.updateCreate')->middleware('auth:admin');
    Route::post('/users/update/{id}', [adminController::class, 'update'])->name('admin.updatePost')->middleware('auth:admin');
    Route::get('/users/delete/{id}', [adminController::class, 'destroy'])->name('admin.destroy')->middleware('auth:admin');
    Route::get('organizations/create', [OrganizationController::class, 'create'])->name('org.create')->middleware('auth:admin');
    Route::post('organizations/create', [OrganizationController::class, 'store'])->name('org.store')->middleware('auth:admin');
    Route::get('organizations/update/{id}', [OrganizationController::class, 'edit'])->name('org.edit')->middleware('auth:admin');
    Route::post('organizations/update/{id}', [OrganizationController::class, 'update'])->name('org.update')->middleware('auth:admin');
    Route::get('/organizations/delete/{id}', [OrganizationController::class, 'destroy'])->name('org.destroy')->middleware('auth:admin');
    Route::post('organizations/search', [OrganizationController::class, 'search'])->name('org.search')->middleware('auth:admin');
    Route::get('organizations/search', [adminController::class, 'organizations'])->name('org.search.get')->middleware('auth:admin');
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts')->middleware('auth:admin');
    Route::get('contacts/create', [ContactController::class, 'create'])->name('admin.contacts.create')->middleware('auth:admin');
    Route::post('contacts/create', [ContactController::class, 'store'])->name('admin.contacts.store')->middleware('auth:admin');
    Route::get('contacts/delete/{id}', [ContactController::class, 'destroy'])->name('admin.conacts.destroy')->middleware('auth:admin');
    Route::get('contacts/update/{id}', [ContactController::class, 'edit'])->name('admin.contacts.edit')->middleware('auth:admin');
    Route::post('contacts/update/{id}', [ContactController::class, 'update'])->name('admin.contacts.update')->middleware('auth:admin');
});

Route::get('dashboard', function() {
    return view('dashboard');
})->middleware('auth:web')->name('user-dash');

