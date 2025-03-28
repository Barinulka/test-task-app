<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegistrationController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderTypeController;
use App\Http\Controllers\Api\PartnershipController;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\ScopeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/order-types/list', [OrderTypeController::class, 'getList']);
    Route::get('/partnership/list', [PartnershipController::class, 'getList']);
    Route::get('/users/list', [UserController::class, 'getList']);
    Route::get('/worker/list', [WorkerController::class, 'getList']);

    Route::post('/order/create', [OrderController::class, 'createOrder']);
    Route::post('/order/assign-worker', [OrderController::class, 'assignWorkerToOrder']);
    Route::post('/worker/filter', [WorkerController::class, 'getWorkerByOrderTypeIds']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'session'], function () {
    Route::get('/active', [SessionController::class, 'activeSession']);
    Route::delete('/revoke/{tokenId}', [SessionController::class, 'revokeSession']);
});

Route::group(['as' => 'passport.','prefix' => 'passport'], function () {
        Route::post('/token', [AccessTokenController::class, 'issueToken']);
        Route::post('/token/refresh', [AccessTokenController::class, 'refreshToken']);
    }
);

Route::group(['prefix' => 'passport','namespace' => '\Laravel\Passport\Http\Controllers','middleware' => 'auth:api',],
    function () {
        Route::get('/tokens', [AuthorizedAccessTokenController::class, 'tokens']);
        Route::delete('/tokens/{token_id}', [AuthorizedAccessTokenController::class, 'revokeToken']);

        Route::get('/clients', [ClientController::class, 'forUser']);
        Route::post('/clients', [ClientController::class, 'store']);
        Route::put('/clients/{client_id}', [ClientController::class, 'update']);
        Route::delete('/clients/{client_id}', [ClientController::class, 'destroy']);

        Route::get('/scopes', [ScopeController::class, 'index']);

        Route::get('/personal-access-tokens', [PersonalAccessTokenController::class, 'tokens']);
        Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'createToken']);
        Route::delete('/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, 'revokeToken']);
    }
);


