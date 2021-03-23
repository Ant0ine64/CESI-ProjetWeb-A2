<?php

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
    Route::post('submit', [UserController::class, 'register'])->name('submit');
});
