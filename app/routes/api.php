<?php

use App\Http\AppAPI\Controllers\Admin\APIAdminIndexController;
use App\Http\AppAPI\Controllers\Admin\APIAdminRegisterController;
use App\Http\AppAPI\Controllers\Admin\APIAdminTokensRelatedController;
use App\Http\AppAPI\Controllers\Admin\APIAdminTokensRelationshipsController;
use App\Http\AppAPI\Controllers\Token\APITokenIndexController;
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
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/admins', [APIAdminIndexController::class, 'index'])->name('api.admins.index');
        Route::get('/admins/{id}', [APIAdminIndexController::class, 'show'])->name('api.admins.show');
        Route::get('/admins/{id}/tokens', [APIAdminTokensRelatedController::class, 'index'])->name('api.admin.tokens');
        Route::get('/admins/{id}/relationships/tokens', [
            APIAdminTokensRelationshipsController::class, 'index'
        ])->name('api.admin.relationships.tokens');

        Route::get('/tokens', [APITokenIndexController::class, 'index'])->name('api.tokens.index');
    });
});
