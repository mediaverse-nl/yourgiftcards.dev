<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('giftcards', ['as' => 'giftcards.index', 'uses' => 'CategoryController@index']);
Route::get('giftcard/{category}', ['as' => 'giftcards', 'uses' => 'CategoryController@show']);
Route::get('giftcard/{category}/{name}', ['as' => 'giftcard.show', 'uses' => 'ProductController@show']);

Route::group(['prefix' => 'shoppingcart'], function () {

    Route::get('/', ['as' => 'cart.index', 'uses' => 'CartController@index']);
    Route::get('/checkout', ['as' => 'cart.checkout', 'uses' => 'CartController@create']);
    Route::get('/empty', ['as' => 'cart.empty', 'uses' => 'CartController@destroy']);
    Route::get('/{id}', ['as' => 'cart.store', 'uses' => 'CartController@store']);
    
    //webhook link
    Route::get('payment/{id}', ['as' => 'cart.payment', 'uses' => 'OrderController@show']);

});

Route::get('blog', ['as' => 'blog', 'uses' => 'BlogController@index']);
Route::get('blog/{id}', ['as' => 'blog.show', 'uses' => 'BlogController@show']);

Route::get('klantenservice', ['as' => 'klantenservice',  function () {
    return view('contact');
}]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //main admin page
    Route::get('/', ['as' => 'admin', 'uses' => 'admin\HomeController@index']);

    Route::get('/blog', ['as' => 'admin.blog', 'uses' => 'admin\BlogController@index']);
    Route::get('/blog/create', ['as' => 'admin.blog.create', 'uses' => 'admin\BlogController@create']);
    Route::post('/blog', ['as' => 'admin.blog.store', 'uses' => 'admin\BlogController@store']);
    Route::get('/blog/{id}', ['as' => 'admin.blog.show', 'uses' => 'admin\BlogController@show']);
    Route::get('/blog/{id}/edit', ['as' => 'admin.blog.edit', 'uses' => 'admin\BlogController@edit']);
    Route::patch('/blog/{id}', ['as' => 'admin.blog.update', 'uses' => 'admin\BlogController@update']);
    Route::delete('/blog/{id}', ['as' => 'admin.blog.destroy', 'uses' => 'admin\BlogController@destroy']);

    Route::get('/category', ['as' => 'admin.category', 'uses' => 'admin\CategoryController@index']);
    Route::get('/category/create', ['as' => 'admin.category.create', 'uses' => 'admin\CategoryController@create']);
    Route::post('/category', ['as' => 'admin.category.store', 'uses' => 'admin\CategoryController@store']);
    Route::get('/category/{id}', ['as' => 'admin.category.show', 'uses' => 'admin\CategoryController@show']);
    Route::get('/category/{id}/edit', ['as' => 'admin.category.edit', 'uses' => 'admin\CategoryController@edit']);
    Route::patch('/category/{id}', ['as' => 'admin.category.update', 'uses' => 'admin\CategoryController@update']);
    Route::delete('/category/{id}', ['as' => 'admin.category.destroy', 'uses' => 'admin\CategoryController@destroy']);

    Route::get('/giftcard', ['as' => 'admin.product', 'uses' => 'admin\ProductController@index']);
    Route::get('/giftcard/create', ['as' => 'admin.product.create', 'uses' => 'admin\ProductController@create']);
    Route::post('/giftcard', ['as' => 'admin.product.store', 'uses' => 'admin\ProductController@store']);
    Route::get('/giftcard/{id}', ['as' => 'admin.product.show', 'uses' => 'admin\ProductController@show']);
    Route::get('/giftcard/{id}/edit', ['as' => 'admin.product.edit', 'uses' => 'admin\ProductController@edit']);
    Route::patch('/giftcard/{id}', ['as' => 'admin.product.update', 'uses' => 'admin\ProductController@update']);
    Route::delete('/giftcard/{id}', ['as' => 'admin.product.destroy', 'uses' => 'admin\ProductController@destroy']);

    Route::get('/stock', ['as' => 'admin.stock', 'uses' => 'admin\StockController@index']);
    Route::get('/stock/create', ['as' => 'admin.stock.create', 'uses' => 'admin\StockController@create']);
    Route::post('/stock', ['as' => 'admin.stock.store', 'uses' => 'admin\StockController@store']);
    Route::get('/stock/{id}', ['as' => 'admin.stock.show', 'uses' => 'admin\StockController@show']);
    Route::get('/stock/{id}/edit', ['as' => 'admin.stock.edit', 'uses' => 'admin\StockController@edit']);
    Route::patch('/stock/{id}', ['as' => 'admin.stock.update', 'uses' => 'admin\StockController@update']);
//    Route::delete('/giftcard/{id}', ['as' => 'admin.product.destroy', 'uses' => 'admin\ProductController@destroy']);

    Route::get('/order', ['as' => 'admin.order', 'uses' => 'admin\OrderController@index']);
    Route::get('/order/{id}', ['as' => 'admin.order.show', 'uses' => 'admin\OrderController@show']);
    Route::get('/order/{id}/edit', ['as' => 'admin.order.edit', 'uses' => 'admin\OrderController@edit']);
    Route::patch('/order/{id}', ['as' => 'admin.order.update', 'uses' => 'admin\OrderController@update']);

});



//Route::get('login', function () {
//    return Socialite::with('mollie')
////        ->scopes(['profiles.read']) // Additional permission: profiles.read
//        ->redirect();
//});
//
//Route::get('login_callback', function () {
//    $user = Socialite::with('mollie')->user();
//
//    Mollie::api()->setAccessToken($user->token);
//
//    return Mollie::api()->profiles()->all(); // Retrieve all payment profiles available on the obtained Mollie account
//});