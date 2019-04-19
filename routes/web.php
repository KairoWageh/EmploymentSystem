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

Route::get('/home', 'HomeController@index')->name('home');


// Employee routes

Route::get("/employees","EmployeeController@index");

Route::get("/employees/create","EmployeeController@create");

Route::post("/employees","EmployeeController@store");

Route::post("/employees/search","EmployeeController@search");

Route::get("/employees/activiate/{id}","EmployeeController@activiate");

Route::get("/employees/deActiviate/{id}","EmployeeController@deActiviate");

Route::get("/employees/setAdmin/{id}","EmployeeController@setAdmin");

Route::get("/employees/setNotAdmin/{id}","EmployeeController@setNotAdmin");

Route::get('/employees/edit/{id}', 'EmployeeController@edit');

Route::post('/employees/edit/{id}', 'EmployeeController@update');

Route::get("/employees/delete/{id}","EmployeeController@destroy");
