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
//----------------------------------------------------------------------------------------
//----------------------------------Products routes-------------------------------------------
Route::get('/raw','RawController@rawShow')->name('rawShow');
Route::get('/rawAdd','RawController@rawAdd')->name('rawAdd');
Route::post('/rawAddSubmit','RawController@rawAddSubmit')->name('rawAddSubmit');
Route::get('/rawDelete/{ID}','RawController@rawDelete')->name('rawDelete');
Route::get('/rawUpdate/{ID}','RawController@rawUpdate')->name('rawUpdate');
Route::post('/rawUpdate/{ID}/rawUpdateSubmit','RawController@rawUpdateSubmit')->name('rawUpdateSubmit');
//---------------------------------------------------------------------------------------
//----------------------------------Ingredient routes------------------------------------
Route::get('/ingredient','IngredientController@ingredientShow')->name('ingredientShow');
Route::get('/ingredientAdd','IngredientController@ingredientAdd')->name('ingredientAdd');
Route::post('/ingredientAddSubmit','IngredientController@ingredientAddSubmit')->name('ingredientAddSubmit');
Route::get('/ingredientDelete/{ID}','IngredientController@ingredientDelete')->name('ingredientDelete');
Route::get('/ingredientUpdate/{ID}','IngredientController@ingredientUpdate')->name('ingredientUpdate');
Route::post('/ingredientUpdate/{ID}/ingredientUpdateSubmit','IngredientController@ingredientUpdateSubmit')->name('ingredientUpdateSubmit');
//---------------------------------------------------------------------------------------
//----------------------------------Purchas routes---------------------------------------
Route::get('/purchas','PurchasController@purchasShow')->name('purchasShow');
Route::get('/purchasAdd','PurchasController@purchasAdd')->name('purchasAdd');
Route::post('/purchasAddSubmit','PurchasController@purchasAddSubmit')->name('purchasAddSubmit');
Route::get('/purchasDelete/{ID}','PurchasController@purchasDelete')->name('purchasDelete');
Route::get('/purchasUpdate/{ID}','PurchasController@purchasUpdate')->name('purchasUpdate');
Route::post('/purchasUpdate/{ID}/purchasUpdateSubmit','PurchasController@purchasUpdateSubmit')->name('purchasUpdateSubmit');
//---------------------------------------------------------------------------------------
//----------------------------------SalaryPayment routes---------------------------------
Route::get('/salarypayment','SalaryPaymentController@salaryPaymentShow')->name('salaryPaymentShow');
Route::get('/salarypaymentAdd','SalaryPaymentController@salaryPaymentAdd')->name('salaryPaymentAdd');
Route::get('/findSalary','EmployeeController@findSalary');
Route::get('/findBonus','EmployeeController@findBonus');
Route::post('/salarypaymentAddSubmit','SalaryPaymentController@salaryPaymentAddSubmit')->name('salaryPaymentAddSubmit');
Route::get('/salarypaymentUpdate/{ID}','SalaryPaymentController@salaryPaymentUpdate')->name('salaryPaymentUpdate');
Route::post('/salarypaymentAddSubmit/{ID}/salaryPaymentUpdateSubmit','SalaryPaymentController@salaryPaymentUpdateSubmit')->name('salaryPaymentUpdateSubmit');
Route::get('/salarypaymentDelete/{ID}','SalaryPaymentController@salaryPaymentDelete')->name('salaryPaymentDelete');
//---------------------------------------------------------------------------------------
//----------------------------------Production routes------------------------------------
Route::get('/production','ProductionController@productionShow')->name('productionShow');
Route::get('/productionAdd','ProductionController@productionAdd')->name('productionAdd');
Route::post('/productionAddSubmit','ProductionController@productionAddSubmit')->name('productionAddSubmit');
Route::get('/productionUpdate/{ID}','ProductionController@saleUpdate')->name('productionUpdate');
Route::post('/productionUpdate/{ID}/productionUpdateSubmit','ProductionController@saleUpdateSubmit')->name('productionUpdateSubmit');
Route::get('/productionDelete/{ID}','ProductionController@productionDelete')->name('productionDelete');
//----------------------------------------------------------------------------------------
//----------------------------------Sale routes-------------------------------------------
Route::get('/sale','SaleController@saleShow')->name('saleShow');
Route::get('/saleAdd','SaleController@saleAdd')->name('saleAdd');
Route::post('/saleAddSubmit','SaleController@saleAddSubmit')->name('saleAddSubmit');
Route::get('/saleDelete/{ID}','SaleController@saleDelete')->name('saleDelete');
Route::get('/saleUpdate/{ID}','SaleController@saleUpdate')->name('saleUpdate');
Route::post('/saleUpdate/{ID}/saleUpdateSubmit','SaleController@saleUpdateSubmit')->name('saleUpdateSubmit');
//----------------------------------Expense routes---------------------------------------
Route::get('/expense','CostAccountingController@costAccountingShow')->name('expensesShow');
Route::get('/expenseAdd','CostAccountingController@costAccountingAdd')->name('expensesAdd');
Route::post('/expenseAddSubmit','CostAccountingController@costAccountingAddSubmit')->name('expenseAddSubmit');
Route::get('/expenseDelete/{ID}','CostAccountingController@costAccountingDelete')->name('expensesDelete');
Route::get('/expenseUpdate/{ID}','CostAccountingController@costAccountingUpdate')->name('expensesUpdate');
Route::post('/expenseUpdate/{ID}/expenseUpdateSubmit','CostAccountingController@costAccountingUpdateSubmit')->name('expensesUpdateSubmit');
Route::get('/findSum','CostAccountingController@findSum');