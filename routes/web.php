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




Route::group( ["middleware" => "myAdmin"], function (){
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/create', 'AdminController@create');
    Route::post('/admin/store', 'AdminController@store');
    Route::delete('/admin/delete/{id}', 'AdminController@destroy');
    Route::get('/admin/createcategory', 'AdminController@createcategory');
    Route::post('/admin/addcategory', 'AdminController@addcategory');
    Route::get('/admin/edit/{id}','AdminController@edit');
    Route::put('/admin/update', 'AdminController@update');
});



Route::resource('/food', 'FoodController');
Route::get('/food/show/{id}', 'FoodController@show');
Route::get('/recipe/{id}' , 'FoodController@recipe');


