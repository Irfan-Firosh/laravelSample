<?php

use App\Http\Controllers\api\UserController as ApiUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [ApiUserController::class, 'index']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('view-user', [ApiUserController::class, 'viewUser'])->middleware('auth:sanctum');
    Route::get('view-org', [ApiUserController::class, 'viewOrg'])->middleware('auth:sanctum');
});

