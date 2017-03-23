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

//Route::get('bestelling', [function(){
//
//    $payment = \App\Order::find(1);
//
//    $order = Cart::content();
//
//    return view('mail.order')->with('payment', $payment);
//}]);
//
//
//Route::get('mailorder', [function(){
//
//    $payment = \App\Order::find(30);
//
//    $order = Cart::content();
//
//    return view('mail.payment')->with('order', $payment);
//}]);

//Route::auth();
// User authentication routes...
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
//Route::get('/registreren', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
//Route::post('/registreren', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', ['as' => 'login.post', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

//set the language session
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('giftcards', ['as' => 'giftcards.index', 'uses' => 'CategoryController@index']);
Route::get('giftcards/{category}', ['as' => 'giftcards', 'uses' => 'CategoryController@show']);
Route::get('{category}/{name}/c', ['as' => 'giftcard.show', 'uses' => 'ProductController@show']);

Route::get('algemene-voorwaarden', ['as' => 'algemeen.voorwaarden', 'uses' => 'PageController@algemenevoorwaarden']);
Route::get('disclaimer', ['as' => 'disclaimer', 'uses' => 'PageController@disclaimer']);
Route::get('privacy', ['as' => 'privacy', 'uses' => 'PageController@privacy']);
Route::get('refund', ['as' => 'refund', 'uses' => 'PageController@refund']);
Route::get('handleiding', ['as' => 'guide', 'uses' => 'PageController@guide']);

Route::group(['prefix' => 'shoppingcart'], function ()
{
    Route::get('/', ['as' => 'cart.index', 'uses' => 'CartController@index']);
    Route::get('/checkout', ['as' => 'cart.checkout', 'uses' => 'CartController@create']);
    Route::post('/cart', ['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::post('/verwijder', ['as' => 'cart.remove', 'uses' => 'CartController@remove']);
    Route::post('/plus', ['as' => 'cart.increase', 'uses' => 'CartController@increase']);
    Route::post('/min', ['as' => 'cart.decrease', 'uses' => 'CartController@decrease']);
    Route::post('/legen', ['as' => 'cart.empty', 'uses' => 'CartController@destroy']);
});

Route::get('/order/{id}', ['as' => 'order.get', 'uses' => 'MollieController@get']);
Route::post('/order/create', ['as' => 'order.create', 'uses' => 'MollieController@create']);

Route::get('blog', ['as' => 'blog', 'uses' => 'BlogController@index']);
Route::get('blog/{title}', ['as' => 'blog.show', 'uses' => 'BlogController@show']);

Route::get('klantenservice', ['as' => 'klantenservice', 'uses' => 'ContactController@show']);
Route::post('klantenservice', ['as' => 'klantenservice.store', 'uses' => 'ContactController@store']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //main admin page
    Route::get('/', ['as' => 'admin', 'uses' => 'admin\HomeController@index']);

    Route::get('/user', ['as' => 'admin.user', 'uses' => 'admin\UserController@index']);
    Route::get('/user/create', ['as' => 'admin.user.create', 'uses' => 'admin\UserController@create']);
    Route::post('/user', ['as' => 'admin.user.store', 'uses' => 'admin\UserController@store']);
    Route::get('/user/{id}', ['as' => 'admin.user.show', 'uses' => 'admin\UserController@show']);
    Route::get('/user/{id}/edit', ['as' => 'admin.user.edit', 'uses' => 'admin\UserController@edit']);
    Route::patch('/user/{id}', ['as' => 'admin.user.update', 'uses' => 'admin\UserController@update']);
    Route::delete('/user/{id}', ['as' => 'admin.user.destroy', 'uses' => 'admin\UserController@destroy']);

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
