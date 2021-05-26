<?php

use App\Http\AppAPI\Controllers\Admin\APIAdminIndexController;
use App\Http\AppAPI\Controllers\Admin\APIAdminRegisterController;
use App\Http\AppAPI\Controllers\Admin\APIAdminTokensRelatedController;
use App\Http\AppAPI\Controllers\Admin\APIAdminTokensRelationshipsController;
use App\Http\AppAPI\Controllers\Customer\APICustomerIndexController;
use App\Http\AppAPI\Controllers\Customer\APICustomerTokensRelatedController;
use App\Http\AppAPI\Controllers\Customer\APICustomerTokensRelationshipsController;
use App\Http\AppAPI\Controllers\Token\APITokenIndexController;
use App\Http\AppAPI\Controllers\Token\APITokensTokenableRelatedController;
use App\Http\AppAPI\Controllers\Customer\APICustomerRegisterController;
use App\Http\AppAPI\Controllers\Token\APITokensTokenableRelationshipsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('/admins/register', [APIAdminRegisterController::class, 'register'])->name('api.admin.register');
        Route::post('/customers/register', [APICustomerRegisterController::class, 'register'])->name('api.customer.register');
    });

    Route::middleware('auth:sanctum')->group(function () {

        /*****************  ADMINS ROUTES **************/
        Route::get('/admins', [APIAdminIndexController::class, 'index'])->name('api.admins.index');
        Route::get('/admins/{id}', [APIAdminIndexController::class, 'show'])->name('api.admins.show');
        // relations admin tokens
        Route::get('/admins/{id}/tokens', [
            APIAdminTokensRelatedController::class, 'index'
        ])->name('api.admins.tokens');
        Route::get('/admins/{id}/relationships/tokens', [
            APIAdminTokensRelationshipsController::class, 'index'
        ])->name('api.admins.relationships.tokens');

        /*****************  CUSTOMERS ROUTES **************/
        Route::get('/customers', [APICustomerIndexController::class, 'index'])->name('api.customers.index');
        Route::get('/customers/{id}', [APICustomerIndexController::class, 'show'])->name('api.customers.show');
        // relations customer tokens
        Route::get('/customers/{id}/tokens', [
            APICustomerTokensRelatedController::class, 'index'
        ])->name('api.customers.tokens');
        Route::get('/customers/{id}/relationships/tokens', [
            APICustomerTokensRelationshipsController::class, 'index'
        ])->name('api.customers.relationships.tokens');

        /*****************  TOKENS ROUTES **************/
        Route::get('/tokens', [APITokenIndexController::class, 'index'])->name('api.tokens.index');
        Route::get('/tokens/{id}', [APITokenIndexController::class, 'show'])->name('api.tokens.show');
        // relations tokens tokenable entities
        Route::get('/tokens/{id}/tokenables', [
            APITokensTokenableRelatedController::class, 'index'
        ])->name('api.tokens.tokenable');
        Route::get('/tokens/{id}/relationships/tokenables', [
            APITokensTokenableRelationshipsController::class, 'index'
        ])->name('api.tokens.relationships.tokenable');
    });
});
