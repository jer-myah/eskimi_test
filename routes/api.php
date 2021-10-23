<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])
// ->where('any', '.*');

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])
    ->name('register');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/advertising-campaigns', [App\Http\Controllers\AdvertisingCampaignController::class, 'index'])
        ->name('dashboard');
    
    Route::post('/advertising-campaign/create', [App\Http\Controllers\AdvertisingCampaignController::class, 'store'])
        ->name('store-campaign');
    
    Route::get('/advertising-campaign/{id}', [App\Http\Controllers\AdvertisingCampaignController::class, 'show'])
        ->name('campaign.show');

    Route::put('/advertising-campaign/update/{id}', [App\Http\Controllers\AdvertisingCampaignController::class, 'update'])
        ->name('update-campaign');
    
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});

