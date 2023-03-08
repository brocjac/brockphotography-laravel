<?php

use App\Http\Controllers\CartController;
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
Route::get('/contact', function () {return view('contact');});
Route::get('/photo/{brockphotography_photos}', [\App\Http\Controllers\PhotoController::class, 'show'])->name('photo.show');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::post('/cart', '\App\Http\Controllers\PhotoResourceController@cartAdd')->name('cart.store');
Route::get('/cart', '\App\Http\Controllers\PhotoResourceController@cart')->name('cart.store');
Route::get('/cart/{id}', '\App\Http\Controllers\CartController@destroy');
Route::get('empty', function (){
    Cart::destroy();
});
Route::resource('/photos', \App\Http\Controllers\PhotoResourceController::class);
Route::post("/logout",[LogoutController::class,"store"])->name("logout");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('products', [\App\Http\Controllers\PhotoResourceController::class, 'productList'])->name('photo.list');
//Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
//Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
//Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
//Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
//Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
