<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuizController;
  
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
  
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('admin', [HomeController::class, 'dashboard'])->name('admin');
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('quiz', QuizController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('answers', AnswerController::class);
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/online/quiz/{id}', [App\Http\Controllers\HomeController::class, 'onlineQuiz'])->name('onlineQuiz');

Route::post('/quiz-check', [App\Http\Controllers\HomeController::class, 'quizCheck'])->name('quizCheck');
Route::get('/result', [App\Http\Controllers\HomeController::class, 'viewResult'])->name('viewResult');
