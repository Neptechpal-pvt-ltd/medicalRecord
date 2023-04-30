<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

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
// Route::middleware()
Route::group(['middleware' => ['auth']],function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category',CategoryController::class);
Route::get('category/{category_id}/add-question',[QuestionController::class,'create']);
Route::get('category/{category_id}/edit-question/{question_id}',[QuestionController::class,'edit']);
Route::get('category/{category_id}/view-question/{question_id}',[QuestionController::class,'show']);
Route::resource('question',QuestionController::class);
});
