<?php

use App\Http\AppAPI\Controllers\Admin\Auth\APIAdminUserLogoutController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserDestroyController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserShowController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserStoreController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserIndexController;
use App\Http\AppAPI\Controllers\Admin\Auth\APIAdminUserLoginController;
use App\Http\AppAPI\Controllers\Admin\Relationships\APIAdminUserTokensRelatedController;
use App\Http\AppAPI\Controllers\Admin\Relationships\APIAdminUserTokensRelationshipsController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserUpdateController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserDestroyController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserIndexController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserShowController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserStoreController;
use App\Http\AppAPI\Controllers\Applicant\CRUD\APIApplicantUserUpdateController;
use App\Http\AppAPI\Controllers\Applicant\Relationships\APIApplicantUserTokensRelatedController;
use App\Http\AppAPI\Controllers\Applicant\Relationships\APIApplicantUserTokensRelationshipsController;
use App\Http\AppAPI\Controllers\Employer\CRUD\APIEmployerUserDestroyController;
use App\Http\AppAPI\Controllers\Employer\CRUD\APIEmployerUserIndexController;
use App\Http\AppAPI\Controllers\Employer\CRUD\APIEmployerUserShowController;
use App\Http\AppAPI\Controllers\Employer\CRUD\APIEmployerUserStoreController;
use App\Http\AppAPI\Controllers\Employer\CRUD\APIEmployerUserUpdateController;
use App\Http\AppAPI\Controllers\Employer\Relationships\APIEmployerUserTokensRelatedController;
use App\Http\AppAPI\Controllers\Employer\Relationships\APIEmployerUserTokensRelationshipsController;
use App\Http\AppAPI\Controllers\Token\APITokenIndexController;
use App\Http\AppAPI\Controllers\Token\APITokensTokenableRelatedController;
use App\Http\AppAPI\Controllers\Token\APITokensTokenableRelationshipsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/admin', 'as' => 'api.admins.'], function () {

    /*************** AUTH ADMIN ROUTES ****************/

    Route::group(['middleware' => ['guest']], function () {
        Route::post('/login', [APIAdminUserLoginController::class, 'login'])->name('login');
    });
    Route::group(['middleware' => ['auth:sanctum', 'api.admin']], function () {
        Route::post('/logout', [APIAdminUserLogoutController::class, 'logout'])->name('logout');
    });

    /*************** OTHERS ROUTES ****************/

    Route::group(['middleware' => ['auth:sanctum', 'api.admin']], function () {

        /*************** ADMINS USERS ROUTES ****************/

        // CRUD routes
        Route::get('/admins', [APIAdminUserIndexController::class, 'index'])->name('admins.index');
        Route::get('/admins/{id}', [APIAdminUserShowController::class, 'show'])->name('admins.show');
        Route::post('/admins', [APIAdminUserStoreController::class, 'store'])->name('admins.store');
        Route::patch('/admins/{id}', [APIAdminUserUpdateController::class, 'update'])->name('admins.update');
        Route::delete('/admins/{id}', [APIAdminUserDestroyController::class, 'destroy'])->name('admins.destroy');

        // Relationships routes
        Route::get('/admins/{id}/tokens', [APIAdminUserTokensRelatedController::class, 'index'])
            ->name('admin.tokens');
        Route::get('/admins/{id}/relationships/tokens', [APIAdminUserTokensRelationshipsController::class, 'index'])
            ->name('admin.relationships.tokens');

        /*************** EMPLOYERS USERS ROUTES ****************/

        // CRUD routes
        Route::get('/employers', [APIEmployerUserIndexController::class, 'index'])->name('employers.index');
        Route::get('/employers/{id}', [APIEmployerUserShowController::class, 'show'])->name('employers.show');
        Route::post('/employers', [APIEmployerUserStoreController::class, 'store'])->name('employers.store');
        Route::patch('/employers/{id}', [APIEmployerUserUpdateController::class, 'update'])->name('employers.update');
        Route::delete('/employers/{id}', [APIEmployerUserDestroyController::class, 'destroy'])->name('employers.destroy');

        // Relationships employer to tokens routes
        Route::get('/employers/{id}/tokens', [APIEmployerUserTokensRelatedController::class, 'index'])
            ->name('employer.tokens');
        Route::get('/employers/{id}/relationships/tokens', [APIEmployerUserTokensRelationshipsController::class, 'index'])
            ->name('employer.relationships.tokens');

        /*************** APPLICANTS USERS ROUTES ****************/

        // CRUD routes
        Route::get('/applicants', [APIApplicantUserIndexController::class, 'index'])->name('applicants.index');
        Route::get('/applicants/{id}', [APIApplicantUserShowController::class, 'show'])->name('applicants.show');
        Route::post('/applicants', [APIApplicantUserStoreController::class, 'store'])->name('applicants.store');
        Route::patch('/applicants/{id}', [APIApplicantUserUpdateController::class, 'update'])->name('applicants.update');
        Route::delete('/applicants/{id}', [APIApplicantUserDestroyController::class, 'destroy'])->name('applicants.destroy');

        // Relationships applicant to tokens routes
        Route::get('/applicants/{id}/tokens', [APIApplicantUserTokensRelatedController::class, 'index'])
            ->name('applicant.tokens');
        Route::get('/applicants/{id}/relationships/tokens', [APIApplicantUserTokensRelationshipsController::class, 'index'])
            ->name('applicant.relationships.tokens');
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
