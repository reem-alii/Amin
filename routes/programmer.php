<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\programmer\ProgrammerHomeController;
use App\Http\Controllers\programmer\TestModelController;
use App\Http\Controllers\programmer\PredictionController;
use App\Http\Controllers\programmer\auth\ProgrammerLoginController;



/*
|--------------------------------------------------------------------------
| programmer Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/programmer/home',[ProgrammerHomeController::class,'index'])
->name('programmer.home')->middleware('auth:programmer');


Route::get('/programmer/testmodel',[TestModelController::class,'index'])->name('programmer.testmodel');

Route::get('/programmer/logout',[ProgrammerLoginController::class,'logout'])->name('programmer.logout');

Route::post('/programmer/getPrediction', [PredictionController::class,'getPrediction'])->name('programmer.getPrediction');


Route::post('/programmer/getWindstormPrediction', [PredictionController::class,'getWindstormPrediction'])->name('programmer.getWindstormPrediction');

Route::get('/programmer/login',[ProgrammerLoginController::class,'login'])->name('programmer.login');

Route::post('/programmer/login',[ProgrammerLoginController::class,'check'])->name('programmer.check');







