<?php

use App\Http\AppAPI\Controllers\Customer\APICustomerIndexController;
use App\Http\AppAPI\Controllers\Customer\APICustomerLoginController;
use App\Http\AppAPI\Controllers\Customer\APICustomerRegisterController;
use App\Http\AppAPI\Controllers\Customer\APICustomerTokensRelatedController;
use App\Http\AppAPI\Controllers\Customer\APICustomerTokensRelationshipsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::middleware('guest')->group(function () {

//        Route::post('/admins/register', [APIAdminUserRegisterController::class, 'register'])->name('api.admin.register');
//        Route::post('/admins/login', [APIAdminUserLoginController::class, 'login'])->name('api.admin.login');

        Route::post('/customers/register', [APICustomerRegisterController::class, 'register'])->name('api.customer.register');
        Route::post('/customers/login', [APICustomerLoginController::class, 'login'])->name('api.customer.login');
    });

    Route::middleware(['auth:sanctum'])->group(function () {

        /*****************  ADMINS ROUTES **************/
//        Route::middleware(['api.admin'])->group(function () {
//            Route::get('/admins', [APIAdminUserIndexController::class, 'index'])->name('api.admins.index');
//            Route::get('/admins/{id}', [APIAdminUserIndexController::class, 'show'])->name('api.admins.show');
//            Route::post('/admins/logout', [APIAdminUserLoginController::class, 'logout'])->name('api.admins.logout');
//            // relations admin tokens
//            Route::get('/admins/{id}/tokens', [APIAdminUserTokensRelatedController::class, 'index'])
//                ->name('api.admins.tokens');
//            Route::get('/admins/{id}/relationships/tokens', [APIAdminUserTokensRelationshipsController::class, 'index'])
//                ->name('api.admins.relationships.tokens');
//        });

        /*****************  CUSTOMERS ROUTES **************/
        Route::middleware(['api.customer'])->group(function () {
            Route::get('/customers', [APICustomerIndexController::class, 'index'])->name('api.customers.index');
            Route::get('/customers/{id}', [APICustomerIndexController::class, 'show'])->name('api.customers.show');
//            Route::post('/customers/logout', [APICustomerLoginController::class, 'logout'])->name('api.customers.logout');
            // relations customer tokens
            Route::get('/customers/{id}/tokens', [
                APICustomerTokensRelatedController::class, 'index'
            ])->name('api.customers.tokens');
            Route::get('/customers/{id}/relationships/tokens', [
                APICustomerTokensRelationshipsController::class, 'index'
            ])->name('api.customers.relationships.tokens');
        });

        /*****************  TOKENS ROUTES **************/
//        Route::middleware(['api.admin'])->group(function () {
//            Route::get('/tokens', [APITokenIndexController::class, 'index'])->name('api.tokens.index');
//            Route::get('/tokens/{id}', [APITokenIndexController::class, 'show'])->name('api.tokens.show');
//            // relations tokens tokenable entities
//            Route::get('/tokens/{id}/tokenables', [
//                APITokensTokenableRelatedController::class, 'index'
//            ])->name('api.tokens.tokenable');
//            Route::get('/tokens/{id}/relationships/tokenables', [
//                APITokensTokenableRelationshipsController::class, 'index'
//            ])->name('api.tokens.relationships.tokenable');
//        });
    });
});
