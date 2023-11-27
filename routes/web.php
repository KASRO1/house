<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\Authenticate;
use \App\Http\Controllers\Auth\AuthController;

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
    return view('main');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', [RegisterController::class, 'create']);

Route::get('/trade', function () {
    return view('trade');
})->middleware(Authenticate::class);

Route::get('/assets', function () {
    return view('assets');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/security', function () {
    return view('security');
});

Route::get('/risk', function () {
    return view('risk');
});

Route::get('/referral', function () {
    return view('referral');
});

Route::get('/privacy', function () {
    return view('privacy');
});


Route::post('/signup', [RegisterController::class, 'store'])->name("register");

Route::get('/logout', [AuthController::class, 'logout'])->name("logout");

Route::post('/login', [AuthController::class, 'login'])->name("login");
