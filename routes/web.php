<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/index', 'HomeController@index');

Route::get('/product-detail={id}','ProductController@product_detail');

Route::post('/tim-kiem', 'HomeController@search');

Route::get('/admin', 'AdminController@index');

Route::get('/dashboard', 'AdminController@show_dashboard');

Route::post('/admin-dashboard', 'AdminController@dashboard');

Route::get('/logout', 'AdminController@logout');


//Category
Route::get('/add-category-product', 'CategoryProduct@add_category_product');

Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');

Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');

Route::get('/all-category-product', 'CategoryProduct@all_category_product');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');

Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');

//SetProduct

Route::get('/add-set-product', 'SetProduct@add_set_product');

Route::get('/edit-set-product/{set_product_id}', 'SetProduct@edit_set_product');

Route::get('/delete-set-product/{set_product_id}', 'SetProduct@delete_set_product');

Route::get('/all-set-product', 'SetProduct@all_set_product');

Route::post('/save-set-product', 'SetProduct@save_set_product');

Route::post('/update-set-product/{set_product_id}', 'SetProduct@update_set_product');

//Login_user

Route::post('/login', 'UserController@login');

Route::get('/logout-user', 'UserController@logout');

Route::get('/register', 'UserController@register');

Route::post('/register', 'UserController@register_post');

//Product

Route::get('/add-product', 'ProductController@add_product');

Route::get('/edit-product/{product_id}', 'ProductController@edit_product');

Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

Route::get('/all-product', 'ProductController@all_product');

Route::post('/save-product', 'ProductController@save_product');

Route::post('/update-product/{product_id}', 'ProductController@update_product');

//Cart

Route::post('/save-cart', 'CartController@save_cart');

Route::get('/show-cart','CartController@show_cart');

Route::post('/update-cart-qty', 'CartController@update_cart_qty');

Route::get('/remove-cart={rowId}','CartController@remove_cart');

//Checkout

Route::get('/login-checkout', 'CheckoutController@login_checkout');

Route::get('/checkout', 'CheckoutController@checkout');

Route::post('/add-customer', 'CheckoutController@add_customer');

Route::post('/new-customer', 'CheckoutController@new_customer');

Route::post('/save-checkout-customer', 'CheckoutController@save_checkout_customer');

Route::get('/pay', 'CheckoutController@pay');

Route::post('/order-place', 'CheckoutController@order_place');



