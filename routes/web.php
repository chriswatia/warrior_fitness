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

    //Update profile
    Route::get('profile/{id}', [App\Http\Controllers\UserController::class, 'editProfile']);
    Route::put('profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile']);
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
