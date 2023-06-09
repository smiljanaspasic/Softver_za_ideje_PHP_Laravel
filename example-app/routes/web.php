<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/new_idea', [App\Http\Controllers\SuggestionController::class, 'index'])->name('new_idea');
Route::post('/new_idea',[App\Http\Controllers\SuggestionController::class,'store'])->name('store_idea');
Route::get('/my_ideas',[App\Http\Controllers\SuggestionController::class,'show'])->name('my_ideas');
Route::post('/edit/{id}',[App\Http\Controllers\HomeController::class,'edit'])->name('edit');
Route::post('/search',[App\Http\Controllers\HomeController::class,'search'])->name('search');
Route::post('/searchuser',[App\Http\Controllers\HomeController::class,'searchuser'])->name('searchuser');
Route::get('/accept',[App\Http\Controllers\HomeController::class, 'accept'])->name('accept');
Route::get('/partly',[App\Http\Controllers\HomeController::class, 'partly'])->name('partly');
Route::get('/decline',[App\Http\Controllers\HomeController::class, 'decline'])->name('decline');
Route::get('/wait',[App\Http\Controllers\HomeController::class, 'wait'])->name('wait');