<?php

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



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routes des utilisateurs simple
Route::middleware(['auth', 'user-access:user'])->group(function (){

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});

//Route des administrateurs
Route::middleware(['auth', 'user-access:admin'])->group(function (){

    Route::get('/admin/home', [HomeController::class, 'admin/home'])->name('admin.home');
});