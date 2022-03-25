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
    return redirect('/home');
});

Auth::routes();

//*******************************管理员相关**********************************************
Route::get('/users', 'UserController@index');
Route::get('/adduser', 'UserController@addUser');
Route::post('/addusersave', 'UserController@addUserSave');
Route::get('/edituser', 'UserController@editUser');
Route::post('/editusersave', 'UserController@editUserSave');
Route::get('/deleteuser', 'UserController@deleteUser');
Route::get('/resetpassword', 'UserController@resetPassword');
Route::post('/resetpasssave', 'UserController@resetPassSave');

Route::get("/devicelogs", "DeviceLogController@index");
Route::get("/dllogfile", "ApiV1Controller@dlLogFile");
Route::any("/logfilecontent", "DeviceLogController@logfileContent");

Route::get("/bsmlogs", "DeviceLogController@index");

Route::get('/home', 'HomeController@index');
