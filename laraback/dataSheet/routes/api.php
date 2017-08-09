<?php

use Illuminate\Http\Request;

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
Route::group(['middleware' => 'jwt'], function () {

    Route::group(['prefix' => '/admin', 'middleware' => 'role:admin'], function () {

        Route::resource('/users', 'UsersController');

        Route::resource('/products', 'ProductsController');


        Route::group(['prefix' => '/user'], function () {

            Route::resource('/pictures', 'UserPicturesController');

            Route::resource('/roles', 'UserRolesController');

            Route::resource('/addresses', 'UserAddressesController');

            Route::resource('/states', 'UserStatesController');

        });


        Route::group(['prefix' => '/product'], function () {

            Route::resource('/pictures', 'ProductPicturesController');

            Route::resource('/designers', 'ProductDesignersController');

            Route::resource('/brands', 'ProductBrandsController');

            Route::resource('/categories', 'ProductCategoriesController');

            Route::resource('/materials', 'ProductMaterialsController');

            Route::resource('/colors', 'ProductColorsController');

            Route::resource('/styles', 'ProductStylesController');

            Route::resource('/periods', 'ProductPeriodsController');

            Route::resource('/states', 'ProductStatesController');

        });

    });

    Route::group(['middleware' => 'role:user'], function () {

        Route::get('/users', 'UsersController@index');
        Route::get('/users/{id}', 'UsersController@show');

        Route::group(['middleware' => 'group:user'], function () {

            Route::put('/users/{id}', 'UsersController@update');

        });
        
        Route::group(['prefix' => '/user'], function () {

            Route::get('/pictures', 'UserPicturesController@index');
            Route::get('/pictures/{id}', 'UserPicturesController@show');

            Route::get('/roles', 'UserRolesController@index');
            Route::get('/roles/{id}', 'UserRolesController@show');

            Route::get('/addresses', 'UserAddressesController@index');
            Route::get('/addresses/{id}', 'UserAddressesController@show');

            Route::get('/states', 'UserStatesController@index');
            Route::get('/states/{id}', 'UserStatesController@show');
        });

        Route::group(['prefix' => '/product'], function () {

            Route::get('/pictures', 'ProductPicturesController@index');
            Route::get('/pictures/{id}', 'ProductPicturesController@show');

            Route::get('/designers', 'ProductDesignersController@index');
            Route::get('/designers/{id}', 'ProductDesignersController@show');

            Route::get('/brands', 'ProductBrandsController@index');
            Route::get('/brands/{id}', 'ProductBrandsController@show');

            Route::get('/categories', 'ProductCategoriesController@index');
            Route::get('/categories/{id}', 'ProductCategoriesController@show');

            Route::get('/materials', 'ProductMaterialsController@index');
            Route::get('/materials/{id}', 'ProductMaterialsController@show');

            Route::get('/colors', 'ProductColorsController@index');
            Route::get('/colors/{id}', 'ProductColorsController@show');

            Route::get('/styles', 'ProductStylesController@index');
            Route::get('/styles/{id}', 'ProductStylesController@show');

            Route::get('/periods', 'ProductPeriodsController@index');
            Route::get('/periods/{id}', 'ProductPeriodsController@show');

            Route::get('/states', 'ProductStatesController@index');
            Route::get('/states/{id}', 'ProductStatesController@show');

        });

    });

});