<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WarningInfo;
use App\User;
use App\RoadCoordinate;
use App\Road;
use App\TrafficEventClass;
use App\ObuDevice;

use Auth;
use DB;

require_once '../app/Constant.php';

class WarningInfoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-7 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        $searchwistatus = $request->wistatus;
        
        $winfos = WarningInfo::orderBy('id', 'desc')
                ->select("warninginfo.id", "warninginfo.winame", "warninginfo.startlat",  "warninginfo.wistatus",
                        "warninginfo.startlng", "warninginfo.stoplat", "warninginfo.stoplng",
                        "warninginfo.wicreator", "warninginfo.created_at", "warninginfo.wisource", 
                        "warninginfo.wiradius", "warninginfo.wipriority", "warninginfo.starttime", "warninginfo.endtime", 
                        "u.realname",
                        "tec.tecparentcode as tecpcode", "warninginfo.teccode", "tec.tecname", DB::raw("tecp.tecname as tecpname"), DB::raw("warninginfo.endtime>now() as timevalid"))
                ->leftjoin("users as u", "warninginfo.wicreator", "=", "u.id")
                ->leftjoin("trafficeventclasses as tec", "warninginfo.teccode", "=", "tec.teccode")
                ->leftjoin("trafficeventclasses as tecp", "tec.tecparentcode", "=", "tecp.teccode");
        
        if($searchfromdate != ""){
            $winfos = $winfos->where("warninginfo.created_at", ">=" , $searchfromdate . " 00:00:00");
        }
        
        if($searchtodate != ""){
            $winfos = $winfos->where("warninginfo.created_at", "<=",  $searchtodate . " 23:59:59");
        }
        
        if($searchwistatus != "" && $searchwistatus != "-1"){
            $winfos = $winfos->where("warninginfo.wistatus", $searchwistatus);
        }
                
        $winfos = $winfos->paginate(20);
        
        return view('/road/warninginfo', [
            "warninginfo"=>$winfos,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchwistatus"=>$searchwistatus
        ]);
    }
    
    function addWarningInfo(Request $request){
        return view("/road/addwarninginfo");
    }

    function addWarningInfoSave(Request $request){
        if($request->winame == "" || $request->startlat == "" || $request->startlng == ""){
            return "缺少参数！";
        }
        
        if($request->stoplat == "" || $request->stoplng == ""){
            $request->stoplat = $request->startlat;
            $request->stoplng = $request->startlng;
        }
        
        $winfo = new WarningInfo();
        $winfo->winame = $request->winame;
        $winfo->wistatus = $request->wistatus;
        $winfo->startlat = $request->startlat;
        $winfo->startlng = $request->startlng;
        $winfo->stoplat = $request->stoplat;
        $winfo->stoplng = $request->stoplng;
        $winfo->teccode = $request->tecchild;
        $winfo->wisource = $request->wisource;
        $winfo->wicreator = Auth::user()->id;
        $winfo->wiradius = $request->wiradius;
        $winfo->wipriority = $request->wipriority;
        $winfo->starttime = $request->starttime;
        $winfo->endtime = $request->endtime;
        $winfo->save();
        
        return redirect("/warninginfo");
    }

    function editWarningInfo(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        $winfos = WarningInfo::where("warninginfo.id", $request->id)
                ->select("warninginfo.id", "warninginfo.winame", "warninginfo.startlat",  "warninginfo.wistatus",
                        "warninginfo.startlng", "warninginfo.stoplat", "warninginfo.stoplng",
                        "warninginfo.wicreator", "warninginfo.created_at", "warninginfo.wisource", 
                        "warninginfo.wiradius", "warninginfo.wipriority", "warninginfo.starttime", "warninginfo.endtime", 
                        "tec.tecparentcode", "warninginfo.teccode")                
                ->leftjoin("trafficeventclasses as tec", "warninginfo.teccode", "=", "tec.teccode")
                ->get();
        
        if(count($winfos) == 0){
            return "预警信息不存在！";
        }
        $winfo = $winfos[0];
        
        $roadsStart = RoadCoordinate::where("roadcoordinates.minlat", "<", $winfo->startlat)
                ->where("roadcoordinates.maxlat", ">", $winfo->startlat)
                ->where("roadcoordinates.minlng", "<", $winfo->startlng)
                ->where("roadcoordinates.maxlng", ">", $winfo->startlng)    
                ->where("r.published", "1")
                ->select("r.roadname", "r.published", "roadcoordinates.lanetype", "roadcoordinates.laneno")
                ->leftjoin("roads as r", "roadcoordinates.roadid", "=", "r.id")                
                ->distinct()
                ->get();        
        
        $roadsEnd = RoadCoordinate::where("roadcoordinates.minlat", "<", $winfo->stoplat)
                ->where("roadcoordinates.maxlat", ">", $winfo->stoplat)
                ->where("roadcoordinates.minlng", "<", $winfo->stoplng)
                ->where("roadcoordinates.maxlng", ">", $winfo->stoplng) 
                ->where("r.published", "1")
                ->select("r.roadname", "r.published", "roadcoordinates.lanetype", "roadcoordinates.laneno")
                ->leftjoin("roads as r", "roadcoordinates.roadid", "=", "r.id")
                ->distinct()
                ->get();                
        
        return view("/road/addwarninginfo", [
            "winfo"=>$winfo,
            "roadsStart"=>$roadsStart,
            "roadsEnd"=>$roadsEnd
        ]);
    }

    function editWarningInfoSave(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }   
        
       if($request->winame == "" || $request->startlat == "" || $request->startlng == ""){
            return "缺少参数！";
        }
        
        if($request->stoplat == "" || $request->stoplng == ""){
            $request->stoplat = $request->startlat;
            $request->stoplng = $request->stoplng;
        }
        
        $winfos = WarningInfo::where("id", $request->id)
                ->get();
        
        if(count($winfos) == 0){
            return "预警信息不存在！";
        }        
        
        $winfo = $winfos[0];
        $winfo->winame = $request->winame;
        $winfo->wistatus = $request->wistatus;
        $winfo->startlat = $request->startlat;
        $winfo->startlng = $request->startlng;
