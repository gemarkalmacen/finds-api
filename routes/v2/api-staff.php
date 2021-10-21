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

Route::group(['prefix' => 'staff', 'namespace' => 'Staff'], function() {
    
    // Route::post('login', 'AuthController@login');

    Route::group(
        [
            'middleware' => [
                // 'auth:sanctum',
                'staff',
                // 'user.active'
            ]
        ],
        function() {

            // Route::get('categories', [CategoryController::class, 'index']);
            // Route::get('categories/{category}', [CategoryController::class, 'show']);

            // Route::get('categories', 'CategoryController@index');
            // Route::get('categories/{category}', 'CategoryController@show');

            Route::group(['namespace' => 'Categories'], function () {
                Route::apiResource('/categories', 'CategoryController');                        
                // Route::get('categories', 'CategoryController@index');
                // Route::get('{language_code}/selector','LanguageController@select')->name('categories.index');
            });

            // Route::get('logout', 'AuthController@logout');       

            // Route::group(['namespace' => 'Languages'], function () {
            //     Route::apiResource('languages','LanguageController');                        
            //     Route::get('{language_code}/selector','LanguageController@select')->name('languages.selector');
            // });
                    
            // Route::group(['namespace' => 'JobMajorGroups'],function(){
            //     Route::apiResource('job-major-groups','JobMajorGroupController');
            // });
                    
            // Route::group(['namespace' => 'JobGroups'],function(){
            //     Route::apiResource('job-groups','JobGroupController');
            // });

            // Route::group(['namespace' => 'Jobs'],function(){
            //     Route::apiResource('jobs','JobController');
            // });

            // Route::group(['namespace' => 'Positions'],function(){
            //     Route::apiResource('positions','PositionController');
            // });

            // Route::group(['namespace' => 'Industries'],function(){
            //     Route::apiResource('industries','IndustryController');
            // });
            
            // Route::group(['namespace' => 'Softwares'],function(){
            //     Route::apiResource('softwares','SoftwareController');
            // });
            
            // Route::group(['namespace' => 'Sources'],function(){
            //     Route::apiResource('sources','SourceController');
            // });
            
            // Route::group(['namespace' => 'Skills'],function(){
            //     Route::apiResource('skills','SkillController');
            // });

            // Route::group(['namespace' => 'Scouts'],function(){
            //     Route::apiResource('scouts','ScoutController');
            // });

            // Route::group(['namespace' => 'Provinces'],function(){
            //     Route::apiResource('provinces','ProvinceController');
            // });
            
            // Route::group(['namespace' => 'Cities'],function(){
            //     Route::apiResource('cities','CityController');
            // });

            // Route::group(['namespace' => 'Countries'],function(){
            //     Route::apiResource('countries','CountryController');
            // });
        }
    );
});
