<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::resource('blogs', BlogController::class)->names('admin.blogs');
    Route::resource('posts', PostController::class)->names('admin.posts');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::get('dashboard', [DashboardController::class, 'index']);
});
