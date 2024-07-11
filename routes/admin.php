<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\auth\AdminLoginController;



/*
|--------------------------------------------------------------------------
| admin Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin/home',[AdminHomeController::class,'index'])
->name('admin.home')->middleware('auth:admin');

Route::get('admin/logout',[AdminLoginController::class,'logout'])->name('admin.logout');

Route::get('admin/login',[AdminLoginController::class,'login'])->name('admin.login');

Route::post('admin/login',[AdminLoginController::class,'check'])->name('admin.check');

//Route::get('admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');



Route::get('admin/adminUser',[AdminUserController::class,'index'])->name('adminUser.index');
Route::get('admin/update',[AdminUserController::class,'update'])->name('adminUser.update');
Route::delete('admin/user/{user}',[AdminUserController::class,'destroy'])-> name('user.destroy');
Route::post('admin/sendAlarm',[AdminUserController::class,'sendAlarms'])-> name('send.alarms');


