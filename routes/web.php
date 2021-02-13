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
//--------------------------------Employee routes----------------------------------
Route::get('/employee','EmployeeController@employeeShow')->name('employeeShow');
Route::get('/employeeAdd','EmployeeController@employeeAdd')->name('employeeAdd');
Route::post('/employeeAddSubmit','EmployeeController@employeeAddSubmit')->name('employeeAddSubmit');
Route::get('/employeeDelete/{ID}','EmployeeController@employeeDelete')->name('employeeDelete');
Route::get('/employeeUpdate/{ID}','EmployeeController@employeeUpdate')->name('employeeUpdate');
Route::post('/employeeUpdate/{ID}/employeeUpdateSubmit','EmployeeController@employeeUpdateSubmit')->name('employeeUpdateSubmit');
//---------------------------------------------------------------------------------
//--------------------------------Unit routes--------------------------------------
Route::get('/unit','UnitController@unitShow')->name('unitShow');
Route::get('/unitAdd','UnitController@unitAdd')->name('unitAdd');
Route::post('/unitAddSubmit','UnitController@unitAddSubmit')->name('unitAddSubmit');
Route::get('/unitDelete/{ID}','UnitController@unitDelete')->name('unitDelete');
Route::get('/unitUpdate/{ID}','UnitController@unitUpdate')->name('unitUpdate');
Route::post('/unitUpdate/{ID}/unitUpdateSubmit','UnitController@unitUpdateSubmit')->name('unitUpdateSubmit');
//----------------------------------------------------------------------------------
//---------------------------------Post routes--------------------------------------
Route::get('/post','PostController@postShow')->name('postShow');
Route::get('/postAdd','PostController@postAdd')->name('postAdd');
Route::post('/postAddSubmit','PostController@postAddSubmit')->name('postAddSubmit');
Route::get('/postDelete/{ID}','PostController@postDelete')->name('postDelete');
Route::get('/postUpdate/{ID}','PostController@postUpdate')->name('postUpdate');
Route::post('/postUpdate/{ID}/postUpdateSubmit','PostController@postUpdateSubmit')->name('postUpdateSubmit');
//------------------------------------------------------------------------------------
//---------------------------------Budget routes---------------------------------------
Route::get('/budget','BudgetController@budgetShow')->name('budgetShow');
//--------------------------------------------------------------------------------------
//---------------------------------Product routes---------------------------------------
Route::get('/product','ProductController@productShow')->name('productShow');
Route::get('/productAdd','ProductController@productAdd')->name('productAdd');
Route::post('/productAddSubmit','ProductController@productAddSubmit')->name('productAddSubmit');
Route::get('/productDelete/{ID}','ProductController@productDelete')->name('productDelete');
Route::get('/productUpdate/{ID}','ProductController@productUpdate')->name('productUpdate');
Route::post('/productUpdate/{ID}/productUpdateSubmit','ProductController@productUpdateSubmit')->name('productUpdateSubmit');