<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ClientController;
// Public routes
Route::post('/register', [AuthController::class, 'register']);//register user
Route::post('/login', [AuthController::class, 'login']);//login
Route::post('/addAgency', [AgencyController::class, 'addAgency']);//add agency
Route::post('/addClient', [ClientController::class, 'addClient']);//add client
Route::get('/offers', [OffersController::class, 'index']); // all offers
// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    // User
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/userType/{user_email}', [AuthController::class, 'userType']); 
    //offers
    Route::post('/addOffer', [OffersController::class, 'addOffer']); //add offer
   
    Route::get('/agencyOffers/{offer_agency_name}', [OffersController::class, 'show']); // agency offers
    Route::get('/offerDetails/{id}', [OffersController::class, 'offerDetails']);  // offer details
    Route::get('/offerInfos/{x}', [OffersController::class, 'offerInfos']);  // offer details
    
    Route::delete('/destroyOffer/{id}', [OffersController::class, 'destroyOffer']); // destroy offer
    Route::put('/upOfferType/{id}', [OffersController::class, 'upOfferType']); // update offer type
    Route::put('/upOfferPrice/{id}', [OffersController::class, 'upOfferPrice']); // update offer price
    Route::put('/upOfferLocation/{id}', [OffersController::class, 'upOfferLocation']); // update offer location
    Route::put('/upPropertyType/{id}', [OffersController::class, 'upPropertyType']); // update property type
    Route::put('/upImg1/{id}', [OffersController::class, 'upImg1']); // update offer image1
    Route::put('/upImg2/{id}', [OffersController::class, 'upImg2']); // update offer image2
    Route::put('/upImg3/{id}', [OffersController::class, 'upImg3']); // update offer image3
    Route::put('/upImg4/{id}', [OffersController::class, 'upImg4']); // update offer image4
    //agency
    Route::get('/agencyName/{agency_email}', [AgencyController::class, 'show']);  // agency name
    Route::get('/agencyInfos/{agency_name}', [AgencyController::class, 'agencyInfos']);  // agency infos
    Route::put('/upAgencyName/{agency_email}', [AgencyController::class, 'upAgencyName']); // update agency name
    Route::put('/upAgencyLogo/{agency_email}', [AgencyController::class, 'upAgencyLogo']); // update agency logo
    Route::put('/upAgencyNum/{agency_email}', [AgencyController::class, 'upAgencyNum']); // update agency phone number
    //client
    Route::get('/clientInfos/{client_email}', [ClientController::class, 'clientInfos']);  // client infos
    Route::put('/upClient/{client_email}', [ClientController::class, 'updateClient']); // update client
    Route::put('/upClientName/{client_email}', [ClientController::class, 'upClientName']); // update client name
    Route::put('/upProfilePic/{Client_email}', [ClientController::class, 'upProfilePic']); // update profile picture
    // Comment
    Route::get('/offers/{id}/comments', [CommentController::class, 'index']); // all comments of a offer
    Route::post('/offers/{id}/comments', [CommentController::class, 'store']); // create comment on a offer
    Route::delete('/comments/{id}/{userEmail}', [CommentController::class, 'destroy']); // delete a comment
});