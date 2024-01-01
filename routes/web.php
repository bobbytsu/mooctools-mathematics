<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

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

Route::get('/', 'AppController@app_view')->name('app');

Route::get('/login', 'AppController@login_view')->name('login')->middleware('guest');
Route::post('/login', 'AppController@login_app');

Route::get('/logout', 'AppController@logout')->name('logout');

Route::get('/dashboard', 'AppController@dashboard_view')->name('dashboard')->middleware('auth');
Route::patch('/dashboard', 'AppController@profile_edit')->name('editprofile');
Route::delete('/dashboard', 'AppController@delete_account')->name('deleteaccount');

Route::patch('/change-password', 'AppController@change_password')->name('changepassword');

Route::get('/register', 'AppController@register_view')->name('register')->middleware('auth');
Route::post('/register', 'AppController@register_app');

Route::get('/reset-password/{id}', 'AppController@reset_password')->name('resetpassword');
Route::get('/delete-account/{id}', 'AppController@delete_account_2')->name('deleteaccount2');

Route::get('/manage-quiz', 'AppController@manage_quiz_view')->name('managequiz')->middleware('auth');
Route::post('/manage-quiz', 'AppController@add_question')->name('addquestion');

Route::get('/edit-question/{question}', 'AppController@edit_question_view')->name('editquestion')->middleware('auth');
Route::patch('/edit-question/{question}', 'AppController@edit_question_app')->name('editquestionapp');

Route::get('/delete-question/{id}', 'AppController@delete_question')->name('deletequestion');

Route::get('/kindergarten/addition', 'AppController@addition_kindergarten_view')->name('addition-kindergarten');
Route::get('/elementary/addition', 'AppController@addition_view')->name('addition');
Route::post('/kindergarten/addition', 'AppController@addition_kindergarten_app')->name('additionkindergartensolution');
Route::post('/elementary/addition', 'AppController@addition_app')->name('additionsolution');

Route::get('/kindergarten/subtraction', 'AppController@view_subtraction_kindergarten')->name('subtraction-kindergarten');
Route::get('/elementary/subtraction', 'AppController@view_subtraction')->name('subtraction');
Route::post('/kindergarten/subtraction', 'AppController@subtraction_kindergarten_app')->name('subtractionkindergartensolution');
Route::post('/elementary/subtraction', 'AppController@subtraction_app')->name('subtractionsolution');

Route::get('/elementary/multiplication', 'AppController@view_multiplication')->name('multiplication');
Route::post('/elementary/multiplication', 'AppController@multiplication_app')->name('multiplicationsolution');

Route::get('/elementary/division', 'AppController@view_division')->name('division');
Route::post('/elementary/division', 'AppController@division_app')->name('divisionsolution');

Route::get('/elementary/exponentiation', 'AppController@view_exponentiation')->name('exponentiation');
Route::post('/elementary/exponentiation', 'AppController@exponentiation_app')->name('exponentiationsolution');

Route::get('/elementary/square-root', 'AppController@view_square_root')->name('squareroot');
Route::post('/elementary/square-root', 'AppController@square_root_app')->name('squarerootsolution');

Route::get('/elementary/select-quiz', 'AppController@view_select_quiz')->name('selectquiz');

Route::get('/kindergarten/quiz', 'AppController@quiz_kindergarten_app')->name('quizkindergarten');
Route::post('/kindergarten/quiz-result', 'AppController@quiz_kindergarten_result_app')->name('quizkindergartenresult');

Route::get('/elementary/quiz-1st-2nd-grade', 'AppController@quiz_1st_2nd_grade_app')->name('quiz1st2ndgrade');
Route::post('/elementary/quiz-1st-2nd-grade-result', 'AppController@quiz_1st_2nd_grade_result_app')->name('quiz1st2ndgraderesult');

Route::get('/elementary/quiz-3rd-4th-grade', 'AppController@quiz_3rd_4th_grade_app')->name('quiz3rd4thgrade');
Route::post('/elementary/quiz-3rd-4th-grade-result', 'AppController@quiz_3rd_4th_grade_result_app')->name('quiz3rd4thgraderesult');

Route::get('/elementary/quiz-5th-6th-grade', 'AppController@quiz_5th_6th_grade_app')->name('quiz5th6thgrade');
Route::post('/elementary/quiz-5th-6th-grade-result', 'AppController@quiz_5th_6th_grade_result_app')->name('quiz5th6thgraderesult');

Route::get('/about', 'AppController@view_about')->name('about');
Route::get('/contact', 'AppController@view_contact')->name('contact');
Route::get('/privacy', 'AppController@view_privacy')->name('privacy');
Route::get('/terms', 'AppController@view_terms')->name('terms');
