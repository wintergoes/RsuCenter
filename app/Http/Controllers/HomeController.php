<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once "../app/Constant.php";

use App\Device;
use App\ObuDevice;
use App\WarningInfo;

use DB;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $obus = ObuDevice::orderBy("id", "desc")
                ->limit(6)
                ->get();
        
        $default_lat = env("home_default_lat", 36.183753);
        $default_lng = env("home_default_lng", 120.339217);
        $default_zoom = env("home_map_defaultzoom", 15);
        
        return view('/layouts/summary', [
            "obus"=>$obus,
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,
        ]);
    }
    
    public function dataSummary(Request $request){
        $stats = DB::select("select * from (select " . ret_success . " as ret_code) as ret,"
                . "(select count(id) as rsucount from devices) as rsustat, "
                . "(select count(id) as obucount from obudevices) as obustat,"
                . "(select count(id) as warncount from warninginfo where wistatus=1) as warnstat");
        
        return json_encode($stats);
    }
    
    function bdmapSummary(Request $request){
        $rdevices = Device::orderBy("id")
                ->select("id", "devicecode", "rsulat", "rsulng")
                ->get();
        
        $odevices = ObuDevice::orderBy("id")
                ->select("id", "obuid", "obulatitude", "obulongtitude")
                ->get();
        
        $warnings = WarningInfo::orderBy("id")
                ->select("winame", "startlat", "startlng", "stoplat", "stoplng")
                ->get();
        
        $arr = array("retcode"=>ret_success, "rsudevices"=>$rdevices, "obudevices"=>$odevices,
            "warnings"=>$warnings);
        return json_encode($arr);
    }
    
    function dashboard(Request $request){
        $obus = ObuDevice::orderBy("id", "desc")
            ->limit(6)
            ->get();
        
        return view("/layouts/dashboard", [
            'obus'=>$obus
        ]);
    }
    
    function dashboardSummary(Request $request){
        
    }
    
    function dashboardVehFlow(Request $request){
        $reqcount = $request->reqcount;
        if($reqcount == ""){
            $reqcount = 7;
        }
        
        $arr = array();
        for($i = 1; $i <= $reqcount; $i++){
            $str = "05.".$i;
            $arrinner = array("date"=>$str, "value"=>rand(100, 10000));
            array_push($arr, $arrinner);
        }
        
        $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);
        return json_encode($arr_vehflows);
    }
    
    function dashboardDevices(Request $request){
        $devices = DB::select("select id, devicecode,1 as dtype, 1 as dstatus from devices "
                . " union all select id,obuid,2 as dtype, 0 as dstatus from obudevices;");
        
        $arr = array("retcode"=>ret_success, "devices"=>$devices);
        return json_encode($arr);
    }    
}
