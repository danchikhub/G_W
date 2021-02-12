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