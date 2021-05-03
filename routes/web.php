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


Route::get('/testing', function () {
    return view('testing');
});


Route::group(['prefix' => 'icons'], function(){
    Route::get('material', function () { return view('pages.icons.material'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('font-awesome', function () { return view('pages.icons.font-awesome'); });
    Route::get('simple-line-icons', function () { return view('pages.icons.simple-line-icons'); });
    Route::get('themify', function () { return view('pages.icons.themify'); });
});



Route::group(['prefix' => 'user-pages'], function(){
    Route::get('login', function () { return view('pages.user-pages.login'); });
    Route::get('login-2', function () { return view('pages.user-pages.login-2'); });
    Route::get('multi-step-login', function () { return view('pages.user-pages.multi-step-login'); });
    Route::get('register', function () { return view('pages.user-pages.register'); });
    Route::get('register-2', function () { return view('pages.user-pages.register-2'); });
    Route::get('lock-screen', function () { return view('pages.user-pages.lock-screen'); });
});


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






