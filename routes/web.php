<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\AchievementController;

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

Route::get('/', function () { return view('auth.login'); }) -> name('login');

Route::get('/register', function () { return view('auth.register'); })->name('register');

Auth::routes();

Route::middleware(['auth']) -> group(function() {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('profile.index');
        Route::get('/create', 'create')->name('profile.create');
        Route::post('/store', 'store')->name('profile.store');
        Route::get('/show/{id}','show')->name('profile.show');
        Route::delete('/destroy/{id}','destroy')->name('profile.destroy');
        Route::get('/detail/{id}', 'detail')->name('profile.detail');
    });

    Route::prefix('student')->controller(StudentController::class)->group(function () {

        Route::get('/', 'index')->name('student.index');

    });
    
    Route::prefix('course')->controller(CourseController::class)->group(function(){
        Route::get('/', 'index')->name('course.index');
        // Route::get('/create', 'create')->name('course.create')->middleware('checkRole:lecturer');
        Route::get('/create', 'create')->name('course.create');
        Route::post('/store', 'store')->name('course.store');
        Route::get('/show/{course_id}', 'show')->name('course.show');
        Route::get('/edit/{id}','edit')->name('course.edit');
        Route::put('/update/{id}', 'update')->name('course.update');
        Route::get('/lesson', 'lesson')->name('course.lesson');
    
    });

    Route::prefix('assignment')->controller(AssignmentController::class)->group(function () {
    
        Route::post('/store/{course_id}', 'store')->name('assignment.store');
        Route::get('/show/{assignment_id}', 'show')->name('assignment.show');

    });
    
    Route::prefix('quiz')->controller(QuizController::class)->group(function () {
    
        Route::get('/', 'index')->name('quiz.index');
        Route::post('/store/{course_id}', 'store')->name('quiz.store');
        Route::get('/show/{quiz_id}', 'show')->name('quiz.show');
        Route::put('/update/{quiz_id}', 'update')->name('quiz.update');
        Route::get('/detail/{quiz_id}', 'detail')->name('quiz.detail');
        Route::get('/create/{quiz_id}', 'create')->name('quiz.create');
    });
    
    Route::prefix('question')->controller(QuestionController::class)->group(function () {
    
        Route::get('/create/{quiz_id}', 'create')->name('question.create');
        Route::post('/store/{quiz_id}', 'store')->name('question.store');
        Route::get('/show/{question_id}', 'show')->name('question.show');
        Route::put('/update/{question_id}', 'update')->name('question.update');        
    });

    Route::prefix('user_answer')->controller(UserAnswerController::class)->group(function () {

        Route::get('/show/{question_id}', 'show')->name('user_answer.show');
        Route::post('/store/{question_id}', 'store')->name('user_answer.store');
        Route::get('/result/{quiz_id}', 'result')->name('user_answer.result');
        
    });
    
    Route::prefix('enroll')->controller(EnrollController::class)->group(function () {
    
        Route::get('/', 'index')->name('enroll.index');
        Route::post('/store/{course_id}', 'store')->name('enroll.store');
        Route::get('/show/{course_id}', 'show')->name('enroll.show');
        Route::get('/quiz/{course_id}', 'show')->name('enroll.quiz');

    
    });

    Route::prefix('achievement')->controller(AchievementController::class)->group(function () {
    
        Route::get('/', 'index')->name('achievement.index');
        Route::get('/show/{quiz_id}', 'show')->name('achievement.show');
        
    });

});





