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


Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('user-login',[AuthController::class,'doLogin'])->name('do.login');
Route::get('user-dashboard',[AuthController::class,'userDashboard'])->name('user.dashboard');

Route::get('registration',[AuthController::class,'registration'])->name('registration');
Route::post('user-registration',[AuthController::class,'doRegistration'])->name('do.registration');
Route::get('logout',[AuthController::class,'logout'])->name('logout');