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

//Route::middleware('auth:api')->get('/api', function (Request $request) {
//    return $request->user();
//});

Route::get('/ola', function (){
   return 'ola';
})->middleware('auth:sanctum');

Route::group(['prefix' => 'auth'], function(){
    Route::post('/login', [\Modules\Api\Http\Controllers\AuthController::class, 'Login']);
});