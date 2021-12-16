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

Route::resource('user','UsersController')->middleware('auth');

// -----------  Position Routes  --------------  //
Route::get('position', 'PositionController@index');
Route::post('addPosition', 'PositionController@store');
Route::get('/editpos/{id}','PositionController@edit');
Route::put('/updatepos','PositionController@update');
Route::get('/deletepos/{id}', 'PositionController@destroy');

// -----------  Department Routes  --------------  //
Route::get('/department', 'DepartmentController@index');
Route::post('addDepartment', 'DepartmentController@store');
Route::get('/editdep/{id}','DepartmentController@edit');
Route::put('/updatedep','DepartmentController@update');
Route::get('/deletedep/{id}', 'DepartmentController@destroy');

// -----------  Employees Routes  --------------  //
Route::resource('/employee', 'EmployeeController');
Route::resource('/allemployee', 'AllEmployeeController');
Route::get('/show/{id}', 'ViewController@show');
Route::get('/delete/{id}', 'AllEmployeeController@destroy');
Route::get('/download/{id}', 'DownloadController@download');

// -----------  Attendance Routes  --------------  //
Route::resource('/attendance', 'AttendanceController');
Route::resource('/updateAttendance','AttendanceUpdateController');
Route::put('/test','attupdateController@update');
Route::resource('/report','ReportController');

// -----------  Account Routes  --------------  //
Route::get('/account', 'AccountController@index');
Route::post('addAccount', 'AccountController@store');
Route::get('/editAcc/{id}','AccountController@edit');
Route::put('/updateAcc','AccountController@update');
Route::get('/deleteAcc/{id}', 'AccountController@destroy');

// -----------  Deposit Routes  --------------  //
Route::get('/deposit', 'DepositController@index');
Route::post('addDeposit', 'DepositController@store');
Route::get('/editDeposit/{id}','DepositController@edit');
Route::put('/updateDeposit','DepositController@update');
Route::get('/deleteDeposit/{id}', 'DepositController@destroy');

// -----------  PayRoll Routes  --------------  //
Route::get('/pay', 'PayRollController@index');
Route::post('/addPay', 'PayRollController@store');
