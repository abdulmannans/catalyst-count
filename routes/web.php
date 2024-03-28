<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'loginIndex']);
Route::post('/', [AuthController::class, 'login'])->name('login');


Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/upload', [UploadController::class, 'index'])->name('upload');
    Route::post('/upload', [UploadController::class, 'upload']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});




