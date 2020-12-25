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
Auth::routes();

Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::group(array('prefix' => 'merchant','middleware' => ['auth']), function()
{
    Route::get('/', 'MerchantController@index')->name('merchant');
    Route::get('/create', 'MerchantController@create');
    Route::post('submit', 'MerchantController@store')->name('merchant.submit');
    Route::get('edit/{id}', 'MerchantController@edit');
    Route::post('update_merchant/{id}', 'MerchantController@update')->name('update_merchant'); 
});
Route::group(array('prefix' => 'category','middleware' => ['auth']), function()
{
    Route::get('/', 'CategoryController@index')->name('category');
    Route::get('/add', 'CategoryController@create');
    Route::post('submit', 'CategoryController@store')->name('category.submit');
    Route::get('edit/{id}', 'CategoryController@edit');
    Route::post('update/{id}', 'CategoryController@update')->name('update_category');
    Route::post('delete', 'CategoryController@destroy')->name('category.delete'); 
});
Route::group(array('prefix' => 'subcategory','middleware' => ['auth']), function()
{
    Route::get('/', 'SubCategoryController@index')->name('subcategory');
    Route::get('/add', 'SubCategoryController@create');
    Route::post('submit', 'SubCategoryController@store')->name('subcategory.submit');
    Route::get('edit/{id}', 'SubCategoryController@edit');
    Route::post('update/{id}', 'SubCategoryController@update')->name('update_subcategory');
    Route::post('delete', 'SubCategoryController@destroy')->name('subcategory.delete'); 
});
Route::group(array('prefix' => 'outlet','middleware' => ['auth']), function()
{
    Route::get('dashboard/{id}', 'MerchantDashboard@index')->name('dashboard');
    Route::get('/location/{id}', 'MerchantDashboard@location');
    Route::post('/submit-location', 'MerchantDashboard@submit_location')->name('map.submit');
});
Route::post('/change-user-status', 'MerchantController@change_user_status')->name('change-user-status');
Route::post('/change-category-status', 'CategoryController@change_category_status')->name('change-category-status');
Route::post('/change-sub-category-status', 'SubCategoryController@change_category_status')->name('change-sub-category-status');
Route::prefix('json')->group(function () 
{
	Route::post('/json_auth','JsonUserController@login');
	Route::get('/books/{user_id}','JsonBookController@book_title_list');
	Route::get('/books/{user_id}/{title_id}','JsonBookController@book_list');
});


