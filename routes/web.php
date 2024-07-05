<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\VolunteeringController;
use App\Http\Controllers\auth\LoginController;
<<<<<<< HEAD
use App\Http\Controllers\auth\RegisterController;
=======
>>>>>>> 76b92cbfa136eee9492edd79498b98069e20906d
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

Route::get("/profile",[ProfileController::class,'index']);
Route::post("/update/profile/{id}",[ProfileController::class,'update'])->name("updateProfile");
Route::get("/home",[HomeController::class,'index']);
Route::get("/instruction",[InstructionController::class,'index']);
Route::get("/volunteering",[VolunteeringController::class,'index']);
Route::get("/logout",[LoginController::class,'logout']);

<<<<<<< HEAD
Route::get("/profile",[ProfileController::class,'index'])->middleware('verified');
Route::get("/",[HomeController::class,'getdata']);
Route::get("/home",[HomeController::class,'getdata']);


=======
>>>>>>> 76b92cbfa136eee9492edd79498b98069e20906d


