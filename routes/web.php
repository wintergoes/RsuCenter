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

Auth::routes();

Route::get('/', function () {
    return redirect("/home");
});

//*******************************管理员相关**********************************************
Route::get('/users', 'UserController@index');
Route::get('/adduser', 'UserController@addUser');
Route::post('/addusersave', 'UserController@addUserSave');
Route::get('/edituser', 'UserController@editUser');
Route::post('/editusersave', 'UserController@editUserSave');
Route::get('/deleteuser', 'UserController@deleteUser');
Route::get('/resetpassword', 'UserController@resetPassword');
Route::post('/resetpasssave', 'UserController@resetPassSave');

//*******************************用户组相关**********************************************
Route::get('/usergroups', 'UserGroupController@index');
Route::get('/addusergroup', 'UserGroupController@addUserGroup');
Route::post('/addusergroupsave', 'UserGroupController@addUserGroupSave');
Route::get('/editusergroup', 'UserGroupController@editUserGroup');
Route::post('/editusergroupsave', 'UserGroupController@editUserGroupSave');
Route::get('/deleteusergroup', 'UserGroupController@deleteUserGroup');

//*******************************设备管理**********************************************
Route::any('/devices', 'DeviceController@index');
Route::any('/deletedevice', 'DeviceController@deleteDevice');

Route::get("/devicelogs", "DeviceLogController@index");
Route::get("/dllogfile", "ApiV1Controller@dlLogFile");
Route::any("/devicelogfilecontent", "DeviceLogController@logfileContent");
Route::any("/bsmlogfilecontent", "DeviceLogController@logfileContent");
Route::get("/bsmlogs", "DeviceLogController@index");

Route::get('/home', 'HomeController@index');
