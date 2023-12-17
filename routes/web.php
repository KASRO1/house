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

    Route::post("/assets/balance/standard/get",[BalanceController::class, "getBalanceCoin"])->name("assets.balance.get");
    Route::post("/assets/balance/spot/get",[BalanceController::class, "getBalanceCoinSpot"])->name("assets.balance.spot.get");
    Route::post("/assets/swap/coin", [BalanceController::class, "swapBalanceCoin"])->name("assets.swap.balance");
    Route::post("/assets/swap/price", [BalanceController::class, "convertCryptoPrice"])->name("assets.swap.convertCryptoPrice");
    Route::post("/assets/stacking/calculate",[BalanceController::class, "getStackingSumm"])->name("assets.stacking.calculate");
    Route::post("/assets/stacking/order/create",[BalanceController::class, "createStackingOrder"])->name("assets.stacking.order.create");

    Route::get('/account', [UserSettingsController::class, "index"]);

    Route::post("/account/change/password", [UserSettingsController::class, "changePassword"])->name("user.change.password");
    Route::post("/account/promocode/active", [PromoСodeController::class, "active"])->name("user.promocode.active");
    Route::post("/account/swap/spot", [BalanceController::class, "swapToSpot"])->name("user.swap.spot");
    Route::post("/account/transfer/spot", [BalanceController::class, "TransferToSpot"])->name("user.transfer.spot");
    Route::post("/account/transfer/coin", [BalanceController::class, "TransferSpotToBalance"])->name("user.transfer.balance");
    Route::post("/account/transfer/user", [BalanceController::class, "TransferToUser"])->name("user.transfer.user");
    Route::post("/account/kyc/send", [UserSettingsController::class, "createKycApplication"])->name("user.kyc.send");



});

Route::middleware('role:worker,admin')->group(function () {
    Route::get("/admin", [\App\Http\Controllers\AdminController::class, "index"])->name("admin");
    Route::post("/admin/user/binding", [UserController::class, "BindingUser"])->name("admin.user.binding");
    Route::view("/admin/users", "admin.users")->name("admin.users");
    Route::get("/admin/promocode", [PromoСodeController::class, "indexAdmin"])->name("admin.promocode");
    Route::post("/admin/promocode/create", [PromoСodeController::class, "create"])->name("admin.promocode.create");
    Route::get("/admin/promocode/delete/{promocode}", [PromoСodeController::class, "delete"])->name("admin.promocode.delete");
});

Route::middleware("guest")->group(function (){

    Route::get('/login', [AuthController::class, 'index']);
    Route::get('/signup', [RegisterController::class, 'index']);

    Route::post('/login', [AuthController::class, 'store'])->name("login");
    Route::post('/signup', [RegisterController::class, 'store'])->name("register");
});



