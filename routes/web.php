<?php

use App\Http\Controllers\LogoutController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/landscapes', [\App\Http\Controllers\galleryPageController::class, 'index']);
Route::get('/galleries', function () {return view('galleries');});
Route::get('/photo/{brockphotography_photos}', [\App\Http\Controllers\PhotoController::class, 'show'])->name('photo.show');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::get('empty', function (){
    Cart::destroy();
});
Route::resource('/photos', \App\Http\Controllers\PhotoResourceController::class);
Route::post("/logout",[LogoutController::class,"store"])->name("logout");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
