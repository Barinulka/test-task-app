<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegistrationController;
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
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')
    ->name('logout');

Route::group(
    [
        'as' => 'passport.',
        'prefix' => 'passport'
    ],
    function () {
        Route::post('/token', [AccessTokenController::class, 'issueToken']);
        Route::post('/token/refresh', [AccessTokenController::class, 'refreshToken']);
    }
);

Route::group(
    [
        'prefix' => 'passport',
        'namespace' => '\Laravel\Passport\Http\Controllers',
        'middleware' => 'auth:api',
    ],
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


