<?php

use Illuminate\Http\Request;

Route::any("/getobus", "DataApiController@getObus");
Route::any("/getoburoute", "DataApiController@getObuRoute");