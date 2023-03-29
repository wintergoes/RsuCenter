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

//***************************管理员相关*****************************************
Route::get('/users', 'UserController@index');
Route::get('/adduser', 'UserController@addUser');
Route::post('/addusersave', 'UserController@addUserSave');
Route::get('/edituser', 'UserController@editUser');
Route::post('/editusersave', 'UserController@editUserSave');
Route::get('/deleteuser', 'UserController@deleteUser');
Route::get('/resetpassword', 'UserController@resetPassword');
Route::post('/resetpasssave', 'UserController@resetPassSave');

//**************************用户组相关******************************************
Route::get('/usergroups', 'UserGroupController@index');
Route::get('/addusergroup', 'UserGroupController@addUserGroup');
Route::post('/addusergroupsave', 'UserGroupController@addUserGroupSave');
Route::get('/editusergroup', 'UserGroupController@editUserGroup');
Route::post('/editusergroupsave', 'UserGroupController@editUserGroupSave');
Route::get('/deleteusergroup', 'UserGroupController@deleteUserGroup');

//***************************RSU设备管理****************************************
Route::any('/devices', 'DeviceController@index');
Route::any('/rsusettings', 'DeviceController@rsuSettings');
Route::any('/editdevice', 'DeviceController@editRsuDevice');
Route::any('/editdevicesave', 'DeviceController@editRsuDeviceSave');
Route::any('/deletedevice', 'DeviceController@deleteDevice');
Route::any("/getrsuonline", "DeviceController@getRsuOnline");
Route::any("/rsusendrecords", "DeviceController@rsuSendRecords");

//***************************OBU设备管理****************************************
Route::any('/obudevices', 'ObuDeviceController@index');
Route::any('/obuvideos', 'UploadFileController@obuVideos');
Route::any("/editobudevice", "ObuDeviceController@editObuDevice");
Route::any("/editobudevicesave", "ObuDeviceController@editObuDeviceSave");
Route::any('/deleteobudevice', 'ObuDeviceController@deleteObuDevice');
Route::any('/obuhardwares', 'ObuDeviceController@obuHardwares');

//***************************雷视设备管理****************************************
Route::any('/radardevices', 'RadarDeviceController@index');
Route::any('/addradardevice', 'RadarDeviceController@addRadarDevice');
Route::any('/addradardevicesave', 'RadarDeviceController@addRadarDeviceSave');
Route::any('/editradardevice', 'RadarDeviceController@editRadarDevice');
Route::any('/editradardevicesave', 'RadarDeviceController@editRadarDeviceSave');
Route::any('/deleteradardevice', 'RadarDeviceController@deleteRadarDevice');
Route::any('/radarvideos', 'RadarDeviceController@radarVideos');
Route::any('/getradarvideo', 'RadarDeviceController@getRadarVideo');

//*******************************预警信息***************************************
Route::any('/warninginfo', "WarningInfoController@index");
Route::any('/addwarninginfo', "WarningInfoController@addWarninginfo");
Route::any('/addwarninginfosave', "WarningInfoController@addWarningInfoSave");
Route::any('/editwarninginfo', "WarningInfoController@editWarningInfo");
Route::any('/editwarninginfosave', "WarningInfoController@editWarningInfoSave");
Route::any('/deletewarninginfo', "WarningInfoController@deleteWarningInfo");
Route::any("/sendrte2rsu", "WarningInfoController@sendRte2Rsu");
Route::any("/sendrte2rsusave", "WarningInfoController@sendRte2RsuSave");

//*******************************交通标志信息***************************************
Route::any('/trafficsigns', "TrafficSignController@index");
Route::any('/addtrafficsign', "TrafficSignController@addTrafficSign");
Route::any('/addtrafficsignsave', "TrafficSignController@addTrafficSignSave");
Route::any('/edittrafficsign', "TrafficSignController@editTrafficSign");
Route::any('/edittrafficsignsave', "TrafficSignController@editTrafficSignSave");
Route::any('/deletetrafficsign', "TrafficSignController@deleteTrafficSign");
Route::any("/sendrts2rsu", "TrafficSignController@sendRts2Rsu");
Route::any("/sendrts2rsusave", "TrafficSignController@sendRts2RsuSave");

//*******************************数据查询***************************************
Route::any('/anprevents', "DataController@anprEvents");
Route::any('/anprdetail', "DataController@anprDetail");
Route::any('/aidevents', "DataController@aidEvents");
Route::any('/aiddetail', "DataController@aidDetail");
Route::any('/forecast', "DataController@forecast");

