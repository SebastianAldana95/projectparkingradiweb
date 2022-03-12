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

Route::view('/', 'auth.login');

Auth::routes();

Route::group([
        'prefix' => 'admin',
        'middleware' => 'auth'],
    function () {

        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');

        Route::resource('vehicles', \App\Http\Controllers\Admin\VehiclesController::class, ['except' => 'show', 'as' => 'admin']);
        Route::resource('users', \App\Http\Controllers\Admin\UsersController::class, ['as' => 'admin']);

});





