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
Route::get('/dashboard',function (){
    return view('dashboard.master');
})->middleware('auth')->name('dashboard');
Route::get('profile',function (){
    return view('dashboard.profile.master');
})->middleware('auth')->name('profile');
Route::get('/profile/edit',function (){
    return view('dashboard.profile.edit');
})->middleware('auth');
Route::get('messages/inbox',[\App\Http\Controllers\MessageController::class,'inbox'])->name('inbox');
Route::get('messages/inbox/{message}',[\App\Http\Controllers\MessageController::class,'read']);
Route::get('messages/sent',[\App\Http\Controllers\MessageController::class,'sent'])->name('sent');
Route::get('messages/write',[\App\Http\Controllers\MessageController::class,'write'])->name('write');
Route::post('messages/create',[\App\Http\Controllers\MessageController::class,'create'])->name('create');

