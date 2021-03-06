<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\Admin\User;

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

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin'
], function() {

    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('/home', [AuthController::class, 'home'])->name('home');

    Route::get('uers/team', [User::class, 'team'])->name('users.team');
    Route::resource('users', User::class);
});
