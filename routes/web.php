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

Route::get('cylist', 'CyController@index');
Route::get('addcy', 'CyController@addcy');
Route::post('addcysave', 'CyController@addcysave');
Route::get('editcy', 'CyController@editcy');
Route::post('editcysave', 'CyController@editcySave');
Route::get('createcyupdate', 'CyController@createCyUpdate');
Route::post('createcyupdatesave', 'CyController@createCyUpdateSave');
Route::get('deletecy', 'CyController@deleteCy');

Route::get('/api/getnextversion', 'CyupdateController@getNextVersion');