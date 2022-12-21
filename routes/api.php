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
Route::any("getobuserverconfig", "ApiV1Controller@getObuServerConfig");
Route::any("/checkupdate", "ApiV1Controller@checkUpdate");

Route::any("/clientlogin", "ApiV1Controller@clientLogin");

Route::any("updateforecast", "ApiV1Controller@updateForecast");

Route::any("/logs", "ApiV1Controller@logs");

Route::any("/resetpassword", "ApiV1Controller@resetPassword");

Route::any("/bdmapjs", "ApiV1Controller@bdmapJs");
Route::any("/tdtmapjs", "ApiV1Controller@tdtmapJs");

Route::any("/rsumgruploadfile", "ApiV1Controller@uploadFile");

Route::any("/getmanagers", 'ApiV1Controller@getManagers');
Route::any("/uploadlocations", 'ApiV1Controller@uploadLocations');
Route::any("/uploadwarningrecords", 'ApiV1Controller@uploadWarningRecords');

Route::any("/clientclockin", 'ApiV1Controller@clientClockIn');
Route::any("/getclockinhistory", 'ApiV1Controller@getClockInHistory');
//***************************OBU相关*****************************************
Route::any("/registerobu", "ApiV1Controller@registerObu");
Route::any("/getroadinfo", 'ApiV1Controller@getRoadInfo');



//***************************雷视相关*****************************************
Route::any("/uploadaidevents", "ApiV1Controller@uploadAidEvents");
Route::any("/uploadanprevents", "ApiV1Controller@uploadAnprEvents");
Route::any("/uploadtpsevents", "ApiV1Controller@uploadTpsEvents");
Route::any("/uploadtpslaneevents", "ApiV1Controller@uploadTpsLaneEvents");
Route::any("/uploadtpsrealtimeevents", "ApiV1Controller@uploadTpsRealtimeEvents");
Route::any("/uploadvehdetectionevents", "ApiV1Controller@uploadVehDetectionEvents");