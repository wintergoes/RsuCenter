<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::any("/getlog", "ApiV1Controller@getLog");
Route::any("/getbsmlog", "ApiV1Controller@getBsmLog");
Route::get("/importlog", "ApiV1Controller@importLog");
Route::get("/importbsmlog", "ApiV1Controller@importBsmLog");
Route::any("getserverconfig", "ApiV1Controller@getServerConfig");
Route::any("/checkupdate", "ApiV1Controller@checkUpdate");

Route::any("/clientlogin", "ApiV1Controller@clientLogin");

Route::any("/logs", "ApiV1Controller@logs");

Route::any("/resetpassword", "ApiV1Controller@resetPassword");


Route::any("/bdmapjs", "ApiV1Controller@bdmapJs");