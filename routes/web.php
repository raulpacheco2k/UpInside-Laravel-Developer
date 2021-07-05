<?php

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

Route::group(['as' => 'admin', 'name' => 'admin', 'prefix' => 'admin'], function() {

    Route::get('/', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');

});
