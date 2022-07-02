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

Route::middleware('auth')->group(function (){
    Route::get('/dashboard',function (){return view('dashboard.master');})->name('dashboard');
    Route::get('profile',function (){return view('profile');})->name('profile');
    Route::get('messages/inbox',[\App\Http\Controllers\MessageController::class,'inbox'])->name('inbox');
    Route::get('messages/inbox/workflow/{message}',[\App\Http\Controllers\MessageController::class,'workflow'])->name('workflow');
    Route::get('messages/inbox/{message}',[\App\Http\Controllers\MessageController::class,'read'])->name('read');
    Route::get('messages/inbox/download/{file}',[\App\Http\Controllers\MessageController::class,'download'])->name('download');
    Route::get('messages/inbox/reply/{reply}',[\App\Http\Controllers\MessageController::class,'check'])->name('check');
    Route::get('messages/sent',[\App\Http\Controllers\MessageController::class,'sent'])->name('sent');
    Route::get('messages/write',[\App\Http\Controllers\MessageController::class,'write'])->name('write');
    Route::post('messages/create',[\App\Http\Controllers\MessageController::class,'create'])->name('create');
    Route::get('manage',[\App\Http\Controllers\ManageController::class,'index'])->name('manage');
    Route::post('manage/user/create',[\App\Http\Controllers\ManageController::class,'createUser'])->name('create-user');
    Route::post('manage/department/create',[\App\Http\Controllers\ManageController::class,'createDepartment'])->name('create-department');
    Route::get('manage/user/delete/{user}',[\App\Http\Controllers\ManageController::class,'deleteUser'])->name('delete-user');
    Route::post('manage/user/edit',[\App\Http\Controllers\ManageController::class,'editUser'])->name('edit-user');
    Route::get('manage/role/delete/{role}',[\App\Http\Controllers\ManageController::class,'deleteRole'])->name('delete-role');
    Route::get('manage/department/delete/{department}',[\App\Http\Controllers\ManageController::class,'deleteDepartment'])->name('delete-department');
    Route::post('manage/department/edit',[\App\Http\Controllers\ManageController::class,'editDepartment'])->name('edit-department');
    Route::post('manage/role/edit',[\App\Http\Controllers\ManageController::class,'editRole'])->name('edit-role');
    Route::post('manage/role/create',[\App\Http\Controllers\ManageController::class,'createRole'])->name('create-role');

    Route::get('manage/edit',[]);
});
Route::get('/', function () {
    return redirect()->route('login');
});

