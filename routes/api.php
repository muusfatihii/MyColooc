<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\OfferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('auth/login',[AuthController::class,'login']);
Route::apiResource('auth',AuthController::class);

Route::get('home/offers',[OfferController::class,'homeOffers']);


Route::get('annonceurs',[ClientController::class,'annonceurs']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