//**************************数据api接口用户管理*******************************
Route::any('/dataapiclients', 'DataApiClientController@index');
Route::any('/adddataapiclient', 'DataApiClientController@addDataApiClient');
Route::any('/adddataapiclientsave', 'DataApiClientController@addDataApiClientSave');
Route::any('/editdataapiclient', 'DataApiClientController@editDataApiClient');
Route::any('/editdataapiclientsave', 'DataApiClientController@editDataApiClientSave');
Route::any('/deletedataapiclient', 'DataApiClientController@deleteDataApiClient');

//*******************************统计分析***************************************
Route::any('/clockins', "ClockInController@index");
Route::any("/radareventstat", "VehicleFlowController@radarEventStat");
Route::any("/radareventtrendsummary", "VehicleFlowController@radarEventTrendSummary");
Route::any("/radareventtypestatjson", "VehicleFlowController@radarEventTypeStatJson");
Route::any("/radareventhourstat", "VehicleFlowController@radarEventHourStatJson");

Route::any("/eventstat", "WarningInfoController@eventStat");
Route::any("/eventtrendsummary", "WarningInfoController@eventTrendSummary");
Route::any("/eventtypestatjson", "WarningInfoController@eventTypeStatJson");
Route::any("/eventsourcestatjson", "WarningInfoController@eventSourceStatJson");

Route::any('/warningrecordstat', "WarningInfoController@warningRecordStat");
Route::any('/warningrecordcountstatjson', "WarningInfoController@warnRecordsCountStatJson");
Route::any("/warningrecordeventtypestatjson", "WarningInfoController@warningRecordEventTypeStatJson");
Route::any("/warningrecordeventsourcestatjson", "WarningInfoController@warningRecordEventSourceStatJson");

Route::any("/vehflowstat", "VehicleFlowController@vehflowStat");
Route::any("/vehflowstatjson", "VehicleFlowController@vehflowStatJson");
Route::any("/vehflowhourstatjson", "VehicleFlowController@vehflowHourStatJson");
Route::any("/vehflowtypestatjson", "VehicleFlowController@vehflowTypeStatJson");
Route::any("/vehflowbrandstatjson", "VehicleFlowController@vehflowBrandStatJson");

Route::any("/oburoute", "ObuRouteController@obuRoute");
Route::any("/getroutevaliddates", "ObuRouteController@getRouteValidDate");
Route::any("/getoburoutejson", "ObuRouteController@getObuRouteJson");

//*******************************道路管理***************************************
Route::any("/roads", "RoadController@index");
Route::any("/addroad", "RoadController@addRoad");
Route::any("/addroadsave", "RoadController@addRoadSave");
Route::any("/editroad", "RoadController@editRoad");
Route::any("/editroadsave", "RoadController@editRoadSave");
Route::any("/deleteroad", "RoadController@deleteRoad");
Route::any("/publishroad", "RoadController@publishRoad");
Route::any("/unpublishroad", "RoadController@unpublishRoad");

//*******************************道路坐标***************************************
Route::any("/roadcoordinates", "RoadCoordinateController@index");
Route::any("/addroadcoordinate", "RoadCoordinateController@addRoadCoordinate");
Route::any("/addroadcoordinatesave", "RoadCoordinateController@addRoadCoordinateSave");
Route::any("/importroadcoordinate", "RoadCoordinateController@importRoadCoordinate");
Route::any("/importroadcoordinatesave", "RoadCoordinateController@importRoadCoordinateSave");
Route::any("/showroadcoordinate", "RoadCoordinateController@showRoadCoordinate");
Route::any("/editroadcoordinate", "RoadCoordinateController@editRoadCoordinate");
Route::any("/editroadcoordinatesave", "RoadCoordinateController@editRoadCoordinateSave");
Route::any("/deleteroadcoordinate", "RoadCoordinateController@deleteRoadCoordinate");
Route::any("/exportroadcoordinate", "RoadCoordinateController@exportRoadCoordinate");
Route::any("/updateroadcoordinate", "RoadCoordinateController@updateRoadCoordinate");
Route::any("/addroadsectionmanually", "RoadCoordinateController@addRoadSectionManually");
Route::any("/updateallroadcoordinateproperties", "RoadCoordinateController@updateAllRoadCoordinateProperties");
Route::any("/setuproadlinks", "RoadCoordinateController@setupRoadLinks");
Route::any("/setuproadlinksave", "RoadCoordinateController@setupRoadLinkSave");
Route::any("/showconnectrsm", "RoadCoordinateController@showConnectRsm");

