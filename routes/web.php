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

Route::get('/food', 'FoodController@index')->name('food');

//Route::resource('/admin', 'AdminController');
//Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth');
//Route::get('/admin/recipes', 'AdminController@getrecipes' );
//Route::get('/admin/create', 'AdminController@create')->middleware('auth');
//Route::post('/admin/store', 'AdminController@store');
//Route::delete('/admin/{id}', 'AdminController@destroy');



Route::group( ["middleware" => "myAdmin"], function (){
    Route::resource('/admin','AdminController');
});

Route::resource('/food', 'FoodController');
Route::get('/food/show/{id}', 'FoodController@show');
Route::get('/recipe/{id}' , 'FoodController@recipe');


