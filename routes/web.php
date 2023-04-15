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
Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\UserDashboardController::class, 'index']);
    Route::get('browse', [App\Http\Controllers\UserDashboardController::class, 'browse']);

    //Update profile
    Route::get('profile/{id}', [App\Http\Controllers\UserController::class, 'editProfile']);
    Route::put('profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile']);

    //ACTIVITY ROUTES
    Route::get('activity', [App\Http\Controllers\ActivityController::class, 'index']);
    Route::get('add-activity', [App\Http\Controllers\ActivityController::class, 'create']);
    Route::post('add-activity', [App\Http\Controllers\ActivityController::class, 'store']);
    Route::get('edit-activity/{id}', [App\Http\Controllers\ActivityController::class, 'edit']);
    Route::put('edit-activity/{id}', [App\Http\Controllers\ActivityController::class, 'update']);
    Route::get('delete-activity/{id}', [App\Http\Controllers\ActivityController::class, 'destroy']);
});

Route::prefix('admin')->middleware(['auth', 'IsAdmin'])->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Roles
    Route::get('roles', [App\Http\Controllers\RoleController::class, 'index']);

    //USER LIST
    Route::get('users', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::put('edit-user/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

});
