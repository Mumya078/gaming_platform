<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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





//**************************  HOME ROUTES ***********************************//
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/home',function (){
    return redirect('/');
});
Route::get('/anasayfa',function (){
    return redirect('/');
});
Route::get('/dashboard',function (){
    return redirect('/');
});

Route::get('/uploadgame',[GameController::class,'indexfront'])->name('game_upload');

//*************************** ADMİN ROUTES **********************************//
Route::get('/admin',[AdminController::class,'home'])->name('admin_home');
Route::get('/admin/addgame',[AdminController::class,'add_game'])->name('add_game');



//*************************** GAME ROUTES *************************************//
Route::post('/uploadgame',[GameController::class,'uploadGame'])->name('upload_game');
Route::get('/game/{id}',[GameController::class,'index'])->name('game_index');



//****************************** TEMP ROUTES **************************************//
Route::post('/temp-upload',[GameController::class,'tempUpload']);
Route::delete('/temp-delete',[GameController::class,'tempDelete']);


//****************************** AUTH ROUTES *************************************//
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
