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

Route::get('/', function () {
    return view('welcome');
});
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', ['as' => 'home', 'uses' => 'CategoryController@index']);
Route::get('giftcard/{name}', ['as' => 'giftcards', 'uses' => 'ProductController@show']);

Route::get('shoppingcart', ['as' => 'cart.index', 'uses' => 'CartController@index']);
Route::get('cart/empty', ['as' => 'cart.empty', 'uses' => 'CartController@destroy']);

Route::get('cart/{id}', ['as' => 'cart.store', 'uses' => 'CartController@store']);

//Route::get('cart/{id}', ['as' => 'cart.store', function(Illuminate\Http\Request $request, $id){
//    $items = $request->session()->get('cart');
//    $items = ['id' => $id];
//    $request->session()->push('cart', $items);
//    return redirect()->back();
//}]);

Route::auth();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', ['as' => 'admin', 'uses' => 'admin\HomeController@index']);

//    Route::get('/blog', ['as' => 'admin.blog', 'uses' => 'BlogController@index']);

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
//    Route::destroy('/order/{id}', ['as' => 'admin.product.destroy', 'uses' => 'admin\ProductController@destroy']);


    Route::get('/order', ['as' => 'admin.order', 'uses' => 'admin\OrderController@index']);
//    Route::get('/order/create', ['as' => 'admin.order.create', 'uses' => 'admin\OrderController@create']);
//    Route::post('/order', ['as' => 'admin.order.store', 'uses' => 'admin\OrderController@store']);
//    Route::get('/order/{id}', ['as' => 'admin.order.show', 'uses' => 'admin\OrderController@show']);
//    Route::get('/order/{id}/edit', ['as' => 'admin.order.edit', 'uses' => 'admin\OrderController@edit']);
//    Route::patch('/order/{id}', ['as' => 'admin.order.update', 'uses' => 'admin\OrderController@update']);
//    Route::destroy('/order/{id}', ['as' => 'admin.order.destroy', 'uses' => 'admin\OrderController@destroy']);

//    Route::get('/giftcard', ['as' => 'admin.giftcard', 'uses' => 'AdminController@index']);

    Route::get('/orders', ['as' => 'admin.order', 'uses' => 'AdminController@index']);

});