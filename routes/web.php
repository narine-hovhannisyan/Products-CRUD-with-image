<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MemberController;
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
//Route::get('/products',[ProductController::class,'index']);
Route::resource("/products", ProductController::class);
Route::resource("/member", MemberController::class);
//Route::resource('products', ProductController::class);
Route::get('/users',[UserController::class, 'index']);
Route::resource("/student", StudentController::class);
