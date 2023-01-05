<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once "../app/Constant.php";

use DB;

class VehicleFlowController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }     
    
    function vehflowStat(Request $request){
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
        
        return view("/stat/vehflow", [
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
        ]);
    }
    
    function vehflowStatJson(Request $request){
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
        
        if($searchfromdate != $searchtodate){
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
    
    function vehflowHourStatJson(Request $request){
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
        

        $sqlstr = " select count(vf.id) as vehcount,DATE_FORMAT(vf.created_at, '%H') as vfhour from  vehicleflow vf "
                . " where  date(vf.created_at)>='" . $searchfromdate . "' and date(vf.created_at)<='" . $searchtodate . "' "
                . " group by DATE_FORMAT(vf.created_at, '%H') " ;

        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);                        
    
        
        return json_encode($arr_vehflows);
    } 

    function vehflowTypeStatJson(Request $request){
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
        

        $sqlstr = " select count(vf.vehtype) as vehtypecount, vf.vehtype from  vehicleflow vf "
                . " where  date(vf.created_at)>='" . $searchfromdate . "' and date(vf.created_at)<='" . $searchtodate . "' "
                . " group by vf.vehtype order by vehtypecount desc  " ;

        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehtypes"=>$arr);                        
    
        
        return json_encode($arr_vehflows);
    }
    
    function vehflowBrandStatJson(Request $request){
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
        

        $sqlstr = " select count(vf.vehbrand) as vehbrandcount, vf.vehbrand from  vehicleflow vf "
                . " where  date(vf.created_at)>='" . $searchfromdate . "' and date(vf.created_at)<='" . $searchtodate . "' "
                . " group by vf.vehbrand order by vehbrandcount desc limit 10" ;

        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehbrands"=>$arr);                        
        
        return json_encode($arr_vehflows);
    }
    
    function radarEventStat(Request $request){
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
        
        return view("/stat/radareventstat", [
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
        ]);        
    }
    
    function radarEventTrendSummary(Request $request){
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
        
        $res = array("retcode"=>ret_success);
        $datares = array();

        $sqlstr = " select ifnull(w1count,0) as eventcount,d.ddate from tbldates d " 

                . " left join (select count(id) as w1count, date(eventtime) as w1date from aidevents w "
                . " where  date(w.eventtime)>='" . $searchfromdate . "' and date(w.eventtime)<='" . $searchtodate . "' "
                . " group by date(w.eventtime)) w1 on w1.w1date=d.ddate " 
                . " where d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' order by d.ddate;";

        //echo $sqlstr;
        $stats = DB::select($sqlstr);
        $dary = array();
        foreach ($stats as $stat){
            $arr = array("date"=>$stat->ddate, "count"=>$stat->eventcount);
            array_push($dary, $arr);
        }

        array_push($datares, array( "summary"=>$dary));
        
        $dates = DB::select("select ddate from tbldates where ddate>='" . $searchfromdate . "' and ddate<='" . $searchtodate . "' ");
        $labels = array();
        foreach($dates as $d){
            array_push($labels, $d->ddate);
        }
        
        $res["esdata"] = $datares;
        $res["labels"] = $labels;
        return json_encode($res);
    }
    
    function radarEventTypeStatJson(Request $request){
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
        
        $sqlstr = "select count(id) as wcount, aidevent from aidevents " 
            . " where date(eventtime)>='" . $searchfromdate . "' and date(eventtime)<='" . $searchtodate . "' group by aidevent ;";
        
//        $sqlstr = "select count(w.id) as wcount,tec.tecparentcode, tp.tecname from warninginfo w "
//                . " left join trafficeventclasses tec on tec.teccode=w.teccode "
//                . " left join trafficeventclasses tp on tp.teccode=tec.tecparentcode "
//                . " where date(w.created_at)>='" . $searchfromdate . "' and date(w.created_at)<='" . $searchtodate . "' group by tec.tecparentcode, tp.tecname ;";
        
        $eventtypesummary = DB::select($sqlstr);
        $arr = array("retcode"=>ret_success, "summary"=>$eventtypesummary);
        return json_encode($arr);
    }    
    
    function radarEventHourStatJson(Request $request){
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
        

        $sqlstr = " select count(aidevents.id) as vehcount,DATE_FORMAT(aidevents.eventtime, '%H') as aidhour from  aidevents  "
                . " where  date(aidevents.eventtime)>='" . $searchfromdate . "' and date(aidevents.eventtime)<='" . $searchtodate . "' "
                . " group by DATE_FORMAT(aidevents.eventtime, '%H') " ;

        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);                        
    
        
        return json_encode($arr_vehflows);
    }     
}
