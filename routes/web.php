<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('profile')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('profile.index');
    Route::get('/create', 'create')->name('profile.create');
    Route::post('/store', 'store')->name('profile.store');
});


