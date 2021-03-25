<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\PermissionController;

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
    return (PermissionController::tryGettingToView('search','company.search'));
})->name('Search');

Route::any('gestion', function(){
    return (PermissionController::tryGettingToView('gestion','')); //todo: gestion perm name ?
})->name('Gestion');

Route::get('home', function()
{
    return (PermissionController::tryGettingToView('home','auth'));
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
        return (PermissionController::tryGettingToView('registerCompany','company.create'));
    });
    Route::post('submit', [CompanyController::class, 'registerCompany'])->name('company.create');
});

Route::prefix('updateCompany')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('updateCompany','company.update'));
    });
    Route::post('submit', [CompanyController::class, 'updateCompany'])->name('company.update');
});
//endregion Company
//region Offer
Route::prefix('registerOffer')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('registerOffer','offer.create'));
    });
    Route::post('submit', [OfferController::class, 'registerOffer'])->name('offer.create');
});
Route::prefix('updateOffer')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('updateOffer','offer.update'));
    });
    Route::post('submit', [OfferController::class, 'updateOffer'])->name('offer.update');
});
Route::prefix('deleteOffer')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('deleteOffer','offer.delete'));
    });
    Route::post('submit', [OfferController::class, 'deleteOfferById'])->name('offer.delete');
});
//endregion Offer
//region WishList
Route::prefix('wishListAdd')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('wishListAdd','wishlist.add'));
    });
    Route::post('submit', [WishListController::class, 'addToWishList'])->name('wishlist.add');
});
Route::prefix('wishListRemove')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('wishListRemove','wishlist.remove'));
    });
    Route::post('submit', [WishListController::class, 'removeFromWishList'])->name('wishlist.remove');
});
Route::prefix('wishListUpdate')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('wishListUpdate','')); //todo: this permission doesnt exist
    });
    Route::post('submit', [WishListController::class, 'updateWishListState'])->name('wishlist.update');
});
//endregion WishList
//region Notation
Route::prefix('notationAdd')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('notationAdd','auth'));
    });
    Route::post('submit', [NotationController::class, 'addNotation'])->name('notation.add'); //todo: this permission doesnt exist
});
//endregion Notation
//region Promotion & UserPromotion
Route::prefix('promotionAdd')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('promotionAdd','auth'));//todo: this permission doesnt exist
    });
    Route::post('submit', [PromotionController::class, 'addPromotion'])->name('promotion.add');

});
Route::prefix('userPromotionAdd')-> group(function() {
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('userPromotionAdd','auth'));//todo: this permission doesnt exist
    });
    Route::post('submit', [PromotionController::class, 'addUserInPromotion'])->name('userPromotion.add');
});
//endregion Promotion & UserPromotion

Route::prefix('delegate')-> group(function() {
    //read delegate
    /*Route::get('/', function () {
        return view('delegateRead');
    });*/
    Route::get('/', [PermissionController::class, 'readDelegatePermissions'])->name('delegate.read');

    //update delegate
        Route::post('update', [PermissionController::class, 'updateDelegatePermissions'])->name('delegate.update');
});

