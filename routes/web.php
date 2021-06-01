<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowsController;


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

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/about', function () {
//    return view('pages.about');
//});



Route::get('/',[PagesController::class, 'index']);
Route::get('/about',[PagesController::class, 'about']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('students',StudentsController::class);
Route::resource('books',BooksController::class);
Route::resource('borrows',BorrowsController::class);
