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
use App\User;



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

Route::get('/signoff/{sign_code}', 'FoodController@signOff');

//Route::get('/user/{sign_code}', function ($sign_code){
//    $user=User::where('signCode', $sign_code)->first();
//    if(!isset($user)) {
//        return  "<span>Вы уже отписаны от рассылки,</span><h3></h3>
//            <p><a href='http://food.loc/'>Перейти на сайт</a></p>";
//    }
//    $user->isSign=0;
//    $user->signCode="";
//    $user->save();
//    return "<span>Вы успешно отписались от рассылки,</span><h3>$user->name</h3>
//            <p><a href='http://food.loc/'>Перейти на сайт</a></p>";
//});


