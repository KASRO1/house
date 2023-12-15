<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\Authenticate;
use \App\Http\Controllers\Auth\AuthController;
use \App\Http\Middleware\RedirectIfAuthenticated;
use \App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\AssetController;
use \App\Http\Controllers\PromoСodeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BalanceController;



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
    Route::post("/account/promocode/active", [PromoСodeController::class, "create"])->name("user.promocode.active");
    Route::post("/account/swap/spot", [BalanceController::class, "swapToSpot"])->name("user.swap.spot");
    Route::post("/account/swap/coin", [BalanceController::class, "swapBalanceCoin"])->name("user.swap.balance");
    Route::post("/account/transfer/spot", [BalanceController::class, "transferToSpot"])->name("user.transfer.spot");
    Route::post("/account/transfer/coin", [BalanceController::class, "transferBalanceCoin"])->name("user.transfer.balance");


});

Route::middleware('role:worker,admin')->group(function () {
    Route::get("/admin", [\App\Http\Controllers\AdminController::class, "index"])->name("admin");
    Route::post("/admin/user/binding", [UserController::class, "BindingUser"])->name("admin.user.binding");
    Route::view("/admin/users", "admin.users")->name("admin.users");
    Route::view("/admin/promocode", "admin.promocode")->name("admin.promocode");
});

Route::middleware("guest")->group(function (){

    Route::get('/login', [AuthController::class, 'index']);
    Route::get('/signup', [RegisterController::class, 'index']);

    Route::post('/login', [AuthController::class, 'store'])->name("login");
    Route::post('/signup', [RegisterController::class, 'store'])->name("register");
});



