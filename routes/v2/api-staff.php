<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V2 Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'staff', 'namespace' => 'Staff'], function() {
    // Route::post('login', 'AuthController@login');
    Route::group(
        [
            'middleware' => [
                // 'auth:sanctum',
                'staff',
            ]
        ],
        function() {

            Route::group(['namespace' => 'Categories'], function () {
                Route::apiResource('/categories', 'CategoryController');                        
            });
        }
    );
});
