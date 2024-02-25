<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/worker/get", [AdminController::class, "getWorker"]);


Route::post("/promocode/create", [ApiController::class, "PromocodeCreate"]);
Route::get("/promocode/delete", [ApiController::class, "deletePromo"]);

Route::get("/promocodes/statistic/get", [ApiController::class, "getPromocodesStatistic"]);
Route::get("/promocode/statistic/get", [ApiController::class, "getPromocodeStatistic"]);
