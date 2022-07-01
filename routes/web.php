<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});



Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

//for dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profile-update', [ProfileController::class, 'update'])->name('profile-update');
Route::get('/change-password-page', [ProfileController::class, 'changePasswordPage'])->name('change-password-page');
Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('change-password');
