<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BasketController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AdminProductController;

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

// Route::post('/register', [API\AuthController::class, 'register']);

// Route::post('/register', 'App\Http\Controllers\API\AuthController@register');
Route::get('/products', 'App\Http\Controllers\API\ProductController@index')->name('catalog');

Route::post('/order', 'App\Http\Controllers\API\BasketController@saveOrder');

Route::group(['namespace' => 'API'], function() {
    Route::get('/basket', [ BasketController::class, 'basket' ]);
    Route::post('/register', [ AuthController::class, 'register' ]);
    Route::post('/login', [ AuthController::class, 'login' ]);


});

Route::prefix('admin')->group(function () {
    Route::apiResource('products', 'App\Http\Controllers\API\AdminProductController');
});

// Route::resource('admin/products', 'App\Http\Controllers\API\AdminProductController');

// Route::apiResource('admin/products', API\AdminProductController::class);

// Route::post('/order', [API\BasketController::class, 'saveOrder']);
