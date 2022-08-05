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
                . "(select count(id) as warncount from warninginfo where wistatus=1) as warnstat,"
                . "(select count(id) as vehflowcount from vehicleflow where date(created_at)=date(now())) as vehflowstat");
        
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
        
        $searchtodate = date('Y-m-d',time());
        
        if($reqcount != 0){
            $searchfromdate = "";
            if($request->has("fromdate")){
                $searchfromdate = $request->fromdate;
            }

            if($searchfromdate == ""){
                $searchfromdate = date('Y-m-d',strtotime("-" . $reqcount . " day"));
            }

            $sqlstr = " select count(vf.id) as vehcount,DATE_FORMAT(d.ddate, '%m.%d') as vfdate from tbldates d " 
                    . " left join vehicleflow vf on date(vf.created_at)=d.ddate "
                    . " where  d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' "
                    . " group by d.ddate " ;

            $arr = DB::select($sqlstr);
            $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);
        } else {
            $sqlstr = " select count(vf.id) as vehcount,DATE_FORMAT(vf.created_at, '%H') as vfhour from  vehicleflow vf "
                    . " where  date(vf.created_at)>='" . $searchtodate . "' and date(vf.created_at)<='" . $searchtodate . "' "
                    . " group by DATE_FORMAT(vf.created_at, '%H') " ;

            $arr = DB::select($sqlstr);
            $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);                        
        }
        return json_encode($arr_vehflows);
    }
    
    function dashboardDevices(Request $request){
        $devices = DB::select("select id, devicecode,1 as dtype, 1 as dstatus from devices "
                . " union all select id,obuid,2 as dtype, 0 as dstatus from obudevices;");
        
        $arr = array("retcode"=>ret_success, "devices"=>$devices);
        return json_encode($arr);
    }
    
    function dashboardEventJson(Request $request){
        $latestevents = DB::select("select winame,time(created_at) as eventtime from warninginfo order by id desc limit 7");
        
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-" . $request->statday . " day"));
        }

        $searchtodate = date('Y-m-d',time());
        
        $sqlstr = "select count(w.id) as wcount,tec.tecparentcode, tp.tecname from warninginfo w "
                . " left join trafficeventclasses tec on tec.teccode=w.teccode "
                . " left join trafficeventclasses tp on tp.teccode=tec.tecparentcode "
                . " where date(w.created_at)>='" . $searchfromdate . "' and date(w.created_at)<='" . $searchtodate . "' group by tec.tecparentcode, tp.tecname ;";
        
        $eventtypesummary = DB::select($sqlstr);
        $arr = array("retcode"=>ret_success, "summary"=>$eventtypesummary, "events"=>$latestevents);
        return json_encode($arr);        
    }
}
