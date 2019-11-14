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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/deshboard', 'HomeController@deshboard')->name('deshboard');
//Category
Route::get('/manage_categories', 'HomeController@manage_categories')->name('manage_categories');
Route::post('/saveNewCategory', 'HomeController@saveNewCategory')->name('saveNewCategory');
Route::get('/editcategory', 'HomeController@editcategory');
Route::get('/deletecategory/{categoryId}', 'HomeController@deletecategory');
Route::get('/changeCategoryActivation/{categoryId}/{activaiton}', 'HomeController@changeCategoryActivation');
Route::get('/editcategory/{categoryId}', 'HomeController@editcategory');
Route::post('/updateCategory', 'HomeController@updateCategory')->name('updateCategory');
//Product
Route::get('/manage_product', 'HomeController@manage_product')->name('manage_product');
Route::post('/saveNewProduct', 'HomeController@saveNewProduct')->name('saveNewProduct');
Route::get('/changeProductActivation/{pId}/{activaiton}', 'HomeController@changeProductActivation');
Route::get('/deleteproduct/{pId}', 'HomeController@deleteproduct');
Route::get('/editProduct/{categoryId}', 'HomeController@editProduct');
Route::post('/updateProduct', 'HomeController@updateProduct')->name('updateProduct');

//Saler....................................................................................
Route::get('/mysaler','HomeController@mysaler')->name('mysaler');
Route::post('/addNewSaler', 'HomeController@addNewSaler')->name('addNewSaler');
Route::get('/salerApproval/{userid}/{approval}','HomeController@salerApproval')->name('salerApproval');
Route::get('/deleteSaler/{userid}','HomeController@deleteSaler')->name('deleteSaler');
