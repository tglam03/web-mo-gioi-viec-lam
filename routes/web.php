<?php

    use App\Http\Controllers\AuthController;
    use Illuminate\Support\Facades\Route;
    use Laravel\Socialite\Facades\Socialite;

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
        return view('layout.master');
    })->name('welcome');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registering'])->name('registering');

    Route::get('/auth/redirect/{provider}', function ($provider) {
        return Socialite::driver($provider)->redirect();
    })->name('auth.redirect');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/auth/callback/{provider}', [AuthController::class, 'callback'])->name('auth.callback');

