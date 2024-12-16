<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('layout.master');
})->name('welcome');


Route::group([
    'as' => 'users.',
    'prefix' => 'users'
], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{users}', [UserController::class, 'show'])->name('show');
    Route::delete('/{users}', [UserController::class, 'destroy'])->name('destroy');
});
Route::group([
    'as' => 'posts.',
    'prefix' => 'posts'
], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
});
