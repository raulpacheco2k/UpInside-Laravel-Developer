<?php

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

use Modules\Api\Http\Controllers\AuthController;

Route::get('/ola', function (){
   return 'ola';
})->middleware('auth:sanctum');

Route::group(['prefix' => 'auth'], function(){
    Route::post('/login', [AuthController::class, 'Login']);
    Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');
});