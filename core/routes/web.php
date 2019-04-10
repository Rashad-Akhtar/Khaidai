<?php

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
    return view('front.index');
});


Auth::routes();

// admin login
Route::get('/admin','Auth\AdminLoginController@showLoginForm')->name('admin.loginform');
Route::post('/admin','Auth\AdminLoginController@login')->name('admin.login');

Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']], function() {

    // admin profile
    Route::get('dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('logout','Auth\AdminLoginController@adminLogout')->name('logout');
    Route::get('changepassword','AdminController@changePasswordForm')->name('changepassword');
    Route::post('changepassword','AdminController@changePassword')->name('changepassword');

    //Product Category
    Route::get('categories','CategoryController@categories')->name('categories');
    Route::post('category/add','CategoryController@addCategory')->name('add.category');
    Route::post('category/update','CategoryController@updateCategory')->name('update.category');
    
    //Products
    Route::get('products','ProductController@products')->name('products');
    Route::post('product/add','ProductController@addProduct')->name('add.product');
    Route::post('product/update','ProductController@updateProduct')->name('update.product');

    //stock
    Route::get('stock','ProductController@stock')->name('stock');
    Route::post('stock/update','ProductController@updateStock')->name('update.stock');

    //sales
    Route::get('sales','ProductController@sales')->name('sales');
    Route::post('cart/add','SalesController@addCart')->name('add.cart');
    Route::delete('cart/clear','SalesController@cartClear')->name('cart.clear');
    Route::delete('cart/remove','SalesController@cartRemove')->name('cart.remove');
    Route::post('cart/checkout','SalesController@cartCheckout')->name('cart.checkout');
    
});
