<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('products')->group(static function () {

    Route::get('/', 'App\Http\Controllers\ProductController@index')->name('products');

});

Route::prefix('orders')->group(function () {

    Route::get('/', 'App\Http\Controllers\OrderController@index')->name('orders');

});

