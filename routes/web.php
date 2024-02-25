<?php

use App\Http\Controllers\AuthSocialiteController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* Google Auth */
Route::get('/google-auth/redirect', [AuthSocialiteController::class, 'redirectGoogle'])
    ->name('google-auth.redirect');

Route::get('/google-auth/callback', [AuthSocialiteController::class, 'callbackGoogle'])
    ->name('google-auth.callback');
