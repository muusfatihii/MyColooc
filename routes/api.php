<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\InterestController;
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
Route::post('offer/showinterest',[OfferController::class,'showinterest']);

Route::get('offer/bestannonceurs',[OfferController::class,'bestAnnonceurs']);

Route::apiResource('auth',AuthController::class);

Route::post('auth/login',[AuthController::class,'login']);

Route::post('auth/logout',[AuthController::class,'logout']);

Route::get('offer/stats',[OfferController::class,'stats']);

Route::get('offer/nbrAnnonceurs',[OfferController::class,'nbrAnnonceurs']);

Route::post('offer/filter',[OfferController::class,'filter']);

Route::get('offer/archived',[OfferController::class,'archivedOffers']);

Route::apiResource('offer',OfferController::class);



Route::post('offer/delete',[OfferController::class,'deleteOffer']);

Route::post('offer/archive',[OfferController::class,'archive']);
Route::post('offer/unarchive',[OfferController::class,'unarchive']);
Route::post('offer/nbrinterests',[OfferController::class,'nbrInterests']);

Route::post('offer/interest/accept',[OfferController::class,'acceptInterest']);

Route::post('offer/interest/reject',[OfferController::class,'rejectInterest']);

Route::post('offer/showinterest',[OfferController::class,'showinterest']);

Route::post('offer/interests',[OfferController::class,'interests']);

Route::post('offer/details',[OfferController::class,'offerDetails']);

Route::post('offer/pics',[OfferController::class,'pics']);

Route::get('offer/minprice',[OfferController::class,'minprice']);

Route::get('offer/maxprice',[OfferController::class,'maxprice']);



Route::post('client/delete',[ClientController::class,'delete']);

Route::post('client/profil/tovalidate',[ClientController::class,'profilToValidate']);
Route::post('client/profil/update',[ClientController::class,'updateProfil']);

Route::post('client/profil',[ClientController::class,'clientInfos']);








Route::post('client/offers',[ClientController::class,'clientOffers']);

Route::post('client/pocket',[ClientController::class,'pocket']);







Route::post('offer/pic',[OfferController::class,'pic']);



Route::get('myinterests',[InterestController::class,'myInterests']);

Route::post('interest/delete',[InterestController::class,'deleteInterest']);

Route::post('interest/showinfos',[InterestController::class,'showinfos']);


Route::get('home/offers',[OfferController::class,'homeOffers']);

Route::get('myoffers',[OfferController::class,'myOffers']);



Route::post('client/archive',[ClientController::class,'archive']);

Route::post('client/validate',[ClientController::class,'validateClient']);






Route::get('annonceurs',[ClientController::class,'annonceurs']);

Route::get('tovalidate',[ClientController::class,'toValidate']);








Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

