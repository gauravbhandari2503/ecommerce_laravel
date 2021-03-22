<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\CheckUserIsValid;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified_user');

Route::get('/verifyPage',function(){
    return view('auth.verify');
})->name('verifyPage');

Route::get('/test-email',[App\Http\Controllers\MailController::class, 'sendSignupEmail']);
Route::get('/verify/{verification_code}',[App\http\Controllers\MailController::class,'verifyUser']);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']) -> name('dashboard');

Route::prefix('dashboard')->middleware('role:Seller')->group(function(){
    Route::get('/profile', [App\Http\Controllers\SellerProfileController::class, 'index']) -> name('profilepage');
    Route::post('/profile', [App\Http\Controllers\SellerProfileController::class, 'update_avatar']) -> name('profile.image');
    Route::resource('/products','App\Http\Controllers\ProductController');
    Route::post('dashboard/products/create',[App\Http\Controllers\CategoryController::class,'index']);
    Route::post('dashboard/products/create',[App\Http\Controllers\CategoryController::class,'subCat'])->name('subcat');
});

Route::prefix('/home')->group(function(){
    Route::resource('/items','App\Http\Controllers\UserProductController');
    
    Route::get('/wishlist', [App\Http\Controllers\WishlistController::class,'index'])->name('wishlist');
    Route::post('/wishlist/add/{id}', [App\Http\Controllers\WishlistController::class,'store'])->name('wishlistAdd');
    Route::post('/wishlist/{id}', [App\Http\Controllers\WishlistController::class,'destroy'])->name('wishlistRemove');

    Route::get('/cart', [App\Http\Controllers\CartController::class,'index'])->name('cart');
    Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class,'store'])->name('cartAdd');
    Route::post('/cart/{id}', [App\Http\Controllers\CartController::class,'destroy'])->name('cartRemove');
    

    Route::post('/cart/payment/{id}',[App\Http\Controllers\PaymentController::class,'paymentInfo'])->name('payment');
 

});
