<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once "../app/Constant.php";

use App\Device;
use App\ObuDevice;
use App\WarningInfo;
use App\RoadCoordinate;
use App\RadarDevice;
use App\UploadFile;

use DB;

class DashboardController extends Controller
{
    function dashboard(Request $request){
        $obus = ObuDevice::orderBy("id", "desc")
            ->limit(6)
            ->get();
        
        $radars = RadarDevice::orderBy("id", "desc")
                ->limit(6)
                ->get();
        
        $default_lat = env("dashboard_default_lat", 36.183753);
        $default_lng = env("dashboard_default_lng", 120.339217);
        $default_zoom = env("dashboard_map_defaultzoom", 15); 
        
        if($default_lat == ""){
            $default_lat = env("home_default_lat", 36.183753);
        }
        if($default_lng == ""){
            $default_lng = env("home_default_lng", 120.339217);
        }
        if($default_zoom == ""){
            $default_zoom = env("home_map_defaultzoom", 15);
        }
        
        return view("/layouts/dashboard", [
            'obus'=>$obus,
            'radars'=>$radars,
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,            
        ]);
    }
    
    function dashboardSummary(Request $request){
        $stats = DB::select("select * from (select " . ret_success . " as ret_code) as ret,"
                . "(select count(id) as warncount from warninginfo where endtime>now() and wistatus=1) as warnstat,"
                . "(select count(id) as vehflowcount from vehicleflow where date(created_at)=date(now())) as vehflowstat,"
                . "(select count(id) as warnrecordcount from warningrecords where date(created_at)=date(now())) as warnrecordstat,"
                . "(select count(id) as speedcount from aidevents where aidevent='speed' and date(eventtime)=date(now())) as speedstat,"
                . "(select count(id) as lowspeedcount from aidevents where aidevent='lowSpeed' and date(eventtime)=date(now())) as lowspeedstat,"
                . "(select count(id) as abandonedobjectcount from aidevents where aidevent='abandonedObject' and date(eventtime)=date(now())) as abandonedobjectstat");
        
        return json_encode($stats);        
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
            $sqlstr = " select count(vf.id) as vehcount,hour(vf.created_at) as vfhour from  vehicleflow vf "
                    . " where  date(vf.created_at)>='" . $searchtodate . "' and date(vf.created_at)<='" . $searchtodate . "' "
                    . " group by hour(vf.created_at) " ;

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
        $latestevents = DB::select("select winame,time(created_at) as eventtime from warninginfo where endtime>now() order by id desc limit 7");
        
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
    
    function dashboardTestLatlng(Request $request){
        $coords = RoadCoordinate::where("roadid", 14)
                ->select("lat", "lng")
                ->orderBy("id", "asc")
                ->get();
        
        $arr = array("retcode"=>ret_success, "coords"=>$coords);
        return json_encode($arr);
    }
    
    function dashboardVehicles(Request $request){
        $searchdate = date("Y-m-d H:i:s" , strtotime("-10 second"));
        
//        echo $searchdate;
        
        $sqlstr = "select vd.macaddr, vd.id, vd.uuid, vd.targettype, vd.targetid, vd.longitude, vd.latitude, vd.plateno, vd.speed, vd.laneno, "
                . "vd.radardetected, vd.vehrotation, vd.detecttime, vd.positiony, vd.vehicletype, rd.devicecode from "
                . "(select macaddr, targetid, max(detecttime) as maxtime from vehdetection group by macaddr, targetid) maxtime  "
                . "left join vehdetection vd on vd.detecttime=maxtime.maxtime and vd.targetid=maxtime.targetid "
                . "left join radardevices as rd on rd.macaddrint=vd.macaddr "
                . "where maxtime.maxtime > '" . $searchdate . "' "; // and targettype='vehicle'
        $vehicles = DB::select($sqlstr);
//        echo $sqlstr;
        $arr = array("retcode"=>ret_success, "vehicles"=>$vehicles, "searchdate"=>$searchdate);
        return json_encode($arr);
    }
    
    function dashboardRadarVision(Request $request){        
        $radars = RadarDevice::orderBy("id", "desc")
                ->get();
        
        if(count($radars) == 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"没有雷视设备！");
            return json_encode($arr);
        }
        
        $searchdate = date("Y-m-d H:i:s" , strtotime("-100 hour"));
        //echo $searchdate;
        
        $sqlstr = "select vd.uuid, vd.targettype, vd.targetid, vd.plateno, vd.speed, vd.laneno, "
                . "vd.positionx, vd.positiony, vd.radardetected, vd.detecttime from "
                . "(select macaddr, targetid, max(detecttime) as maxtime from vehdetection group by macaddr, targetid) maxtime  "
                . "left join vehdetection vd on vd.detecttime=maxtime.maxtime and vd.targetid=maxtime.targetid "
                . "where maxtime.maxtime > '" . $searchdate . "' and vd.macaddr=" . $radars[0]->macaddrint; // and targettype='vehicle'
        $vehicles = DB::select($sqlstr);
        
        $arr = array("retcode"=>ret_success, "radar"=>$radars[0], "vehicles"=>$vehicles);
        return json_encode($arr);
    } 
    
