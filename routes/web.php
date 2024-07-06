<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructionsController;
use App\Http\Controllers\VolunteeringController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\auth\LoginController;

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
Route::post("/update/profile/{id}",[ProfileController::class,'update'])->name("updateProfile");
Route::get("/",[HomeController::class,'getdata']);
Route::get("/home",[HomeController::class,'getdata']);
Route::get('/instructions',[InstructionsController::class,'index'])->name('instructions.index');


Route::get('/volunteering',[VolunteeringController::class,'create'])->name('volunteering.create');
Route::post('/volunteering',[VolunteeringController::class,'store'])-> name('volunteering.store');
Route::get('/adminUser',[AdminUserController::class,'index'])->name('adminUser.index');
Route::get('/update',[AdminUserController::class,'update'])->name('adminUser.update');
Route::delete('/user/{user}',[AdminUserController::class,'destroy'])-> name('user.destroy');
Route::delete('/volunteer/{vol}',[VolunteeringController::class,'destroy'])-> name('volunteer.destroy');
Route::post('/sendAlarm',[AdminUserController::class,'sendPushNotificationToAllUsers'])-> name('send.alarms');


