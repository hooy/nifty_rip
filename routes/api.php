<?php

use Illuminate\Http\Request;
use App\Product;
use App\Order;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

# Products
Route::apiResource('products', 'ProductController');
Route::post('products', 'ProductController@store');
// Route::get('products/{id}', 'ProductController@show');
// Route::get('products/{id}', 'ProductController@show');

# Orders
Route::apiResource('orders/', 'OrderController');
Route::get('orders/type/{type}', 'OrderController@by_type');
