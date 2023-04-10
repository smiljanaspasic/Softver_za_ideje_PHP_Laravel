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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/new_idea', [App\Http\Controllers\SuggestionController::class, 'index'])->name('new_idea');
Route::post('/new_idea',[App\Http\Controllers\SuggestionController::class,'store'])->name('store_idea');
Route::get('/my_ideas',[App\Http\Controllers\SuggestionController::class,'show'])->name('my_ideas');
Route::get('/home-accept/{id}',[App\Http\Controllers\HomeController::class,'accept'])->name('home.accept');
Route::get('/home-partly/{id}',[App\Http\Controllers\HomeController::class,'partly'])->name('home.partly');
Route::get('/home-cancel/{id}',[App\Http\Controllers\HomeController::class,'cancel'])->name('home.cancel');
Route::post('home-search',[App\Http\Controllers\HomeController::class,'search'])->name('home.search');