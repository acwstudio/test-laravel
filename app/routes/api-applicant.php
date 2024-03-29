<?php

use App\Http\AppAPI\Controllers\Applicant\Auth\APIApplicantUserLoginController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserDestroyController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserIndexController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserShowController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserStoreController;
use App\Http\AppAPI\Controllers\Employer\Auth\APIEmployerUserLogoutController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/applicant', 'as' => 'api.applicants.'], function () {

    /*************** AUTH APPLICANT ROUTES ****************/

    Route::group(['middleware' => ['guest']], function () {
        Route::post('/login', [APIApplicantUserLoginController::class, 'login'])->name('login');
    });
    Route::group(['middleware' => ['auth:sanctum', 'api.applicant']], function () {
        Route::post('/logout', [APIEmployerUserLogoutController::class, 'logout'])->name('logout');
    });

    /*************** EMPLOYER ROUTES ****************/

    Route::group(['middleware' => ['auth:sanctum', 'api.applicant']], function () {

        // CRUD routes
        Route::get('/applicants', [APIApplicantUserIndexController::class, 'index'])->name('users.index');
        Route::get('/users/{id}', [APIApplicantUserShowController::class, 'show'])->name('users.show');
//        Route::patch('/users/{id}', [APIApplicantUserUpdateController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [APIApplicantUserDestroyController::class, 'destroy'])->name('users.destroy');

        // Relationships routes
//        Route::get('/users/{id}/tokens', [APIEmployerUserTokensRelatedController::class, 'index'])
//            ->name('user.tokens');
//        Route::get('/users/{id}/relationships/tokens', [APIEmployerUserTokensRelationshipsController::class, 'index'])
//            ->name('user.relationships.tokens');
    });

    Route::group(['middleware' => ['auth:sanctum', 'api.admin']], function () {
        Route::post('/users', [APIApplicantUserStoreController::class, 'store'])->name('users.store');
    });

});
