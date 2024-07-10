<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructionsController;
use App\Http\Controllers\VolunteeringController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
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


// Route::get("/profile",[ProfileController::class,'index']);
Route::get("/profile",[ProfileController::class,'index'])->middleware('verified');
Route::post("/update/profile/{id}",[ProfileController::class,'update'])->name("updateProfile");


Route::get("/",[HomeController::class,'getdata']);
Route::get("/home",[HomeController::class,'getdata']);
Route::post('/update-user-state', [HomeController::class,'getdata'])->name('update-user-state');

// Route::get("/instruction",[InstructionController::class,'index']);
Route::get('/instructions',[InstructionsController::class,'index'])->name('instructions.index');

// Route::get("/volunteering",[VolunteeringController::class,'index']);
Route::get('/volunteering',[VolunteeringController::class,'create'])->name('volunteering.create');
Route::post('/volunteering',[VolunteeringController::class,'store'])-> name('volunteering.store');
Route::get('/adminUser',[AdminUserController::class,'index'])->name('adminUser.index');
Route::get('/update',[AdminUserController::class,'update'])->name('adminUser.update');
Route::delete('/user/{user}',[AdminUserController::class,'destroy'])-> name('user.destroy');
Route::delete('/volunteer/{vol}',[VolunteeringController::class,'destroy'])-> name('volunteer.destroy');
Route::post('/sendAlarm',[AdminUserController::class,'sendAlarms'])-> name('send.alarms');
// Route::redirect('/adminUser', '/sendAlarm');

Route::get("/logout",[LoginController::class,'logout']);
Route::post("/login",[RegisterController::class,'create'])->name('register.create');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
