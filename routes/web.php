<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;


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
    Route::get('/list', 'list')->name('course.list');
    Route::get('/create', 'create')->name('course.create');
    Route::post('/store', 'store')->name('course.store');
    Route::get('/detail/{id}', 'detail')->name('course.detail');
    Route::post('/enroll/{id}', 'enroll')->name('course.enroll');
    Route::get('/overview/{id}', 'overview')->name('course.overview');
    Route::get('/lesson', 'lesson')->name('course.lesson');
    Route::get('/quiz', 'quiz')->name('course.quiz');
    Route::get('/edit/{id}','edit')->name('course.edit');
    Route::put('/update/{id}', 'update')->name('course.update');
    Route::post('/createQuiz/{course_id}', 'createQuiz')->name('course.createQuiz');
    Route::get('/question/{id}/{quiz_id}', 'questionView')->name('course.question');
    Route::put('/updateQuiz/{id}', 'updateQuiz')->name('course.updateQuiz');
    Route::get('/quizList', 'quizList')->name('course.quizList');

});


