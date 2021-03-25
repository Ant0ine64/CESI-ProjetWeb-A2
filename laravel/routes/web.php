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

// root
Route::get('/', function () {
    if(!PermissionController::isLogged())
        return view('login');
    else
        return view('home');
})->name('Login');

// login
Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [LoginController::class, 'authenticate'])->name('user.login');
Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');

// ask account
Route::get('ask_account', function () {
    return view('ask_account');
})->name('Ask');

// START SEARCH
Route::any('search', function () {
    return view('search');
})->name('Search')->middleware('auth');

Route::post('search', [SearchController::class, 'readAll'])->name('search.filter');
//END SEARCH

// START GESTION
Route::any('gestion', function () {
    return view('gestion');
})->name('Gestion')->middleware('auth');

Route::post('gestion', [SearchController::class, 'readAllG'])->name('gestion.filter');
//END GESTION

// Profile page
Route::get('profile', function () {
    return view('profile');
})->name('profile');

Route::get('register', function(){
    return view('register');
})->name('Register');

Route::get('home', function()
{
    return view('home');
})->name('Home')->middleware('auth');

//register
Route::prefix('register')-> group(function() {
    Route::get('/', function () {
    return view('register');
    });
    Route::post('submit', [UserController::class, 'register'])->name('user.create');
});

// ===== USER =====

Route::prefix('user')-> group(function() {
    Route::prefix('update')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('user.update','auth'));
        });
        Route::post('submit', [UserController::class, 'updateByLogin'])->name('user.update');
    });

});

// ===== COMPANY =====

Route::prefix('company')-> group(function() {
    Route::prefix('register')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('company.register','company.create'));
        });
        Route::post('submit', [CompanyController::class, 'registerCompany'])->name('company.create');
    });

    Route::prefix('update')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('company.update','company.update'));
        });
        Route::post('submit', [CompanyController::class, 'updateCompany'])->name('company.update');
    });
});


// ===== OFFER ====

Route::prefix('offer')-> group(function() {
    Route::prefix('register')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('offer.register','offer.create'));
        });
        Route::post('submit', [OfferController::class, 'registerOffer'])->name('offer.create');
    });

    Route::prefix('update')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('offer.update','offer.update'));
        });
        Route::post('submit', [OfferController::class, 'updateOffer'])->name('offer.update');
    });

    Route::prefix('delete')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('offer.delete','offer.delete'));
        });
        Route::post('submit', [OfferController::class, 'deleteOfferById'])->name('offer.delete');
   });
});


// ===== WISHLIST =====

Route::prefix('wishlist')-> group(function() {
    Route::prefix('add')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('wishlist.add','wishlist.add'));
        });
        Route::post('submit', [WishListController::class, 'addToWishList'])->name('wishlist.add');
    });
    Route::prefix('remove')-> group(function() {
        Route::get('/', function () {
            return (PermissionController::tryGettingToView('wishlist.remove','wishlist.remove'));
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

Route::prefix('notationAdd')-> group(function() {
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



