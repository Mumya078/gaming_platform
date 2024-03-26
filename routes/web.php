<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//**************************  HOME ROUTES ***********************************//
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/home',function (){
    return redirect('/');
});
Route::get('/anasayfa',function (){
    return redirect('/');
});



//*************************** ADMİN ROUTES **********************************//
Route::get('/admin',[AdminController::class,'home'])->name('admin_home');
Route::get('/admin/addgame',[AdminController::class,'add_game'])->name('add_game');



//*************************** GAME ROUTES *************************************//
Route::post('/uploadgame',[GameController::class,'uploadGame'])->name('upload_game');
Route::get('/game/{id}',[GameController::class,'index'])->name('game_index');



//****************************** TEMP ROUTES **************************************//
Route::post('/temp-upload',[GameController::class,'tempUpload']);
Route::delete('/temp-delete',[GameController::class,'tempDelete']);
