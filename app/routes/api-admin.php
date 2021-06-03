<?php

use App\Http\AppAPI\Controllers\Admin\Auth\APIAdminUserRegisterController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserDestroyController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserShowController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserStoreController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserIndexController;
use App\Http\AppAPI\Controllers\Admin\Auth\APIAdminUserLoginController;
use App\Http\AppAPI\Controllers\Admin\Relationships\APIAdminUserTokensRelatedController;
use App\Http\AppAPI\Controllers\Admin\Relationships\APIAdminUserTokensRelationshipsController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserUpdateController;
use App\Http\AppAPI\Controllers\Token\APITokenIndexController;
use App\Http\AppAPI\Controllers\Token\APITokensTokenableRelatedController;
use App\Http\AppAPI\Controllers\Token\APITokensTokenableRelationshipsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/admin', 'as' => 'api.admins.'], function () {

    /*************** AUTH ROUTES ****************/

    Route::group(['middleware' => ['guest']], function () {
        Route::post('/login', [APIAdminUserLoginController::class, 'login'])->name('login');
    });
    Route::group(['middleware' => ['auth:sanctum', 'api.admin']], function () {
        Route::post('/register', [APIAdminUserRegisterController::class, 'register'])->name('register');
        Route::delete('/logout', [APIAdminUserLoginController::class, 'logout'])->name('logout');
    });

    /*************** ADMINS ROUTES ****************/

    Route::group(['middleware' => ['auth:sanctum', 'api.admin']], function () {

        // CRUD routes
        Route::get('/users', [APIAdminUserIndexController::class, 'index'])->name('users.index');
        Route::get('/users/{id}', [APIAdminUserShowController::class, 'show'])->name('users.show');
        Route::post('/users', [APIAdminUserStoreController::class, 'store'])->name('users.store');
        Route::patch('/users/{id}', [APIAdminUserUpdateController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [APIAdminUserDestroyController::class, 'destroy'])->name('users.destroy');

        // Relationships routes
        Route::get('/users/{id}/tokens', [APIAdminUserTokensRelatedController::class, 'index'])
            ->name('user.tokens');
        Route::get('/users/{id}/relationships/tokens', [APIAdminUserTokensRelationshipsController::class, 'index'])
            ->name('user.relationships.tokens');
    });

    /*****************  TOKENS ROUTES **************/

    Route::group(['middleware' => ['auth:sanctum', 'api.admin']], function () {

        // CRUD routes
        Route::get('/tokens', [APITokenIndexController::class, 'index'])->name('tokens.index');
        Route::get('/tokens/{id}', [APITokenIndexController::class, 'show'])->name('tokens.show');

        // Relationships routes
        Route::get('/tokens/{id}/tokenables', [APITokensTokenableRelatedController::class, 'index'])
            ->name('tokens.tokenable');
        Route::get('/tokens/{id}/relationships/tokenables', [APITokensTokenableRelationshipsController::class, 'index'])
            ->name('tokens.relationships.tokenable');
    });

});
