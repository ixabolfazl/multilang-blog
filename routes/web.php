<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
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
        return view('admin.posts.new-post');
    })->name('index');


    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //users routes
        Route::group(['as' => 'users.', 'prefix' => 'users'], function () {
            Route::get('{user}/status', [UserController::class, 'changeStatus'])->name('status');
            Route::get('{user}/image', [UserController::class, 'removeImage'])->name('removeImage');
            Route::get('trash', [UserController::class, 'trash'])->name('trash');
            Route::delete('{id}/delete', [UserController::class, 'delete'])->name('delete');
            Route::get('{id}/restore', [UserController::class, 'restore'])->name('restore');
        });
        Route::resource('users', UserController::class);

        //posts routes
        Route::post('upload-image', [PostController::class, 'upload'])->name('upload-image');
        Route::group(['as' => 'posts.', 'prefix' => 'posts'], function () {
            Route::get('{post}/status', [PostController::class, 'changeStatus'])->name('status');
            Route::get('trash', [PostController::class, 'trash'])->name('trash');
            Route::delete('{id}/delete', [PostController::class, 'delete'])->name('delete');
            Route::get('{id}/restore', [PostController::class, 'restore'])->name('restore');
        });
        Route::resource('posts', PostController::class);


        //categories routes
        Route::group(['as' => 'categories.', 'prefix' => 'categories'], function () {
            Route::get('{category}/status', [CategoryController::class, 'changeStatus'])->name('status');
        });
        Route::resource('categories', CategoryController::class)->except(['create']);


        //comments routes


        Route::group(['as' => 'comments.', 'prefix' => 'comments'], function () {
            Route::get('{comment}/status', [CommentController::class, 'changeStatus'])->name('status');
            Route::post('/{comment}', [CommentController::class, 'store'])->name('store');
        });
        Route::resource('comments', CommentController::class)->except(['create', 'store']);

    });


});