Route::any("/showroadareas", "MapAreaController@index");
Route::any("/addroadarea", "MapAreaController@addRoadArea");
Route::any("/addroadareasave", "MapAreaController@addRoadAreaSave");
Route::any("/editroadarea", "MapAreaController@editRoadArea");
Route::any("/editroadareasave", "MapAreaController@editRoadAreaSave");
Route::any("/updateroadarea", "MapAreaController@updateRoadArea");
Route::any("/deleteroadarea", "MapAreaController@deleteRoadArea");

Route::any("/mapfixedareas", "MapFixedAreaController@index");
Route::any("/addmapfixedarea", "MapFixedAreaController@addMapFixedArea");
Route::any("/addmapfixedareasave", "MapFixedAreaController@addMapFixedAreaSave");
Route::any("/editmapfixedarea", "MapFixedAreaController@editMapFixedArea");
Route::any("/editmapfixedareasave", "MapFixedAreaController@editMapFixedAreaSave");
Route::any("/updatemapfixedarea", "MapFixedAreaController@updateMapFixedArea");
Route::any("/deletemapfixedarea", "MapFixedAreaController@deleteMapFixedArea");

//*******************************Apis***************************************
Route::any('/homedatasummary', 'HomeController@dataSummary');
Route::any('/homebdmapsummary', 'HomeController@bdmapSummary');
Route::any('/homeaidevents', 'HomeController@homeAidEvents');

Route::get("/devicelogs", "DeviceLogController@index");
Route::get("/dllogfile", "ApiV1Controller@dlLogFile");
Route::any("/devicelogfilecontent", "DeviceLogController@logfileContent");
Route::any("/bsmlogfilecontent", "DeviceLogController@logfileContent");
Route::get("/bsmlogs", "DeviceLogController@index");

Route::get('/home', 'HomeController@index');
Route::any("/hardware", "HardwareUpdateController@index");
Route::any("/hardwareinfo", "HardwareUpdateController@hardwareInfo");
Route::any("/deletehardware", "HardwareUpdateController@deleteHardware");
Route::any("/hwupdate", "HardwareUpdateController@hardwareUpdate");
Route::any("/deletehwupdate", "HardwareUpdateController@deleteHardwareUpdate");
Route::any("/hwupdateres", "HardwareUpdateController@updateResources");
Route::any("/addhwupdateres", "HardwareUpdateController@addUpdateResource");
Route::any("/addhwupdateressave", "HardwareUpdateController@addUpdateResourceSave");
Route::any("/deletehwupdateres", "HardwareUpdateController@deleteUpdateResourceSave");

//***************************Dashboard相关*****************************************
Route::get('/dashboard', 'DashboardController@dashboard');
Route::any('/dashboardsummary', 'DashboardController@dashboardSummary');
Route::any('/dashboardvehflow', 'DashboardController@dashboardVehFlow');
Route::any('/dashboarddevices', 'DashboardController@dashboardDevices');
Route::any('/dashboardeventjson', 'DashboardController@dashboardEventJson');
Route::any('/dashboardaideventjson', 'DashboardController@dashboardAidEventJson');
Route::any("/dashboardtestlatlng", "DashboardController@dashboardTestLatlng");
Route::any("/dashboardvehicles", "DashboardController@dashboardVehicles");
Route::any("/dashboardradarvision", "DashboardController@dashboardRadarVision");
Route::any("/dashboardgetnewobuvideo", "DashboardController@getObuNewVideo");
Route::any('/dashboardbdmapsummary', 'DashboardController@bdmapSummary');
Route::any('/dashboardforecast', 'DashboardController@getForecast');

//***************************ManagerApi相关*****************************************
Route::any("/getnewobuvideo", "ManagerApiController@getObuNewVideo");
Route::any("/getroadsbycoord", "ManagerApiController@getRoadsByCoord");
Route::any("/getrafficeventclass", "ManagerApiController@getTrafficeEventClassJson");

//***************************测试相关*****************************************
Route::any("importgps2directiondatasave", "test\Gps2DirctionController@importDataSave");
Route::any("importgps2directiondata", "test\Gps2DirctionController@importData");
Route::any("showgps2directiondata", "test\Gps2DirctionController@showData");
Route::any("deletegps2directiondata", "test\Gps2DirctionController@deleteData");

Route::any("/mqtttest", function(){
    return view("/other/mqtttest");
});