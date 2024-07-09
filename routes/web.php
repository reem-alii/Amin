<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\VerificationController;
use App\Http\Controllers\InstructionsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});


Auth::routes(['verify'=>true]);

Route::get("/logout",[LoginController::class,'logout']);
Route::get("/profile",[ProfileController::class,'index'])->middleware('verified');
Route::get("/",[HomeController::class,'getdata']);
Route::get("/home",[HomeController::class,'getdata']);
Route::post('/update-user-state', [HomeController::class,'getdata'])->name('update-user-state');
Route::get('/instructions',[InstructionsController::class,'index'])->name('instructions.index');





