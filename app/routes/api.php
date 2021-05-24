<?php

use App\Http\AppAPI\Controllers\Admin\APIAdminIndexController;
use App\Http\AppAPI\Controllers\Admin\APIAdminRegisterController;
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
        Route::post('/admin/register', [APIAdminRegisterController::class, 'register'])->name('api.admin.register');
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/admin', [APIAdminIndexController::class, 'index'])->name('api.admins.index');
    });
});
