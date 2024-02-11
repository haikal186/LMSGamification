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
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::prefix('register')->controller(RegisterController::class)->group(function() {
    Route::get('create-user', 'store')->name('user.create');
    Route::post('store', 'create')->name('user.store');
});

Auth::routes();

Route::middleware(['isAuthenticated'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('instructor')->controller(InstructorController::class)->group(function () {
        Route::get('/', 'index')->name('instructor.index');
        Route::get('/create', 'create')->name('instructor.create');
        Route::post('/store', 'store')->name('instructor.store');
        Route::get('/edit/{user_id}','edit')->name('instructor.edit');
        Route::put('/update/{user_id}','update')->name('instructor.update');
        Route::delete('/destroy/{user_id}','destroy')->name('instructor.destroy');
        Route::get('/show/{user_id}', 'show')->name('instructor.show');
    });

    Route::prefix('student')->controller(StudentController::class)->group(function () {

        Route::get('/', 'index')->name('student.index');
        Route::get('/show/{user_id}', 'show')->name('student.show');
        Route::get('/edit/{user_id}','edit')->name('student.edit');
        Route::put('/update/{user_id}','update')->name('student.update');
        Route::get('/create', 'create')->name('student.create');
        Route::post('/store', 'store')->name('student.store');
        Route::delete('/destroy/{user_id}','destroy')->name('student.destroy');

    });

    Route::prefix('profile')->controller(ProfileController::class)->group(function () {

        Route::get('/show/{user_id}', 'show')->name('profile.show');
        Route::get('/edit/{user_id}','edit')->name('profile.edit');
        Route::put('/update/{user_id}','update')->name('profile.update');

    });

    
    Route::prefix('course')->controller(CourseController::class)->group(function(){
        Route::get('/', 'index')->name('course.index');
        Route::post('/search', 'search')->name('course.search');
        Route::get('/create', 'create')->name('course.create');
        Route::post('/store', 'store')->name('course.store');
        Route::get('/show/{course_id}', 'show')->name('course.show');
        Route::get('/edit/{course_id}','edit')->name('course.edit');
        Route::put('/update/{course_id}', 'update')->name('course.update');
        Route::get('/lesson', 'lesson')->name('course.lesson');
        Route::get('/delete/{course_id}','delete')->name('course.delete');
        Route::delete('/destroy/{course_id}','destroy')->name('course.destroy');
        Route::post('/storeFile/{course_id}', 'storeFile')->name('course.storeFile');
        Route::delete('/destroyFile/{course_id}', 'destroyFile')->name('course.destroyFile');

    });

    Route::prefix('assignment')->controller(AssignmentController::class)->group(function () {
    
        Route::post('/store/{course_id}', 'store')->name('assignment.store');
        Route::get('/show/{assignment_id}', 'show')->name('assignment.show');
        Route::get('/edit/{assignment_id}', 'edit')->name('assignment.edit');
        Route::put('/update/{assignment_id}', 'update')->name('assignment.update');
    });
    
    Route::prefix('quiz')->controller(QuizController::class)->group(function () {
    
        Route::get('/', 'index')->name('quiz.index');
        Route::post('/store/{course_id}', 'store')->name('quiz.store');
        Route::get('/show/{quiz_id}', 'show')->name('quiz.show');
        Route::put('/update/{quiz_id}', 'update')->name('quiz.update');
        Route::get('/detail/{quiz_id}', 'detail')->name('quiz.detail');
        Route::get('/create/{quiz_id}', 'create')->name('quiz.create');
        Route::post('/search', 'search')->name('quiz.search');

    });
    
    Route::prefix('question')->controller(QuestionController::class)->group(function () {
    
        Route::get('/create/{quiz_id}', 'create')->name('question.create');
        Route::post('/store/{quiz_id}', 'store')->name('question.store');
        Route::get('/show/{question_id}', 'show')->name('question.show');
        Route::put('/update/{question_id}', 'update')->name('question.update'); 
        Route::get('/image/{filename}', 'showImage')->name('question.image.show');       
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





