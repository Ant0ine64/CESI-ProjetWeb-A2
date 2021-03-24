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
    return view('login');
})->name('Login');

Route::get('login', function () {
    return view('login');
})->name('Login');

Route::get('ask_account', function () {
    return view('ask_account');
})->name('Ask');

Route::any('search', function () {
    return view('search');
})->name('Search');

Route::any('gestion', function(){
    return view('gestion');
})->name('Gestion');

Route::get('register', function(){
    return view('register');
})->name('Register');

Route::get('home', function()
{
    return view('home');
})->name('Home');

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
