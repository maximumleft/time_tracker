<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TimeUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'],function () {
    Route::get('/',[AdminController::class,'index'])->name('index');

    Route::group(['prefix' => 'users'],function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{user}', [UserController::class, 'delete'])->name('user.destroy');
    });

    Route::group(['prefix' => 'time-users'],function () {
        Route::get('/', [TimeUserController::class, 'index'])->name('time.user.index');
        Route::get('/create', [TimeUserController::class, 'create'])->name('time.user.create');
        Route::post('/', [TimeUserController::class, 'store'])->name('time.user.store');
        Route::get('/{userTime}', [TimeUserController::class, 'show'])->name('time.user.show');
        Route::get('/{userTime}/edit', [TimeUserController::class, 'edit'])->name('time.user.edit');
        Route::patch('/{userTime}', [TimeUserController::class, 'update'])->name('time.user.update');
        Route::delete('/{userTime}', [TimeUserController::class, 'delete'])->name('time.user.destroy');
    });

    Route::group(['prefix' => 'time'],function () {
        Route::get('/', [TimeController::class, 'index'])->name('time.index');
        Route::get('/create', [TimeController::class, 'create'])->name('time.create');
        Route::post('/', [TimeController::class, 'store'])->name('time.store');
        Route::get('/{time}', [TimeController::class, 'show'])->name('time.show');
        Route::get('/{time}/edit', [TimeController::class, 'edit'])->name('time.edit');
        Route::patch('/{time}', [TimeController::class, 'update'])->name('time.update');
        Route::delete('/{time}', [TimeController::class, 'delete'])->name('time.destroy');
    });

});
