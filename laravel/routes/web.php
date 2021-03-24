<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\WishListController;
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

// LOGIN
Route::get('login', function () {
    return view('login');
});
Route::post('login', [LoginController::class, 'authenticate'])->name('user.login');
Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
// END LOGIN


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

Route::prefix('updateCompany')-> group(function() {
    Route::get('/', function () {
        return view('updateCompany');
    });
    Route::post('submit', [CompanyController::class, 'updateCompany'])->name('company.update');
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
    Route::post('submit', [OfferController::class, 'updateOffer'])->name('offer.update');
});
Route::prefix('deleteOffer')-> group(function() {
    Route::get('/', function () {
        return view('deleteOffer');
    });
    Route::post('submit', [OfferController::class, 'deleteOfferById'])->name('offer.delete');
});
//endregion Offer
//region WishList
Route::prefix('wishListAdd')-> group(function() {
    Route::get('/', function () {
        return view('wishListAdd');
    });
    Route::post('submit', [WishListController::class, 'addToWishList'])->name('wishlist.add');
});
Route::prefix('wishListRemove')-> group(function() {
    Route::get('/', function () {
        return view('wishListRemove');
    });
    Route::post('submit', [WishListController::class, 'removeFromWishList'])->name('wishlist.remove');
});
Route::prefix('wishListUpdate')-> group(function() {
    Route::get('/', function () {
        return view('wishListUpdate');
    });
    Route::post('submit', [WishListController::class, 'updateWishListState'])->name('wishlist.update');
});
//endregion WishList
//region Notation
Route::prefix('notationAdd')-> group(function() {
    Route::get('/', function () {
        return view('notationAdd');
    });
    Route::post('submit', [NotationController::class, 'addNotation'])->name('notation.add');
});
//endregion Notation
//region Promotion & UserPromotion
Route::prefix('promotionAdd')-> group(function() {
    Route::get('/', function () {
        return view('promotionAdd');
    });
    Route::post('submit', [PromotionController::class, 'addPromotion'])->name('promotion.add');
});
Route::prefix('userPromotionAdd')-> group(function() {
    Route::get('/', function () {
        return view('userPromotionAdd');
    });
    Route::post('submit', [PromotionController::class, 'addUserInPromotion'])->name('userPromotion.add');
});
//endregion Promotion & UserPromotion

