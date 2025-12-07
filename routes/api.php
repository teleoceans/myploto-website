<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\FAQController;

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


// AUTHENTICATION
Route::post('login', [PassportController::class, 'login']);
Route::post('register', [PassportController::class, 'register']);
Route::post('/forgot-password', [PassportController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [PassportController::class, 'resetPassword']);


// SUBMIT A SERVICE
Route::get('/services', [ServicesController::class, 'index']);
Route::post('/selections', [ServicesController::class, 'selections']);

Route::group(['middleware' => 'auth:api', 'api', 'ValidateKey'], function(){
    Route::get('get-details', [PassportController::class, 'getDetails']);
    
    Route::get('/list/pets', [PagesController::class, 'listPets'])->name('pages.list_pets');
    Route::get('user/delete', [PassportController::class, 'deleteUser']);
    // TESTING API
    Route::get('/test', function() {
        return 'welcome home';
    });

    Route::get('/update/user/token', [ApiTokenController::class, 'update']);
    
    // Adding Pet To User
    Route::post('/pets/add', [ServicesController::class, 'addPet']);
    Route::get('/remove/pet/{id}', [ServicesController::class, 'removePet']);

    // FAQ API
    Route::get('/faq', [FAQController::class, 'index']);

    // SERVICES
    // Route::post('/services/store', [ServicesController::class, 'store']);
    Route::post('/services/payment', [ServicesController::class, 'payment']);

    
    // BOOKING
    Route::post('/services/book', [ServicesController::class, 'bookService']);
});

