<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('register')-> group(function() {
    Route::get('/', function () {
    return view('register');
    });
    Route::post('submit', [UserController::class, 'register'])->name('user.create');
});

Route::prefix('registerCompany')-> group(function() {
    Route::get('/', function () {
        return view('registerCompany');
    });
    Route::post('submit', [CompanyController::class, 'registerCompany'])->name('company.create');
});

Route::prefix('registerOffer')-> group(function() {
    Route::get('/', function () {
        return view('registerOffer');
    });
    Route::post('submit', [OfferController::class, 'registerOffer'])->name('offer.create');
});
