<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

//lOGIN
//26042021
Route::get('/', 'Auth\LoginController@show');
Route::post('/', 'Auth\LoginController@login');

//Insert Now

Route::group(['middleware' => ['auth']], function() {

//GoldQuality
//21042021
Route::get('goldquality', 'GoldqualityController@index');
Route::post('goldquality', 'GoldqualityController@insert');
Route::get('goldquality/{id}', 'GoldqualityController@delete');

//ProductLists
//22042021
Route::get('productlists', 'ProductListsController@index');
Route::get('productlists/{id}', 'ProductListsController@delete');
Route::get('productlists/edit/{id}', 'ProductListsController@editscreen');
Route::post('productlists/edit/{id}', 'ProductListsController@edit');
Route::get('products/{id}/sell', 'SaleProductsController@movesalelistscreen');
Route::post('products/{id}/sell', 'SaleProductsController@add');
Route::post('add', 'ProductListsController@insert');
Route::get('add', 'ProductListsController@addnewscreen');

//Register form
//22042021
Route::get('users/register', 'UsersController@show');
Route::post('users/register', 'UsersController@add');
Route::get('users/{id}', 'UsersController@delete');
Route::get('users/edit/{id}', 'UsersController@editscreen');
Route::post('users/edit/{id}', 'UsersController@edit');

//Change password
//20052021
Route::get('/update/{id}', 'UsersController@updatescreen');
Route::post('/update/{id}', 'UsersController@p_update');
//LogOut
//22042021
Route::get('/logout', 'UsersController@logout');

//DashBoard
//23042021
Route::get('dashboard', 'DashboardController@index');

//SalesProducts
//23042021
Route::get('sales', 'SaleProductsController@index');
Route::get('sales/{id}/sell', 'SaleProductsController@editscreen');
Route::post('sales/{id}/sell', 'SaleProductsController@edit');
Route::get('sales/{id}', 'SaleProductsController@delete');

/*Download  lists */
//24042021
Route::get('/productssexport', 'ProductListsController@export')->name('export');
Route::get('/salesexport', 'SaleProductsController@export')->name('export1');
});//end route group


// For Clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('404');
})->where('page','.*');