//        $winfo->stoplat = $request->stoplat;
//        $winfo->stoplng = $request->stoplng;
        $winfo->teccode = $request->tecchild;
        $winfo->wisource = $request->wisource;
        $winfo->wicreator = Auth::user()->id;
        $winfo->wiradius = $request->wiradius;
        $winfo->wipriority = $request->wipriority;
        $winfo->starttime = $request->starttime;
        $winfo->endtime = $request->endtime;        
        $winfo->save();
        
        return redirect("/warninginfo");        
    }
    
    function deleteWarningInfo(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        DB::delete("delete from warninginfo where id=" . $request->id);
        
        return redirect("/warninginfo");
    }
    
    function warningInfoStat(Request $request){
        return view("/stat/warninginfostat", [
            "searchfromdate"=>"2022-04-01",
            "searchtodate"=>"2022-04-11",
        ]);
    }
    
    function eventTrendSummary(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-7 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }
        
        $tecs = TrafficEventClass::where("tecparentcode", "=", "")
                ->select("teccode", "tecname")
                ->get();
        
        $res = array("retcode"=>ret_success);
        $datares = array();
        
        foreach($tecs as $tec){
            $sqlstr = " select w1count as eventcount,d.ddate from tbldates d " 
                    
                    . " left join (select count(w.id) as w1count, w.teccode, date(created_at) as w1date from warninginfo w "
                    . " left join trafficeventclasses tec on w.teccode=tec.teccode "
                    . " where tec.tecparentcode='" . $tec->teccode . "' and date(w.created_at)>='" . $searchfromdate . "' and date(w.created_at)<='" . $searchtodate . "' "
                    . " group by date(w.created_at), w.teccode) w1 on w1.w1date=d.ddate " 
                    
                    . " left join trafficeventclasses tec on tec.teccode=w1.teccode  " 
                    . " where d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' order by d.ddate;";
            
//            $sqlstr = "select count(w.id) as eventcount,d.ddate from tbldates d " .
//                    " left join warninginfo w on date(w.created_at)=d.ddate ". 
//                    " left join trafficeventclasses tec on tec.teccode=w.teccode and tec.tecparentcode='" . $tec->teccode . "' " . 
//                    " where d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' " .
//                    " group by d.ddate;";
//            echo $sqlstr;
            $stats = DB::select($sqlstr);
            $dary = array();
            foreach ($stats as $stat){
                $arr = array("date"=>$stat->ddate, "count"=>$stat->eventcount);
                array_push($dary, $arr);
            }

            array_push($datares, array("code"=>$tec->teccode, 'name'=>$tec->tecname, "summary"=>$dary));
//            }
//            $arr = array("teccode"=>$tec->teccode, "tecname"=>$tec->tecname, "eventcount"=>$stats[0]->eventcount);
            //array_push($datares, $arr);
        }
        
        $totalstats = DB::select("select w1count as eventcount,d.ddate from tbldates d "
                . " left join (select count(w.id)as w1count , date(created_at) as w1date from warninginfo w "
                . " where date(w.created_at)>='" . $searchfromdate . "' and date(w.created_at)<='" . $searchtodate . "' group by date(w.created_at)) as w1 "
                . " on w1.w1date=d.ddate where d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' order by d.ddate");
        $dary = array();
        foreach ($totalstats as $stat){
            $arr = array("date"=>$stat->ddate, "count"=>$stat->eventcount);
            array_push($dary, $arr);
        }
        array_push($datares, array("code"=>"all", 'name'=>"合计", "summary"=>$dary));
        
        $dates = DB::select("select ddate from tbldates where ddate>='" . $searchfromdate . "' and ddate<='" . $searchtodate . "' ");
        $labels = array();
        foreach($dates as $d){
            array_push($labels, $d->ddate);
        }
        
        $res["esdata"] = $datares;
        $res["labels"] = $labels;
        return json_encode($res);
    }
    
    function eventStat(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-7 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }         
        
        return view("/stat/eventstat", [
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
        ]);
    }
    
    function eventTypeStatJson(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-7 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }        
        
        $sqlstr = "select count(w.id) as wcount,tec.tecparentcode, tp.tecname from warninginfo w "
                . " left join trafficeventclasses tec on tec.teccode=w.teccode "
                . " left join trafficeventclasses tp on tp.teccode=tec.tecparentcode "
                . " where date(w.created_at)>='" . $searchfromdate . "' and date(w.created_at)<='" . $searchtodate . "' group by tec.tecparentcode, tp.tecname ;";
        
        $eventtypesummary = DB::select($sqlstr);
        $arr = array("retcode"=>ret_success, "summary"=>$eventtypesummary);
        return json_encode($arr);
    }
    
    function eventSourceStatJson(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-7 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }        
        
        $sqlstr = "select count(w.id) as scount,w.wisource, "
                . " case w.wisource when 1 then '交警' when 2 then '政府' when 3 then '气象部门' "
                . " when 4 then '互联网' when 5 then '本地检测' else '未知' end as sourcename from warninginfo w  "
                . " where date(w.created_at)>='" . $searchfromdate . "' and date(w.created_at)<='" . $searchtodate . "' group by w.wisource ;";
        
        $eventsourcesummary = DB::select($sqlstr);
        $arr = array("retcode"=>ret_success, "summary"=>$eventsourcesummary);
        return json_encode($arr);
    }
    
    function warningRecordStat(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-30 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }
        
        $obus = ObuDevice::orderBy("id", "desc")
                ->select("id", "obuid")
                ->get();
        
        return view("/stat/warningrecordstat", [
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "obus"=>$obus,
        ]);        
    }
    
    function warnRecordsCountStatJson(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-30 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }
        
        $searchobuid = "-1";
        if($request->has("obuid")){
            $searchobuid = $request->obuid;
        }
        
        $obufilter = "select count(id) as wrcount, date(created_at) as wrdate from warningrecords group by date(created_at)";
        if($searchobuid != "-1"){
            $obufilter = " select obuid, count(id) as wrcount, date(created_at) as wrdate from warningrecords where obuid=" . $searchobuid . " group by obuid, date(created_at) ";
        }        
        
        $sqlstr = "select d.ddate,ifnull(wrstat.wrcount,0)as wrcount from tbldates d "
                . " left join (" . $obufilter . ") wrstat on wrstat.wrdate=d.ddate "
                . " where d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' ";
        
        $sqlstr .= " order by d.ddate;";
        $countstat = DB::select($sqlstr);
        //echo $sqlstr;
        
        $dates = DB::select("select ddate from tbldates where ddate>='" . $searchfromdate . "' and ddate<='" . $searchtodate . "' ");
        $labels = array();
        foreach($dates as $d){
            array_push($labels, $d->ddate);
        }        
        
        $arr = array("retcode"=>ret_success, "wrcdata"=>$countstat, "labels"=>$labels);
        return json_encode($arr);
    }
    
    function warningRecordEventTypeStatJson(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-30 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }
        
        $searchobuid = "-1";
        if($request->has("obuid")){
            $searchobuid = $request->obuid;
        }
        
        $obufilter = "";
        if($searchobuid != "-1"){
            $obufilter = " and wr.obuid=" . $searchobuid;
        }
        
        $sqlstr = "select count(wr.id) as wcount,tp.tecparentcode, tp.tecname from warningrecords wr "
                . " left join trafficeventclasses tp on tp.teccode=wr.eventtype "
                . " where date(wr.created_at)>='" . $searchfromdate . "' and date(wr.created_at)<='" . $searchtodate . "' "
                . $obufilter . " group by tp.tecparentcode, tp.tecname ;";
        
        $eventtypesummary = DB::select($sqlstr);
        $arr = array("retcode"=>ret_success, "summary"=>$eventtypesummary);
        return json_encode($arr);
    }
    
   function warningRecordEventSourceStatJson(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',strtotime("-30 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }
        
        $searchobuid = "-1";
        if($request->has("obuid")){
            $searchobuid = $request->obuid;
        }
        
        $obufilter = "";
        if($searchobuid != "-1"){
            $obufilter = " and wr.obuid=" . $searchobuid;
        }        
        
        $sqlstr = "select count(wr.id) as scount,wr.eventsource, "
                . " case wr.eventsource when 1 then '交警' when 2 then '政府' when 3 then '气象部门' "
                . " when 4 then '互联网' when 5 then '本地检测' else '未知' end as sourcename from warningrecords wr  "
                . " where date(wr.created_at)>='" . $searchfromdate . "' and date(wr.created_at)<='" . $searchtodate . "' "
                . $obufilter . " group by wr.eventsource ;";
        
        $eventsourcesummary = DB::select($sqlstr);
        $arr = array("retcode"=>ret_success, "summary"=>$eventsourcesummary);
        return json_encode($arr);
    }
    
    function sendRte2Rsu(Request $request){
        $winfos = WarningInfo::whereraw("warninginfo.endtime > now()")
                ->whereraw("id not in (select relatedid from rsisendrecords where sendtype=" . rsi_type_rte . ")")
//                ->leftjoin("rsisendrecords as rsr", function($join){
//                    $join->on("rsr.relatedid", "=", "warninginfo.id")
//                            ->on("rsr.sendtype", rsi_type_rte);
//                })
                ->get();
        
        $default_lat = env("dashboard_default_lat", 36.183753);
        $default_lng = env("dashboard_default_lng", 120.339217);
        $default_zoom = env("dashboard_map_defaultzoom", 15);         
        
        return view("/road/sendrte2rsu", [
            "warninginfo"=>$winfos,
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,              
        ]);
    }
    
    function sendRte2RsuSave(Request $request){
        $selRsu = $request->selectedRsu;
        $rsus = DB::select("SELECT * FROM device_info_connect where device_id='" . $selRsu . "' order by con_datetime desc limit 1");
        if(count($rsus) == 0){
            echo "RSU在数据库中不存在！";
            return ;
        }
        
        if($rsus[0]->Is_online != "1"){
            echo "设备" . $selRsu . "不在线！";
            return;
        }
        
        $events = $request->events;
        $searchevents = "";
        foreach($events as $event){
            if($searchevents == ""){
                $searchevents = $event;
            } else {
                $searchevents = $searchevents . "," . $event;
            }            
        }
        
        if($searchevents == ""){
            echo "未选择事件！";
            return;
        }
        
        $maxreqno = DB::select("select max(reqno) as maxReqNo from (select convert(request_no, UNSIGNED INTEGER) AS reqno FROM device_info_request) as request");
        $reqNo = $maxreqno[0]->maxReqNo + 1;
        
        $winfos = WarningInfo::whereRaw("id in (" . $searchevents . ")")
                ->get();
        
        $rtes = array();
        $yearstart = strtotime(date("Y") . "-01-01 00:00:00");
        foreach($winfos as $winfo){
            $starttime = strtotime($winfo->starttime);
            $endtime = strtotime($winfo->endtime);
            
            $startminute = round(($starttime - $yearstart) / 60);
            $endminute = round(($endtime - $yearstart) / 60);
            $nowminute = round((time() - $yearstart) / 60);
            if($endminute > 527040){
                $endminute = 527040;
            }         
            
            $rteid = $winfo->id % 255;
            
            $eventPos = array("offsetLL"=>array("choiceID"=>7, "position_LatLon"=>array("long"=>$winfo->startlng * 1000000, "lat"=>$winfo->startlat * 1000000)), "offsetV"=>null);
            $timeDetails = array("starttime"=>$startminute, "endTime"=>$endminute, "endTimeConfidence"=>null);
            $winfoitem = array("rteId"=>$rteid, "eventType"=>intval($winfo->teccode), "eventSource"=>$winfo->wisource, 
                "eventPos"=>$eventPos, "eventRadius"=>$winfo->wiradius, "timeDetails"=>$timeDetails);
            array_push($rtes, $winfoitem);
        }
        
        $refpos = array("lat"=>floatval($rsus[0]->RSU_lat * 1000000), "long"=>floatval($rsus[0]->RSU_lng * 1000000), "elevation"=>0);
        $rsivalue = array("tag"=>$reqNo, "msgCnt"=>0, "moy"=>$nowminute, "id"=>$selRsu, "refPos"=>$refpos, "rtss"=>null, "rtes"=>$rtes);
        $arr = array("type"=>"rte", "value"=>$rsivalue);
        
        $reqJson = json_encode($arr);
//        echo $reqJson;
        
        $rtestarttime = strtotime($request->starttime);
        $rteendtime = strtotime($request->endtime);
        
        $rtestarttime_minute = round(($rtestarttime - $yearstart) / 60);
        $rteendtime_minute = round(($rteendtime - $yearstart) / 60);
        
        DB::update("update device_info_request set deleted=1 where request_type='RTE' and device_id='" . $selRsu . "'");
        
        $insertsql = "insert into device_info_request (log_radom, device_id, request_datetime, request_type, request_no, request_JSON, " 
            . " request_start_time, request_end_time ) values('" . $rsus[0]->log_radom . "', '"
            . $selRsu . "', now(), 'RTE', '" . $reqNo . "', '" . $reqJson . "', " . $rtestarttime_minute . ", " . $rteendtime_minute . ")";
        
        DB::insert($insertsql);
        
        echo "下发成功！";
    }
}
