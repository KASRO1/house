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
use \App\Http\Controllers\TradeController;
use App\Http\Controllers\DomainController;



Route::view("/", "main");
Route::view("/faq", "faq");
Route::view("/terms", "terms");
Route::view("/security", "security");
Route::view("/risk", "risk");
Route::view("/referral", "referral");
Route::view("/privacy", "privacy");
Route::view("/about", "about");
Route::get("/test", [DomainController::class, "test"]);
Route::post('/payment/notificate', [\App\Http\Controllers\PaymentController::class, 'PaymentNotification'])->name("payment.notify");


Route::middleware("auth")->group(function (){

    Route::get('/trade', [TradeController::class, 'redirect'])->name('trade');
    Route::get('/trade/{pair}', [TradeController::class, 'index'])->name("trade:pair");
    Route::post("/trade/create/order", [TradeController::class, "createOrder"])->name("trade.create.order");
    Route::post("/trade/assets/get", [TradeController::class, "getAssets"])->name("trade.assets");
    Route::post("/trade/order/close", [TradeController::class, "closeOrder"])->name("trade.order.close");
    Route::post("/trade/history/get", [TradeController::class, "getHistoryTrade"])->name("trade.history");
    Route::post("/trade/recent/order/get", [TradeController::class, "getRecentTrades"])->name("trade.recent.orders");

    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
    Route::get('/assets', [AssetController::class, 'index'])->name("assets");

    Route::post("/assets/balance/standard/get",[BalanceController::class, "getBalanceCoin"])->name("assets.balance.get");
    Route::post("/assets/balance/spot/get",[BalanceController::class, "getBalanceCoinSpot"])->name("assets.balance.spot.get");
    Route::post("/assets/swap/coin", [BalanceController::class, "swapBalanceCoin"])->name("assets.swap.balance");
    Route::post("/assets/swap/price", [BalanceController::class, "convertCryptoPrice"])->name("assets.swap.convertCryptoPrice");
    Route::post("/assets/stacking/calculate",[BalanceController::class, "getStackingSumm"])->name("assets.stacking.calculate");
    Route::post("/assets/stacking/order/create",[BalanceController::class, "createStackingOrder"])->name("assets.stacking.order.create");
    Route::post("/assets/wallet/get", [UserController::class, "getWallet"])->name("assets.wallet.get");

    Route::get('/account', [UserSettingsController::class, "index"]);

    Route::post("/account/change/password", [UserSettingsController::class, "changePassword"])->name("user.change.password");
    Route::post("/account/promocode/active", [PromoСodeController::class, "active"])->name("user.promocode.active");
    Route::post("/account/swap/spot", [BalanceController::class, "swapToSpot"])->name("user.swap.spot");
    Route::post("/account/transfer/spot", [BalanceController::class, "TransferToSpot"])->name("user.transfer.spot");
    Route::post("/account/transfer/coin", [BalanceController::class, "TransferSpotToBalance"])->name("user.transfer.balance");
    Route::post("/account/transfer/user", [BalanceController::class, "TransferToUser"])->name("user.transfer.user");
    Route::post("/account/kyc/send", [UserSettingsController::class, "createKycApplication"])->name("user.kyc.send");
    Route::post("/account/wallets/update", [UserController::class, "updateWallets"])->name("user.wallets.update");
    Route::post("/account/2fa/enable", [UserSettingsController::class, "enable2FA"])->name("user.2fa.enable");
    Route::post("/account/2fa/disable", [UserSettingsController::class, "disable2FA"])->name("user.2fa.disable");
    Route::post("/account/session/delete", [UserSettingsController::class, "deleteSession"])->name("user.session.delete");





});

Route::middleware('role:worker,admin')->group(function () {
    Route::get("/admin", [\App\Http\Controllers\AdminController::class, "index"])->name("admin");
    Route::get("/admin/settings", [\App\Http\Controllers\UserSettingsController::class, "settingsAdmin"])->name("admin.settings");
    Route::post("/admin/user/binding", [UserController::class, "BindingUser"])->name("admin.user.binding");
    Route::get("/admin/orders", [\App\Http\Controllers\AdminController::class, "viewOrders"])->name("admin.orders");
    Route::get("/admin/kyc", [\App\Http\Controllers\AdminController::class, "viewKyc"])->name("admin.kyc");
    Route::post("/admin/kyc/get", [\App\Http\Controllers\AdminController::class, "viewKycID"])->name("admin.kyc.id");
    Route::post("/admin/kyc/accept", [\App\Http\Controllers\AdminController::class, "acceptKycApp"])->name("admin.kyc.accept");
    Route::post("/admin/kyc/reject", [\App\Http\Controllers\AdminController::class, "rejectKycApp"])->name("admin.kyc.reject");

    Route::get("/admin/user/{id}", [UserController::class, "show"])->name("admin.user:id");
    Route::get("/admin/user/{id}/auth", [UserController::class, "auth"])->name("admin.user.auth:id");
    Route::get("/admin/user/{id}/change/status", [UserController::class, "changeStatus"])->name("admin.user.change.status:id");
    Route::post("/admin/user/balance/add", [UserController::class, "addBalance"])->name("admin.user.balance.add");
    Route::post("/admin/user/balance/remove", [UserController::class, "removeBalance"])->name("admin.user.balance.remove");

    Route::get("/admin/domains", [DomainController::class, 'index'])->name("admin.domains");
    Route::post("/admin/domain/add", [DomainController::class, "create"])->name("backend.admin.domain.add");
    Route::post("/admin/domain/update/status/{id}", [DomainController::class, "updateStatusCloudflare"])->name("backend.admin.domain.update.status");
    Route::post("/admin/domain/delete/{id}", [DomainController::class, "delete"]);

    Route::get("/admin/promocode", [PromoСodeController::class, "indexAdmin"])->name("admin.promocode");
    Route::post("/admin/promocode/create", [PromoСodeController::class, "create"])->name("admin.promocode.create");
    Route::get("/admin/promocode/delete/{promocode}", [PromoСodeController::class, "delete"])->name("admin.promocode.delete");

    Route::post("/admin/user/update/telegram", [UserController::class, "updateTelegram"])->name("admin.user.update.telegram");
    });


    Route::middleware('role:admin')->group(function () {
    Route::get("/admin/workers", [\App\Http\Controllers\AdminController::class, "viewWorkers"])->name("admin.workers");
    });

Route::middleware("guest")->group(function (){

    Route::get('/login', [AuthController::class, 'index']);
    Route::get('/signup', [RegisterController::class, 'index']);
    Route::get('/signup/email/confirm/{token}', [RegisterController::class, 'email_confirm'])->name("register.email.confirm");
    Route::view('/password/reset', "auth.reset-password")->name("password.reset");
    Route::get('/password/reset/{token}', [AuthController::class, 'resetPassword'])->name("password.reset.token");

    Route::post('/login', [AuthController::class, 'store'])->name("login");
    Route::post('/signup', [RegisterController::class, 'store'])->name("register");
    Route::post('/password/reset', [AuthController::class, 'resetPasswordEmail'])->name("password.reset");
    Route::post('/password/change', [AuthController::class, 'changePassword'])->name("password.reset.post.token");

});
