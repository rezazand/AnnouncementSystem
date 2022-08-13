<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
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
    return redirect()->route('login');
});

Route::middleware('auth')->group(function (){

    Route::get('/dashboard',function (){return view('dashboard.master');})->name('dashboard');

    //---------------------------Profile-----------------------//

    Route::get('profile',[ProfileController::class,'index'])->name('profile');
    Route::put('profile/update',[ProfileController::class,'update'])->name('profile.update');

    //---------------------------Messages-----------------------//

    Route::resource('message',\App\Http\Controllers\MessageController::class)->except(['edit','destroy','update']);
    Route::post('reply/{message}',[MessageController::class,'reply'])->name('reply');
    Route::get('messages/inbox/download/{file}',[MessageController::class,'download'])->name('download');

    //---------------------------Manage-----------------------//

    Route::middleware('can:admin')->group(function (){
        Route::get('manage',[\App\Http\Controllers\ManageController::class,'index'])->name('manage');

        Route::post('manage/user/create',[\App\Http\Controllers\ManageController::class,'createUser'])->name('create-user')->can('create-user');
        Route::get('manage/user/delete/{user}',[\App\Http\Controllers\ManageController::class,'deleteUser'])->name('delete-user')->can('delete-user');
        Route::post('manage/user/edit',[\App\Http\Controllers\ManageController::class,'editUser'])->name('edit-user')->can('edit-user');

        Route::post('manage/department/create',[\App\Http\Controllers\ManageController::class,'createDepartment'])->name('create-department')->can('create-department');
        Route::post('manage/department/edit',[\App\Http\Controllers\ManageController::class,'editDepartment'])->name('edit-department')->can('edit-department');
        Route::get('manage/department/delete/{department}',[\App\Http\Controllers\ManageController::class,'deleteDepartment'])->name('delete-department')->can('delete-department');

        Route::post('manage/role/create',[\App\Http\Controllers\ManageController::class,'createRole'])->name('create-role')->can('create-role');
        Route::post('manage/role/edit',[\App\Http\Controllers\ManageController::class,'editRole'])->name('edit-role')->can('edit-role');
        Route::get('manage/role/delete/{role}',[\App\Http\Controllers\ManageController::class,'deleteRole'])->name('delete-role')->can('delete-role');
    });
});

