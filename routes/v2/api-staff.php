<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\V2\Staff\CategoryController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // Route::get('categories', 'App\Http\Controllers\Api\CategoryController@index');
// Route::get('categories', [CategoryController::class, 'index']);
// Route::get('categories/{category}', [CategoryController::class, 'show']);

// Route::group([
//     'prefix' => 'v1', 
//     'as' => 'api.', 
//     'namespace' => 'Api\V1\Admin', 
//     'middleware' => ['auth:api']
// ], function () {
//     Route::apiResource('projects', 'ProjectsApiController');
// });

// Route::group(['prefix' => 'staff', 'namespace' => 'Staff'], function() {
//     // Route::post('login', 'AuthController@login');

//     Route::group([
//         'middleware' => [
//             // 'auth:sanctum',
//         ]
//     ], function() {
//             Route::get('categories', [CategoryController::class, 'index']);
//             Route::get('categories/{category}', [CategoryController::class, 'show']);
//         }
//     );
// });