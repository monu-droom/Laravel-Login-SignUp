<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WaterReportController;

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

Route::get('/', [RegisterController::class, 'index'])->name('index');
Route::get('/dashboard', [RegisterController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');
Route::post('/user_login', [RegisterController::class, 'postLogin'])->name('login.user');
Route::get('/register', [RegisterController::class, 'getRegister'])->name('register');
Route::post('/register_user', [RegisterController::class, 'postRegisterUser'])->name('register.user');
//API data route
Route::get('/api_data', [RegisterController::class, 'getApiData'])->name('get_api');
Route::get('/api_data/{id}', [RegisterController::class, 'getApiData'])->name('get_api_by_id');
//Water Report Routes
Route::get('/getWaterReport', [WaterReportController::class, 'getWaterReport'])->name('water.report');
Route::post('/waterReport', [WaterReportController::class, 'postWaterReport'])->name('waterReport.submit');
Route::post('/sendMail', [WaterReportController::class, 'mailReport'])->name('mail.report');
Route::get('/mail-success', [WaterReportController::class, 'mailSuccess'])->name('mail-success');

