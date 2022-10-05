<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ResepiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;

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
    return view('auth.login');
});

Route::get('/home0', function () {
    return view('/dashboard');
})->name('dashboard');


//category

Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::get('/createcategory',[CategoryController::class,'create']);
Route::post('/insertcategory',[CategoryController::class,'store']);
Route::get('/editcategory/{id}',[CategoryController::class,'edit']);
Route::post('/updatecategory/{id}',[CategoryController::class,'update']);
Route::get('/deletecategory/{id}',[CategoryController::class,'destroy']);


//resepi

Route::get('/resepi',[ResepiController::class,'index'])->name('resepi');
Route::get('/createresepi',[ResepiController::class,'create']);
Route::post('/insertresepi',[ResepiController::class,'store']);
Route::get('/editresepi/{id}',[ResepiController::class,'edit']);
Route::post('/updateresepi/{id}',[ResepiController::class,'update']);
Route::get('/deleteresepi/{id}',[ResepiController::class,'destroy']);


//video

Route::get('/video',[VideoController::class,'index'])->name('video');
Route::get('/createvideo',[VideoController::class,'create']);
Route::post('/insertvideo',[VideoController::class,'store']);
Route::get('/editvideo/{id}',[VideoController::class,'edit']);
Route::post('/updatevideo/{id}',[VideoController::class,'update']);
Route::get('/deletevideo/{id}',[VideoController::class,'destroy']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User

Route::get('/user',[UserController::class,'index'])->name('user');
Route::get('/edituser/{id}',[UserController::class,'edit']);
Route::post('/updateuser/{id}',[UserController::class,'update']);
Route::get('/setting/{id}',[UserController::class,'setting']);
Route::post('/updatesetting/{id}',[UserController::class,'updatesetting']);
Route::get('/deleteuser/{id}',[UserController::class,'destroy']);
Route::post('/approval/{id}', [UserController::class, 'approval']);

Route::get('change-password',[ChangePasswordController::class,'index']);
Route::post('change-password',[ChangePasswordController::class,'store'])->name('change.password');

//test

Route::get('/test300', function () {
    return view('test300.index');
});