<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TrafficSign;
use App\TrafficSignClass;
use App\RoadCoordinate;

use Auth;
use DB;

require_once '../app/Constant.php';

class TrafficSignController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
 
    function index(Request $request){
        $signs = TrafficSign::orderBy("trafficsigns.id", "desc")
                ->select("trafficsigns.id", "trafficsigns.tscid", "trafficsigns.tsname", "trafficsigns.tslat", 
                        "trafficsigns.tslng", "trafficsigns.created_at", "trafficsigns.tsparam1", 
                        "trafficsigns.starttime", "trafficsigns.endtime",
                        "u.realname")
                ->leftjoin("trafficsignclasses as tsc", "trafficsigns.tscid", "=", "tsc.id")
                ->leftjoin("users as u", "u.id", "=", "trafficsigns.tsmanager")
                ->paginate(30);
        
        
        return view("/road/trafficsigns", [
           "trafficsigns"=>$signs 
        ]);
    }
    
    function addTrafficSign(Request $request){
        $tscs = TrafficSignClass::orderBy("id", "asc")
                ->get();
        
        return view("/road/addtrafficsign", [
            "tscs"=>$tscs
        ]);
    }
    
    function addTrafficSignSave(Request $request){
        $lat = 0;
        if($request->tslat != ""){
            $lat = $request->tslat;
        }
        
        $lng = 0;
        if($request->tslng != ""){
            $lng = $request->tslng;
        }
        
        $starttime = "";
        if($request->starttime != ""){
            $starttime = $request->starttime;
        }
        
        $endtime = "";
        if($request->endtime != ""){
            $endtime = $request->endtime;
        }        
        
        $ts = new TrafficSign();
        $ts->tscid = trim($request->tscid);
        $ts->tsname = $request->tsname;
        $ts->tslat = $lat;
        $ts->tslng = $lng;
        $ts->tsmanager = Auth::user()->id;
        $ts->tsparam1 = $request->tsparam1;
        $ts->starttime = $starttime;
        $ts->endtime = $endtime; 
        $ts->save();
        
        return redirect("trafficsigns");
    }    
    
    function editTrafficSign(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $trafficsigns = TrafficSign::where("id", $request->id)
                ->get();
        if(count($trafficsigns) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"数据不存在！",
            ]);
        }
        
        $roadsStart = RoadCoordinate::where("roadcoordinates.minlat", "<", $trafficsigns[0]->tslat)
                ->where("roadcoordinates.maxlat", ">", $trafficsigns[0]->tslat)
                ->where("roadcoordinates.minlng", "<", $trafficsigns[0]->tslng)
                ->where("roadcoordinates.maxlng", ">", $trafficsigns[0]->tslng)               
                ->select("r.roadname", "roadcoordinates.lanetype", "roadcoordinates.laneno")
                ->leftjoin("roads as r", "roadcoordinates.roadid", "=", "r.id")                
                ->distinct()
                ->get();         
        
        $tscs = TrafficSignClass::orderBy("id", "asc")
                ->get();        
        
        return view("/road/addtrafficsign", [
            "trafficsign"=>$trafficsigns[0],
            "tscs"=>$tscs,
            "roadsStart"=>$roadsStart
        ]);
    }
    
    function editTrafficSignSave(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $trafficsigns = TrafficSign::where("id", $request->id)
                ->get();
        if(count($trafficsigns) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"数据不存在！",
            ]);
        }
        
        $ts = $trafficsigns[0];
        $ts->tscid = trim($request->tscid);
        $ts->tsname = $request->tsname;
        $ts->tslat = $request->tslat;
        $ts->tslng = $request->tslng;
        $ts->tsmanager = Auth::user()->id;
        $ts->tsparam1 = $request->tsparam1;
        $ts->starttime = $request->starttime;
        $ts->endtime = $request->endtime;          
        $ts->save();
        
        return redirect("trafficsigns");
    }     
    
    function deleteTrafficSign(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        DB::delete("delete from trafficsigns where id=" . $request->id);
        return redirect("trafficsigns");
    }
    

    function sendRts2Rsu(Request $request){
        $trafficsigns = TrafficSign::whereraw("trafficsigns.endtime > now()")
                ->whereraw("id not in (select relatedid from rsisendrecords where sendtype=" . rsi_type_rts . ")")
                ->get();
        
        $default_lat = env("dashboard_default_lat", 36.183753);
        $default_lng = env("dashboard_default_lng", 120.339217);
        $default_zoom = env("dashboard_map_defaultzoom", 15);         
        
        return view("/road/sendrts2rsu", [
            "trafficsigns"=>$trafficsigns,
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,              
        ]);
    }
    
    function sendRts2RsuSave(Request $request){
        $selRsu = $request->selectedRsu;
        $rsus = DB::select("SELECT * FROM device_info_connect where device_id='" . $selRsu . "' order by con_datetime desc limit 1");
        if(count($rsus) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"RSU在数据库中不存在！",
            ]); 
        }
        
        if($rsus[0]->Is_online != "1"){
            return view('/other/simplemessage', [
                'simplemessage'=>"设备" . $selRsu . "不在线！",
            ]);
        }
        
        $inputsigns = $request->signs;
        $searchsigns = "";
        foreach($inputsigns as $sign){
            if($searchsigns == ""){
                $searchsigns = $sign;
            } else {
                $searchsigns = $searchsigns . "," . $sign;
            }            
        }
        
        if($searchsigns == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"您没有选择事件！",
            ]);
        }
        
        $maxreqno = DB::select("select max(reqno) as maxReqNo from (select convert(request_no, UNSIGNED INTEGER) AS reqno FROM device_info_request) as request");
        $reqNo = $maxreqno[0]->maxReqNo + 1;
        
        $trafficsigns = TrafficSign::whereRaw("id in (" . $searchsigns . ")")
                ->get();
        
        $rtes = array();
        $yearstart = strtotime(date("Y") . "-01-01 00:00:00");
        foreach($trafficsigns as $sign){
            $starttime = strtotime($sign->starttime);
            $endtime = strtotime($sign->endtime);
            
            $startminute = round(($starttime - $yearstart) / 60);
            $endminute = round(($endtime - $yearstart) / 60);
            $nowminute = round((time() - $yearstart) / 60);
            if($endminute > 527040){
                $endminute = 527040;
            }
            
            $signPos = array("offsetLL"=>array("choiceID"=>7, "position_LatLon"=>array("long"=>$sign->tslng * 1000000, "lat"=>$sign->tslat * 1000000)), "offsetV"=>null);
            $timeDetails = array("starttime"=>$startminute, "endTime"=>$endminute, "endTimeConfidence"=>null);
            
            $rtsid = $sign->id % 255;
            
            $winfoitem = array("rtsId"=>$rtsid, "signType"=>$sign->tscid, 
                "signPos"=>$signPos, "timeDetails"=>$timeDetails);
            array_push($rtes, $winfoitem);
        }
        
        $refpos = array("lat"=>floatval($rsus[0]->RSU_lat * 1000000), "long"=>floatval($rsus[0]->RSU_lng * 1000000), "elevation"=>0);
        $rsivalue = array("tag"=>$reqNo, "msgCnt"=>0, "moy"=>$nowminute, "id"=>$selRsu, "refPos"=>$refpos, "rtes"=>null, "rtss"=>$rtes);
        $arr = array("type"=>"rts", "value"=>$rsivalue);
        
        $reqJson = json_encode($arr);
//        echo $reqJson;
        
        $rtestarttime = strtotime($request->starttime);
        $rteendtime = strtotime($request->endtime);
        
        $rtestarttime_minute = round(($rtestarttime - $yearstart) / 60);
        $rteendtime_minute = round(($rteendtime - $yearstart) / 60);
        
        DB::update("update device_info_request set deleted=1 where request_type='RTS' and device_id='" . $selRsu . "'");
        
        $insertsql = "insert into device_info_request (log_radom, device_id, request_datetime, request_type, request_no, request_JSON, " 
            . " request_start_time, request_end_time ) values('" . $rsus[0]->log_radom . "', '"
            . $selRsu . "', now(), 'RTS', '" . $reqNo . "', '" . $reqJson . "', " . $rtestarttime_minute . ", " . $rteendtime_minute . ")";
        
        DB::insert($insertsql);
        
        return view('/other/simplemessage', [
            'simplemessage'=>"下发成功！",
        ]);
    }    
}
