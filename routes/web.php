<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

// login
// Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
// Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
// Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Admin
    Route::get('admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('admin/get-admin-row1', [DashboardController::class, 'get_row1'])->name('admin.get_row1');
    Route::get('admin/get-admin-row2', [DashboardController::class, 'get_row2'])->name('admin.get_row2');
    // post
    Route::get('admin/post', [PostController::class, 'post'])->name('post');
    Route::any('admin/post/get-post', [PostController::class, 'get_post'])->name('post.get_post');
    Route::get('admin/post/add', [PostController::class, 'add_post'])->name('add_post');
    Route::post('admin/post/add', [PostController::class, 'save_post'])->name('save_post');
    Route::post('admin/post/del', [PostController::class, 'del_post'])->name('del_post');
    // post review
    Route::get('admin/post-review', [DashboardController::class, 'post_review'])->name('post_review');


});

