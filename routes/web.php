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


Route::post('/search',"HomeController@search_real");

Route::post('/add/equipment',"HomeController@add_equipment");
Route::post('/add/stuff',"HomeController@add_stuff");
Route::post('/add/service',"HomeController@add_service");

Route::post('/stuff/delete',"HomeController@stuff_delete");
Route::post('/equipment/delete',"HomeController@equipment_delete");
Route::post('/service/delete',"HomeController@service_delete");

Route::post('/stuff/update',"HomeController@stuff_update");
Route::post('/equipment/update',"HomeController@equipment_update");
Route::post('/service/update',"HomeController@service_update");

Route::get('/home', 'HomeController@index');
Route::get('/equipment',"HomeController@equipment");
Route::get('/stuff',"HomeController@stuff");

Route::post('/finishcart',"HomeController@finishcart");
Route::get('/cart',"HomeController@cart");

Route::get('/customer',"HomeController@customer");
Auth::routes();
