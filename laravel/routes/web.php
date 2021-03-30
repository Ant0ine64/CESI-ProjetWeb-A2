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
use App\Http\Controllers\SearchController;

// ===== STANDARD ROUTES =====

// PROFILE PAGE
Route::get('profile', function () {
    return view('profile');
})->name('profile');

// FOOTER : Legal mentions
Route::get('legal', function(){return view('legal');})->name('Legal');

// FOOTER : About
Route::get('about', function(){return view('about');})->name('About');


// ===== ROOT REDIRECTION =====
Route::get('/', function () {
    if(!PermissionController::isLogged())
        return view('login');
    else
        return view('home');
})->name('Login');


// ===== HOME =====
Route::get('home', [WishListController::class, 'getEveryoneList'])->name('Home')->middleware('auth');


// ===== LOGIN =====

// login
Route::get('login', function () {return view('login');})->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('user.login');

// logout
Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');


// ASK ACCOUNT
Route::get('ask_account', function () {
    return view('ask_account');
})->name('Ask');


// ===== USER =====

// search users
Route::get('users', [SearchController::class, 'readAllU'])->name('Users')->middleware('auth');
Route::post('users', [SearchController::class, 'readAllU'])->name('user.filter');

Route::prefix('user')-> group(function() {
    Route::prefix('update')-> group(function() {
        Route::get('/', [UserController::class, 'preCompleteUpdateForm']);
        Route::post('submit', [UserController::class, 'updateByLogin'])->name('user.update');
    });

    Route::prefix('delete')-> group(function() {
        Route::get('/{id}', function ($id) {
            return view('user.delete', ['userId' => $id]);
        });
        Route::post('submit', [UserController::class, 'deleteUserById'])->name('user.delete');
    });
});

// Add USER (register user)
Route::prefix('register')-> group(function() {
    Route::get('/', function () {return view('register');})->name('Register');
    Route::post('submit', [UserController::class, 'register'])->name('user.create');
});


// ===== COMPANY =====

Route::prefix('companies')-> group(function() {
    // search tables
    Route::get('/', [SearchController::class, 'readAllC'])->name('Companies')->middleware('auth');
    Route::post('/', [SearchController::class, 'readAllC'])->name('comp.filter');

    // register forms
    Route::prefix('register')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('company.register','company.create'));
        });
        Route::post('submit', [CompanyController::class, 'registerCompany'])->name('company.create');
    });

    // update forms
    Route::prefix('update')-> group(function() {
        Route::get('/{id}', function ($id) {
            return CompanyController::preCompleteUpdateForm($id);
        })->name('company.getUpdate');
        Route::post('submit', [CompanyController::class, 'updateCompany'])->name('company.update');
    });
});


// ===== OFFER ====

// search tables
Route::get('offers', [SearchController::class, 'readAllO'])->name('Offers')->middleware('auth');
Route::post('offers', [SearchController::class, 'readAllO'])->name('offer.filter');

Route::prefix('offer')-> group(function() {
    Route::prefix('register')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('offer.register','offer.create'));
        })->name('offer.getCreate');
        Route::post('submit', [OfferController::class, 'registerOffer'])->name('offer.create');
    });

    Route::prefix('update')-> group(function() {
        Route::get('/{id}', function ($id) {
            return OfferController::tryGettingOffer($id);
        })->name('offer.getUpdate');
        Route::post('submit', [OfferController::class, 'updateOffer'])->name('offer.update');
    });

    Route::prefix('delete')-> group(function() {
        Route::get('/{id}', function ($id) {
            return view('offer.delete', ['offerId' => $id]);
            //return (PermissionController::tryGettingToView('offer.delete','offer.delete'));
        });
        Route::post('submit', [OfferController::class, 'deleteOfferById'])->name('offer.delete');
   });
});


// ===== WISHLIST =====

Route::prefix('wishlist')-> group(function() {
    Route::prefix('add')-> group(function() {
        Route::get('/{id}', function ($id){
            return view('wishlist.add', ['offerId' => $id]);
            //r//eturn (PermissionController::tryGettingToView('wishlist.add','wishlist.add'));
        });
        Route::post('submit', [WishListController::class, 'addToWishList'])->name('wishlist.add');
    });
    Route::prefix('remove')-> group(function() {
        Route::get('/{id}', function ($id){
            return view('wishlist.remove', ['offerId' => $id]);
            //r//eturn (PermissionController::tryGettingToView('wishlist.add','wishlist.add'));
        });
        Route::post('submit', [WishListController::class, 'removeFromWishList'])->name('wishlist.remove');
    });
    Route::prefix('update')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('wishlist.update','')); //todo: this permission doesnt exist
        });
        Route::post('submit', [WishListController::class, 'updateWishListState'])->name('wishlist.update');
    });
});


// ===== NOTATION =====

Route::prefix('notation')-> group(function() { //add
    Route::get('/', function () {
        return (PermissionController::tryGettingToView('notationAdd','auth'));
    });
    Route::post('submit', [NotationController::class, 'addNotation'])->name('notation.add'); //todo: this permission doesnt exist
});


// ===== PROMOTION & USERPROMOTION =====

Route::prefix('promotion')-> group(function() {
    Route::prefix('add')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('promotion.add','auth'));//todo: this permission doesnt exist
        });
        Route::post('submit', [PromotionController::class, 'addPromotion'])->name('promotion.add');
    });

    Route::prefix('add_user')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('promotion.add_user','auth'));//todo: this permission doesnt exist
        });
        Route::post('submit', [PromotionController::class, 'addUserInPromotion'])->name('userPromotion.add');
    });
});


// ===== DELEGATE =====

Route::prefix('delegate')-> group(function() {
    Route::get('/', [PermissionController::class, 'readDelegatePermissions'])->name('delegate.read');

    Route::post('update', [PermissionController::class, 'updateDelegatePermissions'])->name('delegate.update');
});



