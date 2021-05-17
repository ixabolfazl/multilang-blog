<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
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


Route::localized(function () {


    require __DIR__ . '/auth.php';


    Route::get('/', function () {
        return view('app.index');
    })->name('index');


    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['as' => 'users.', 'prefix' => 'users'], function () {
            Route::get('{user}/status', [UserController::class, 'changeStatus'])->name('status');
            Route::get('trash', [UserController::class, 'trash'])->name('trash');
            Route::delete('{id}/delete', [UserController::class, 'delete'])->name('delete');
            Route::get('{id}/restore', [UserController::class, 'restore'])->name('restore');
        });
        Route::resource('users', UserController::class);


    });


});
