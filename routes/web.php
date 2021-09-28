<?php

use App\Http\Controllers\Api\v1\{AuthController, UserController};
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

Route::prefix('login')
    ->group(function () {

        Route::prefix('google')
            ->namespace('google')
            ->group(function () {
                Route::get('/', [AuthController::class, 'redirectToGoogle'])->name('login.google');
                Route::get('callback', [AuthController::class, 'handleGoogleCallback']);
            });

        Route::prefix('facebook')
            ->namespace('facebook')
            ->group(function () {
                Route::get('/', [AuthController::class, 'redirectToFacebook'])->name('login.facebook');
                Route::get('callback', [AuthController::class, 'handleFacebookCallback']);
            });

    });


Route::prefix('users')
    ->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{user}/show', [UserController::class, 'show']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/store', [UserController::class,'store']);
        Route::get('/{user}/edit', [UserController::class, 'edit']);
        Route::put('/{user}/update', [UserController::class,'update']);
        Route::get('/{user}/delete', [UserController::class,'destroy']);
    });