    function getObuNewVideo(Request $request){
        if($request->obuid == ""){
            return "缺少参数！";
        }
        
        $updfiles = UploadFile::where("obuid", $request->obuid)
                ->where("filetype", upd_file_obu_video)
                ->where("medialen", ">", 3000) //只要大于3秒的视频
                ->orderBy("id", "desc")
                ->limit(1)
                ->get();
        
        if(count($updfiles) == 0){
            return "";
        }
        
        return redirect(upload_folder_short . "obuvideos/" . $request->obuid . "/" . $updfiles[0]->filename);
    }
    
    function bdmapSummary(Request $request){
        $rdevices = Device::orderBy("devices.id")
                ->select("devices.id", "devices.devicecode", "devices.rsulat", "devices.rsulng", "rsu_s.score")
                ->leftjoin("RSU_status as rsu_s", "rsu_s.device_ID", "=", "devices.devicecode")
                ->get();
        
        $odevices = ObuDevice::orderBy("id")
                ->select("id", "obuid", "obulatitude", "obulongtitude", "positiontime", "obudirection")
                ->get();
        
        $warnings = WarningInfo::orderBy("id")
                ->select("winame", "startlat", "startlng", "stoplat", "stoplng")
                ->where("created_at", ">=", date("Y-m-d"))
                ->where("wistatus", "1")
                ->get();
        
        $radarsql = "select rd.id, rd.devicecode, rd.lanenumber, rd.status, rd.lat, rd.lng, tpsr1.timeheadway, tpsr1.spaceheadway, "
                . " tpsr1.laneno, tpsr1.lanestate, tblavgspeed.avgspeed from radardevices rd left join (select tpsr.timeheadway, tpsr.spaceheadway, "
                . " tpsr.laneno, tpsr.lanestate, tpsr.macaddr from "
                . " (select macaddr, max(eventtime) as eventtime from tpsrealtimeevents  group by macaddr) as tpsmax "
                . " left join tpsrealtimeevents tpsr on tpsr.eventtime=tpsmax.eventtime) as tpsr1 on rd.macaddrint=tpsr1.macaddr"
                . " left join (select macaddr,avg(vehspeed) as avgspeed from anprevents where vehspeed<>0 and date(eventtime)=date(now()) group by macaddr) as tblavgspeed on tblavgspeed.macaddr=rd.macaddrint ";
        $radars = DB::select($radarsql);
//        $radars = RadarDevice::orderBy("id")
//                ->where("status", "1")
//                ->select("id", "devicecode", "lat", "lng")
//                ->get();
        
        $arr = array("retcode"=>ret_success, "rsudevices"=>$rdevices, "obudevices"=>$odevices,
            "warnings"=>$warnings, "radars"=>$radars);
        return json_encode($arr);
    }
}
