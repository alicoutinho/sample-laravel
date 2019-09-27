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
Route::get('/', 'IndexController@index');

Auth::routes();
Route::get('/admin/product/gallery','Admin\ProductController@gallery');
Route::post('/admin/product/upload','Admin\ProductController@upload');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::group(['namespace'=>'Admin' , 'middleware' =>['auth'],'prefix'=>'admin'],function(){
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');
    Route::resource('/role','RoleController');
    Route::resource('/permission','PermissionController');
    Route::resource('/user','UserController');
    Route::resource('/slider','SliderController');
    Route::resource('/filter','FilterController');
});
Route::group([],function(){
    Route::get('/basket','BasketController@index')->middleware('auth');
    Route::post('/product/store','BasketController@store');
});