<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\EnrollController;


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
    Route::get('/show/{id}','show')->name('profile.show');
    Route::delete('/destroy/{id}','destroy')->name('profile.destroy');
    Route::get('/detail/{id}', 'detail')->name('profile.detail');
});

Route::prefix('course')->controller(CourseController::class)->group(function(){
    Route::get('/', 'index')->name('course.index');
    Route::get('/create', 'create')->name('course.create');
    Route::post('/store', 'store')->name('course.store');
    Route::get('/show/{id}', 'show')->name('course.show');
    Route::get('/edit/{id}','edit')->name('course.edit');
    Route::put('/update/{id}', 'update')->name('course.update');
    Route::get('/lesson', 'lesson')->name('course.lesson');

});

Route::prefix('quiz')->controller(QuizController::class)->group(function () {

    Route::get('/', 'index')->name('quiz.index');
    Route::post('/store/{course_id}', 'store')->name('quiz.store');
    Route::get('/show/{course_id}/{quiz_id}', 'show')->name('quiz.show');
    Route::put('/update/{course_id}/{quiz_id}', 'update')->name('quiz.update');

});

Route::prefix('question')->controller(QuestionController::class)->group(function () {

    Route::get('/create/{quiz_id}', 'create')->name('question.create');
    Route::post('/store/{quiz_id}', 'store')->name('question.store');

});

Route::prefix('enroll')->controller(EnrollController::class)->group(function () {

    Route::get('/', 'index')->name('enroll.index');
    Route::post('/create/{id}', 'create')->name('enroll.create');
    Route::get('/show/{id}', 'show')->name('enroll.show');

});




