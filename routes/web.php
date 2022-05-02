<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/','FontendController@index')->name('site.index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('/admin/logout','AdminController@logout')->name('admin.logout');

// products route

Route::get('/products','ProductController@index')->name('products.index');
Route::post('/products/store','ProductController@store')->name('products.store');
Route::get('/products/edit/{id}','ProductController@edit')->name('products.edit');
Route::post('/products/update','ProductController@update')->name('products.update');
Route::get('/products/delete','ProductController@delete')->name('products.delete');

// admin route
Route::get('admin/category','Admin\CategoryController@index')->name('admin.category');
Route::post('/admin/category/store','Admin\CategoryController@store')->name('category.store');
Route::get('/admin/category/edit/{id}','Admin\CategoryController@edit')->name('category.edit');
Route::post('/admin/category/update','Admin\CategoryController@update')->name('category.update');
Route::get('/admin/category/delete/{id}','Admin\CategoryController@delete')->name('category.delete');
Route::get('admin/category/inactive/{id}','Admin\CategoryController@inactive')->name('category.inactive');
Route::get('/admin/category/active/{id}','Admin\CategoryController@active')->name('category.active');

// brand route
Route::get('/admin/brand','Admin\BrandController@index')->name('admin.brand');
Route::post('/admin/brand/store','Admin\BrandController@store')->name('brand.store');
Route::get('/admin/brand/edit/{id}','Admin\BrandController@edit')->name('brand.edit');
Route::get('/admin/brand/delete/{id}','Admin\BrandController@delete')->name('brand.delete');
Route::post('/admin/brand/update','Admin\BrandController@update')->name('brand.update');
Route::get('/admin/brand/inactive/{id}','Admin\BrandController@inactive')->name('brand.inactive');
Route::get('/admin/brand/active/{id}','Admin\BrandController@active')->name('brand.active');

// products route

Route::get('/admin/products/add','Admin\ProductController@index')->name('add.products');
Route::post('/admin/products/store','Admin\ProductController@store')->name('store.products');
Route::get('/admin/products/manage','Admin\ProductController@manageProduct')->name('manage-products');
Route::get('/admin/products/edit/{id}','Admin\ProductController@editProduct')->name('edit.products');
Route::post('/admin/products/update','Admin\ProductController@updateProduct')->name('update.products');
Route::get('/admin/products/delete/{id}','Admin\ProductController@deleteProduct')->name('delete.products');
Route::get('admin/products/inactive/{id}','Admin\ProductController@inactive')->name('products.inactive');
Route::get('/admin/products/active/{id}','Admin\ProductController@active')->name('products.active');

// coupon route start here 

Route::get('/admin/coupon','Admin\CouponController@index')->name('admin.coupon');
Route::post('/admin/coupon/store','Admin\CouponController@store')->name('coupon.store');
Route::get('/admin/coupon/edit/{id}','Admin\CouponController@edit')->name('coupon.edit');
Route::post('/admin/coupon/update','Admin\CouponController@update')->name('coupon.update');
Route::get('/admin/coupon/delete/{id}','Admin\CouponController@delete')->name('coupon.delete');
Route::get('admin/coupon/inactive/{id}','Admin\CouponController@inactive')->name('coupon.inactive');
Route::get('/admin/coupon/active/{id}','Admin\CouponController@active')->name('coupon.active');

// cart start here


Route::post('/add/to-cart/{product_id}','CartController@addtocart')->name('add_to_cart');
Route::get('/cart','CartController@cartpage')->name('cart.index');
Route::get('/cart/remove/{cart_id}','CartController@destroy')->name('cart.destroy');
Route::post('/cart/quantity/update/{cart_id}','CartController@quantityupdate')->name('cart.quantity.update');
Route::post('/cart/coupon/apply','CartController@applycoupon')->name('cart.coupon.apply');
Route::get('/coupon-remove','CartController@couponremove')->name('coupon_remove');

// wishlist

Route::get('/add/to-wishlist/{product_id}','WishlistController@addtowishlist')->name('add_to_wishlist');
Route::get('/wishlist','WishlistController@wishlistpage')->name('wishlist.index');
Route::get('/wishlist/destroy/{wishlist_id}','WishlistController@destroy')->name('wishlist.destroy');

// product details

Route::get('/product/details/{product_id}','FontendController@productdetails')->name('product.details');

// checkout page
Route::get('/checkout','CheckoutController@index')->name('checkout.index');
Route::post('/place/order','OrderController@storeOrder')->name('place-order');
Route::get('/order/success','OrderController@orderSuccess')->name('order_success');