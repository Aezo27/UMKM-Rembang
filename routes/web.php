<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

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
    Route::get('admin/post/edit/{id}', [PostController::class, 'edit_post'])->name('edit_post');
    Route::post('admin/post/edit/{id}', [PostController::class, 'update_post'])->name('update_post');
    // post review
    Route::get('admin/post-review', [ReviewController::class, 'post_review'])->name('post_review');
    Route::any('admin/post-review/get-select2', [ReviewController::class, 'select2'])->name('review.select2');
    Route::any('admin/post-review/get-review', [ReviewController::class, 'get_review'])->name('review.get_data');
    Route::any('admin/post-review/get-review-det', [ReviewController::class, 'get_edit'])->name('review.get_data_edit');
    Route::post('admin/post-review/add', [ReviewController::class, 'add_review'])->name('review.add_review');
    Route::post('admin/post-review/del', [ReviewController::class, 'del_review'])->name('del_review');
    Route::post('admin/post-review/edit/{id}', [ReviewController::class, 'edit_review'])->name('review.edit_review');
    // post setting
    Route::get('admin/setting/main', [SettingController::class, 'main'])->name('setting.main');
    Route::post('admin/setting/main', [SettingController::class, 'save_main'])->name('setting.save_main');
    Route::post('admin/setting/img', [SettingController::class, 'save_img'])->name('setting.save_img');
    Route::get('admin/setting/contact', [SettingController::class, 'contact'])->name('setting.contact');
    Route::post('admin/setting/contact', [SettingController::class, 'save_contact'])->name('setting.save_contact');
    Route::get('admin/setting/tags', [SettingController::class, 'tags'])->name('setting.tags');
    Route::any('admin/setting/tags/data', [SettingController::class, 'get_tags'])->name('setting.get_tags');
    Route::post('admin/setting/tags/delete', [SettingController::class, 'del_tags'])->name('setting.del_tags');
    Route::any('admin/setting/cate', [SettingController::class, 'cate'])->name('setting.cate');
    Route::any('admin/setting/cate/data', [SettingController::class, 'get_cate'])->name('setting.get_cate');
    Route::post('admin/setting/cate/delete', [SettingController::class, 'del_cate'])->name('setting.del_cate');
    Route::post('admin/setting/cate/add', [SettingController::class, 'add_cate'])->name('setting.add_cate');
    
});

// user
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/product', [UserController::class, 'product'])->name('user.product');
Route::post('/product/loadmore', [UserController::class, 'loadMore'])->name('user.product.loadmore');
Route::get('/product/search', [UserController::class, 'search'])->name('user.product.search');
Route::post('/product/inccount', [UserController::class, 'incCount'])->name('user.product.inccount');
Route::get('/product/{slug}', [UserController::class, 'single'])->name('user.product.single');

Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');
Route::get('/about', [UserController::class, 'about'])->name('user.about');
