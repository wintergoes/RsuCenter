<?php

use Illuminate\Http\Request;

Route::any("/getobus", "DataApiController@getObus");
Route::any("/getoburoute", "DataApiController@getObuRoute");

Route::any("/getvehicles", "DataApiController@getVehicles");
Route::any("/getaidevents", "DataApiController@getAidEvents");
Route::any("/getforecast", "DataApiController@getForecast");
Route::any("/getwarnings", "DataApiController@getWarnings");
Route::any("/gettrafficsigns", "DataApiController@getTrafficSigns");
Route::any("/getclockins", "DataApiController@getClockins");
Route::any("/getusers", "DataApiController@getUsers");
Route::any("/getrsudevices", "DataApiController@getRsuDevices");
Route::any("/getobudevices", "DataApiController@getObuDevices");
Route::any("/getradardevices", "DataApiController@getRadarDevices");
Route::any("/getobuvideos", "DataApiController@getObuVideos");
Route::any("/getradarvideos", "DataApiController@getRadarVideos");

Route::any("/dataapilogin", "DataApiController@dataapiLogin");
Route::any("/getappnotification", "DataApiController@getAppNotification");