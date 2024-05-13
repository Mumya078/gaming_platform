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
Route::get('/category/{category}',[HomeController::class,'category'])->name('category');
//***************************** TRY ROUTES **********************************//
Route::get('/home',function (){
    return redirect('/');
});
Route::get('/anasayfa',function (){
    return redirect('/');
});
Route::get('/dashboard',function (){
    return redirect('/');
});


Route::get('/game/{id}',[GameController::class,'index'])->name('game_index');
Route::middleware('App\Http\Middleware\AuthenticateUser')->group(function (){
    Route::get('/uploadgame',[GameController::class,'indexfront'])->name('game_upload');
    //*************************** GAME ROUTES *************************************//
    Route::post('/uploadgame',[GameController::class,'uploadGame'])->name('upload_game');
    //*************************** ADMİN ROUTES **********************************//
    Route::get('/admin',[AdminController::class,'home'])->name('admin_home');
    Route::get('/admin/approvegames',[AdminController::class,'approve_games'])->name('approve_games');
    Route::get('/admin/approvegames/delete/{id}',[AdminController::class,'deny_game'])->name('deny_game');
    Route::get('/admin/approvegames/approve/{id}',[AdminController::class,'approve_game'])->name('approve_game');
    Route::get('/admin/addcat',[AdminController::class,'add_cat'])->name('add_cat');
    Route::post('/admin/addcat/uploadcat',[AdminController::class,'upload_cat'])->name('upload_cat');

    //****************************** TEMP ROUTES **************************************//
    Route::post('/temp-upload',[GameController::class,'tempUpload']);
    Route::delete('/temp-delete',[GameController::class,'tempDelete']);

    //****************************** AUTH ROUTES *************************************//
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::get('/signup',[AuthController::class,'signup'])->name('signup');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/profile',[AuthController::class,'profile'])->name('profile');
    Route::post('/profile/update',[AuthController::class,'update_profile'])->name('update_profile');
});
