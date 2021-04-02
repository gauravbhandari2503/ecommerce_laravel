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

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index']) -> name('dashboard');

Route::prefix('dashboard')->middleware(['auth','role:Seller'])->group(function(){
    Route::get('profile', [App\Http\Controllers\SellerProfileController::class, 'index']) -> name('profilepage');
    Route::post('profile', [App\Http\Controllers\SellerProfileController::class, 'update_avatar']) -> name('profile.image');
    Route::resource('/products','App\Http\Controllers\ProductController');
    Route::get('/orders',[App\Http\Controllers\OrderController::class,'orders'])->name('orders.manage');
    Route::post('orders/{orderId}',[App\Http\Controllers\OrderController::class,'orderStatus']);
    Route::post('dashboard/products/create',[App\Http\Controllers\CategoryController::class,'subCat'])->name('subcat');
});

Route::prefix('/home')->middleware('auth')->group(function(){

    Route::resource('/items','App\Http\Controllers\UserProductController');
    
    Route::get('wishlist', [App\Http\Controllers\WishlistController::class,'index'])->name('wishlist');
    Route::post('wishlist/add/{id}', [App\Http\Controllers\WishlistController::class,'store'])->name('wishlistAdd');
    Route::post('wishlist/{id}', [App\Http\Controllers\WishlistController::class,'destroy'])->name('wishlistRemove');

    Route::get('cart', [App\Http\Controllers\CartController::class,'index'])->name('cart');
    Route::get('cart/inc/{cartId}',[App\Http\Controllers\CartController::class,'increaseQuantity']);
    Route::get('cart/dec/{cartId}',[App\Http\Controllers\CartController::class,'decreaseQuantity']);
    Route::post('cart/add/{id}', [App\Http\Controllers\CartController::class,'store'])->name('cartAdd');
  
    
    Route::get('cart/order',[App\Http\Controllers\OrderController::class,'index'])->name('order');
    Route::post('cart/order/payment',[App\Http\Controllers\StripePaymentController::class,'stripe'])->name('stripe.show');
    Route::post('cart/order/stripe',[App\Http\Controllers\OrderController::class,'store'])->name('stripe.post');

    Route::get('/orders',[App\Http\Controllers\OrderController::class,'userOrders'])->name('user.orders');
    Route::get('/orders/cancel/{orderId}',[App\Http\Controllers\OrderController::class,'orderCancelRequest']);
    Route::get('/orders/item/{orderId}',[App\Http\Controllers\OrderController::class,'userOrder']);

    Route::get('/item/feedback/{productId}',[App\Http\Controllers\ReviewController::class,'index']);
    Route::post('feedback/{productId}',[App\Http\Controllers\ReviewController::class,'reviewStore'])->name('feedback');

    Route::post('product/search',[App\Http\Controllers\ProductSearchController::class,'index'])->name('search');
    Route::get('category/{categoryName}',[App\Http\Controllers\CategoryController::class,'viewByCategory'])->name('categorySearch');
});
