<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
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
    return view('login');
});

// LOGIN
Route::get('login', function () {
    return view('login');
});
Route::post('login', [LoginController::class, 'authenticate'])->name('user.login');
Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
// END LOGIN

Route::get('ask_account', function () {
    return view('ask_account');
});

Route::get('search', function()
{
    return view('search');
});

Route::get('register', function(){
    return view('register');
});

Route::get('home', function()
{
    return view('home');
});

Route::prefix('register')-> group(function() {
    Route::get('/', function () {
    return view('register');
    });
    Route::post('submit', [UserController::class, 'register'])->name('user.create');
});
//region Company
Route::prefix('registerCompany')-> group(function() {
    Route::get('/', function () {
        return view('registerCompany');
    });
    Route::post('submit', [CompanyController::class, 'registerCompany'])->name('company.create');
});
//endregion Company
//region Offer
Route::prefix('registerOffer')-> group(function() {
    Route::get('/', function () {
        return view('registerOffer');
    });
    Route::post('submit', [OfferController::class, 'registerOffer'])->name('offer.create');
});
Route::prefix('updateOffer')-> group(function() {
    Route::get('/', function () {
        return view('updateOffer');
    });
    Route::post('submit', [OfferController::class, 'updateOffer'])->name('submit'); //todo: fix cette route de merde qui redirige vers deleteOfferById lors du submit
});
Route::prefix('deleteOffer')-> group(function() {
    Route::get('/', function () {
        return view('deleteOffer');
    });
    Route::post('submit', [OfferController::class, 'deleteOfferById'])->name('submit');
});
//endregion Offer
