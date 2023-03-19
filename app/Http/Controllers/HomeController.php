<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once "../app/Constant.php";

use App\Device;
use App\ObuDevice;
use App\WarningInfo;
use App\RoadCoordinate;
use App\RadarDevice;

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
        
        $radars = RadarDevice::orderBy("id", "desc")
                ->get();
        
        return view('/layouts/summary', [
            "obus"=>$obus,
            "radars"=>$radars,
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,
        ]);
    }
    
    public function dataSummary(Request $request){
        $stats = DB::select("select * from (select " . ret_success . " as ret_code) as ret,"
                . "(select count(id) as rsucount from devices) as rsustat, "
                . "(select count(id) as obucount from obudevices) as obustat,"
                . "(select count(id) as warncount from warninginfo where wistatus=1) as warnstat,"
                . "(select count(id) as vehflowcount from vehicleflow where created_at>=date(now())) as vehflowstat,"
                . "(select count(id) as aidcount from aidevents where eventtime_date=date(now())) as aidstat,"
                . "(select count(id) as warnrecordcount from warningrecords where created_at>=date(now())) as warnrecordstat");
        
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
                ->where("created_at", ">=", date("Y-m-d"))
                ->where("wistatus", "1")
                ->get();
        
        $radarsql = "select rd.id, rd.devicecode, rd.lanenumber, rd.status, rd.lat, rd.lng, tpsr1.timeheadway, tpsr1.spaceheadway, tpsr1.laneno, tpsr1.lanestate from radardevices rd left join (select tpsr.timeheadway, tpsr.spaceheadway, tpsr.laneno, tpsr.lanestate, tpsr.macaddr from (select macaddr, max(eventtime) as eventtime from tpsrealtimeevents  group by macaddr) as tpsmax left join tpsrealtimeevents tpsr on tpsr.eventtime=tpsmax.eventtime) as tpsr1 on rd.macaddrint=tpsr1.macaddr";
        $radars = DB::select($radarsql);
//        $radars = RadarDevice::orderBy("id")
//                ->where("status", "1")
//                ->select("id", "devicecode", "lat", "lng")
//                ->get();
        
        $arr = array("retcode"=>ret_success, "rsudevices"=>$rdevices, "obudevices"=>$odevices,
            "warnings"=>$warnings, "radars"=>$radars);
        return json_encode($arr);
    }
    
    function homeAidEvents(Request $request){
        $sqlstr = "select eventtime, aidevent, plate from aidevents where eventtime_date=date(now()) order by id desc"; //
        
        $aidevents = DB::select($sqlstr);
        
        $arr = array("retcode"=>ret_success, "aidevents"=>$aidevents);
        return json_encode($arr);
    }
}
