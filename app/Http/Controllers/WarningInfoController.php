<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WarningInfo;
use App\User;
use App\RoadCoordinate;
use App\Road;
use App\TrafficEventClass;

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
                        "warninginfo.wicreator", "warninginfo.created_at", "warninginfo.wisource", "u.realname",
                        "tec.tecparentcode as tecpcode", "warninginfo.teccode")
                ->leftjoin("users as u", "warninginfo.wicreator", "=", "u.id")
                ->leftjoin("trafficeventclasses as tec", "warninginfo.teccode", "=", "tec.teccode");
        
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
                ->select("r.roadname", "roadcoordinates.lanetype", "roadcoordinates.laneno")
                ->leftjoin("roads as r", "roadcoordinates.roadid", "=", "r.id")                
                ->distinct()
                ->get();        
        
        $roadsEnd = RoadCoordinate::where("roadcoordinates.minlat", "<", $winfo->stoplat)
                ->where("roadcoordinates.maxlat", ">", $winfo->stoplat)
                ->where("roadcoordinates.minlng", "<", $winfo->stoplng)
                ->where("roadcoordinates.maxlng", ">", $winfo->stoplng)               
                ->select("r.roadname", "roadcoordinates.lanetype", "roadcoordinates.laneno")
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
        $winfo->stoplat = $request->stoplat;
        $winfo->stoplng = $request->stoplng;
        $winfo->teccode = $request->tecchild;
        $winfo->wisource = $request->wisource;
        $winfo->wicreator = Auth::user()->id;
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
        
        return view("/stat/warningrecordstat", [
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
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
        
        $sqlstr = "select d.ddate,ifnull(wrstat.wrcount,0)as wrcount from tbldates d "
                . " left join (select count(id) as wrcount, date(created_at) as wrdate from warningrecords group by date(created_at)) wrstat on wrstat.wrdate=d.ddate "
                . " where d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' order by d.ddate;";
        $countstat = DB::select($sqlstr);
        
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
        
        $sqlstr = "select count(wr.id) as wcount,tp.tecparentcode, tp.tecname from warningrecords wr "
                . " left join trafficeventclasses tp on tp.teccode=wr.eventtype "
                . " where date(wr.created_at)>='" . $searchfromdate . "' and date(wr.created_at)<='" . $searchtodate . "' group by tp.tecparentcode, tp.tecname ;";
        
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
        
        $sqlstr = "select count(wr.id) as scount,wr.eventsource, "
                . " case wr.eventsource when 1 then '交警' when 2 then '政府' when 3 then '气象部门' "
                . " when 4 then '互联网' when 5 then '本地检测' else '未知' end as sourcename from warningrecords wr  "
                . " where date(wr.created_at)>='" . $searchfromdate . "' and date(wr.created_at)<='" . $searchtodate . "' group by wr.eventsource ;";
        
        $eventsourcesummary = DB::select($sqlstr);
        $arr = array("retcode"=>ret_success, "summary"=>$eventsourcesummary);
        return json_encode($arr);
    }    
}
