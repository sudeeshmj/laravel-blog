<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
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
Route::get('/',[BlogController::class,'index'])->name('blogs');
Route::get('registration',[AuthController::class,'registration'])->name('registration');
Route::post('user-registration',[AuthController::class,'doRegistration'])->name('do.registration');
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('user-login',[AuthController::class,'doLogin'])->name('do.login');


Route::group(['middleware'=>'user_auth'],function(){
    Route::get('admin-dashboard',[AuthController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('user-list',[BlogController::class,'userList'])->name('user.list');
    Route::get('user-dashboard',[AuthController::class,'userDashboard'])->name('user.dashboard');

    Route::get('logout',[AuthController::class,'logout'])->name('logout');
        
    Route::get('fetch-user-blogs',[BlogController::class,'fetchUserBlogs'])->name('fecth.user.blogs');
    Route::get('create-user-blog',[BlogController::class,'createUserBlog'])->name('create.user.blog');
    Route::post('add-user-blog',[BlogController::class,'addUserBlog'])->name('add.user.blog');
    
    Route::get('edit-user-blog/{id}',[BlogController::class,'editUserBlog'])->name('edit.user.blog');
    Route::post('modify-user-blog',[BlogController::class,'modifyUserBlog'])->name('modify.user.blog');
    
    Route::post('delete-user-blog',[BlogController::class,'deleteUserBlog'])->name('delete.user.blog');
});



