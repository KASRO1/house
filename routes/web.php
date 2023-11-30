<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\Authenticate;
use \App\Http\Controllers\Auth\AuthController;
use \App\Http\Middleware\RedirectIfAuthenticated;
use \App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\AssetController;



Route::view("/", "main");
Route::view("/faq", "faq");
Route::view("/terms", "terms");
Route::view("/security", "security");
Route::view("/risk", "risk");
Route::view("/referral", "referral");
Route::view("/privacy", "privacy");
Route::view("/about", "about");


Route::middleware("auth")->group(function (){

    Route::get('/trade', function () {
        return view('trade');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
    Route::get('/assets', [AssetController::class, 'index'])->name("assets");
    Route::get('/account', [UserSettingsController::class, "index"]);
    Route::post("/account/change/password", [UserSettingsController::class, "changePassword"])->name("user.change.password");


});



Route::middleware("guest")->group(function (){

    Route::get('/login', [AuthController::class, 'index']);
    Route::get('/signup', [RegisterController::class, 'index']);

    Route::post('/login', [AuthController::class, 'store'])->name("login");
    Route::post('/signup', [RegisterController::class, 'store'])->name("register");
});



