<?php

use App\Http\AppAPI\Controllers\Employer\Auth\APIEmployerUserLoginController;
use App\Http\AppAPI\Controllers\Employer\CRUD\APIEmployerUserStoreController;
use App\Http\AppAPI\Controllers\Employer\CRUD\APIEmployerUserIndexController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/employer', 'as' => 'api.employers.'], function () {

    /*************** AUTH ROUTES ****************/

    Route::group(['middleware' => ['guest']], function () {
        Route::post('/login', [APIEmployerUserLoginController::class, 'login'])->name('login');
        Route::post('/users', [APIEmployerUserStoreController::class, 'store'])->name('users.store');
    });
    Route::group(['middleware' => ['auth:sanctum', 'api.employer']], function () {
//        Route::post('/register', [APIEmployerUserRegisterController::class, 'register'])->name('register');
//        Route::delete('/logout', [APIEmployerUserLoginController::class, 'logout'])->name('logout');
    });

    /*************** ADMINS ROUTES ****************/

    Route::group(['middleware' => ['auth:sanctum', 'api.employer']], function () {

        // CRUD routes
        Route::get('/users', [APIEmployerUserIndexController::class, 'index'])->name('users.index');
//        Route::get('/users/{id}', [APIEmployerUserShowController::class, 'show'])->name('users.show');
//        Route::post('/users', [APIEmployerUserStoreController::class, 'store'])->name('users.store');
//        Route::patch('/users/{id}', [APIEmployerUserUpdateController::class, 'update'])->name('users.update');
//        Route::delete('/users/{id}', [APIEmployerUserDestroyController::class, 'destroy'])->name('users.destroy');

        // Relationships routes
//        Route::get('/users/{id}/tokens', [APIEmployerUserTokensRelatedController::class, 'index'])
//            ->name('user.tokens');
//        Route::get('/users/{id}/relationships/tokens', [APIEmployerUserTokensRelationshipsController::class, 'index'])
//            ->name('user.relationships.tokens');
    });


});
