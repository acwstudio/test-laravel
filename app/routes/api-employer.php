<?php

use App\Http\AppAPI\Controllers\Employer\APIEmployerCreateController;
use App\Http\AppAPI\Controllers\Employer\APIEmployerIndexController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/employers', 'as' => 'api.employers.'], function () {

    /*************** EMPLOYERS ROUTES ****************/

    Route::group(['middleware' => ['guest']], function () {
        Route::post('/register', [APIEmployerCreateController::class, 'register'])->name('register');
        Route::post('/login', [APIEmployerCreateController::class, 'login'])->name('login');
    });

    Route::group(['middleware' => ['auth:sanctum', 'api.employer']], function () {
        Route::get('/{id}', [APIEmployerIndexController::class, 'show'])->name('show');
        Route::patch('/{id}',[APIEmployerIndexController::class, 'update'])->name('update');
    });


});
