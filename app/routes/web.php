<?php

use App\Http\AppAPI\Controllers\Admin\Auth\APIAdminUserLoginController;
use App\Http\AppAPI\Controllers\Admin\Auth\APIAdminUserRegisterController;
use App\Http\AppAPI\Controllers\Admin\CRUD\APIAdminUserIndexController;
use App\Http\AppReg\Controllers\Admin\RegAdminLoginController;
use App\Http\AppReg\Controllers\Admin\RegAdminRegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/admin/register', [RegAdminRegisterController::class, 'showRegistrationForm'])->name('admin.register.show');
//Route::post('/admin/register', [RegAdminRegisterController::class, 'register'])->name('admin.register.create');
//
//Route::get('/admin', [APIAdminUserIndexController::class, 'index'])->name('admin.index');

//Route::get('/admin/login', [RegAdminLoginController::class, 'showLoginForm'])->name('admin.login.show');
//Route::get('/admin/login', [APIAdminUserLoginController::class, 'login'])->name('admin.login');
