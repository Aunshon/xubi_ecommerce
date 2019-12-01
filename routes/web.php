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

// Auth::routes();
Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function ()
{
    $allProduct = App\product::all();
    return view('home',compact('allProduct'));
})->name('home');

Route::get('/notApproved', function(){
        return view('notApproved');
})->name('notApproved');

Route::get('/Banded', function(){
    return view('Banded');
})->name('Banded');

// Route::get('/deshboard', 'HomeController@deshboard')->name('deshboard')->middleware('verified')->middleware('userapproval');
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
//Brand Admin
Route::get('/allBrand', 'HomeController@allBrand')->name('allBrand');
Route::post('/saveNewBrand', 'HomeController@saveNewBrand')->name('saveNewBrand');
Route::get('/brandRequest', 'HomeController@brandRequest')->name('brandRequest');
Route::get('/brandRequestChange/{id}/{status}', 'HomeController@brandRequestChange');
Route::get('/brandActivation/{id}/{status}', 'HomeController@brandActivation');
Route::post('/getBrandSearch', 'HomeController@getBrandSearch');
Route::get('/productApprovalChange/{id}/{status}', 'HomeController@productApprovalChange');

//Saler....................................................................................
// Route::get('/mysaler','HomeController@mysaler')->name('mysaler')->middleware('userrestriction');
Route::get('/mysaler','HomeController@mysaler')->name('mysaler');
Route::post('/addNewSaler', 'HomeController@addNewSaler')->name('addNewSaler');
Route::get('/salerApproval/{userid}/{approval}','HomeController@salerApproval')->name('salerApproval');
Route::get('/deleteSaler/{userid}','HomeController@deleteSaler')->name('deleteSaler');
Route::get('/allSalerProduct','HomeController@allSalerProduct')->name('allSalerProduct');
Route::get('/salerRegisterBrands','HomeController@salerRegisterBrands')->name('salerRegisterBrands');
Route::get('/salerRegisterBrands','HomeController@salerRegisterBrands')->name('salerRegisterBrands');
Route::get('/salerRegisterBrands','HomeController@salerRegisterBrands')->name('salerRegisterBrands');
Route::get('/brandRegisterApprove/{id}/{status}','HomeController@brandRegisterApprove')->name('brandRegisterApprove');
// New Admin..........
Route::get('/allAdmins','HomeController@allAdmins')->name('allAdmins');
Route::post('/addNewAdmin', 'HomeController@addNewAdmin')->name('addNewAdmin');
//Saler COntroller.........
Route::get('/saler/brand','SalerController@salerbrand')->name('salerbrand');
Route::post('/addNewBrand', 'SalerController@addNewBrand')->name('addNewBrand');
Route::post('/requestNewBrand', 'SalerController@requestNewBrand')->name('requestNewBrand');

//...........Cart....................................................................................
Route::get('/cart','CartController@cart')->name('cart');
Route::get('/add/to/cart/{product_id}','CartController@addtocart')->name('addtocart');
Route::post('/updateCart',"CartController@updateCart")->name('updateCart');
