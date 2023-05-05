<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once "../app/Constant.php";

use App\RadarDevice;

use DB;

class VehicleFlowController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }     
    
    function vehicleStat(Request $request){
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
        
        return view("/stat/vehiclestat", [
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
        ]);
    }
    
    function vehicleStatJson(Request $request){
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
                    . " left join vehicleflow vf on create_date=d.ddate "
                    . " where  d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' "
                    . " group by d.ddate " ;

            $arr = DB::select($sqlstr);
            $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);
        } else {
            $sqlstr = " select count(vf.id) as vehcount,vf.create_hour as vfhour from  vehicleflow vf "
                    . " where  create_date='" . $searchtodate . "' and create_date='" . $searchtodate . "' "
                    . " group by vf.create_hour " ;

            $arr = DB::select($sqlstr);
            $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);                        
        }        
        
        return json_encode($arr_vehflows);
    }
    
    function vehicleHourStatJson(Request $request){
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
        
        $sqlstr = " select count(vf.id) as vehcount, vf.create_hour as vfhour from  vehicleflow vf "
                . " where vf.created_at>='" . $searchfromdate . " 00:00:00' and vf.created_at<='" . $searchtodate . " 23:59:59' "
                . " group by vf.create_hour " ;

        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);
        
        return json_encode($arr_vehflows);
    }     

    function vehicleTypeStatJson(Request $request){
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
                . " where vf.create_date>='" . $searchfromdate . "' and vf.create_date<='" . $searchtodate . "' "
                . " group by vf.vehtype order by vehtypecount desc  " ;

        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehtypes"=>$arr);                        
            
        return json_encode($arr_vehflows);
    }
    
    function vehicleBrandStatJson(Request $request){
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
                . " where  vf.create_date>='" . $searchfromdate . "' and vf.create_date<='" . $searchtodate . "' "
                . " group by vf.vehbrand order by vehbrandcount desc limit 10" ;

        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehbrands"=>$arr);                        
        
        return json_encode($arr_vehflows);
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
        
        $radars = RadarDevice::orderBy("id", "asc")
                ->select("id", "macaddrint", "devicecode")
                ->get(); 
        
        $searchradar = "1";
        $searchradars = RadarDevice::where("devicecode", "LS00110")
                ->get();
        
        if(count($searchradars) > 0){
            $searchradar = $searchradars[0]->macaddrint;
        }
        
        return view("/stat/vehicleflow", [
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "radars"=>$radars,
            "searchradar"=>$searchradar
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
        
        $searchradarmac = "";
        if($request->has("radarmac")){
            $searchradarmac = $request->radarmac;
        }
        
        if($searchfromdate != $searchtodate){
            $sqlstr = " select count(vf.id) as vehcount,DATE_FORMAT(d.ddate, '%m.%d') as vfdate from tbldates d " 
                    . " left join vehdetection_snap vf on create_date=d.ddate  ";
            
            if($searchradarmac != ""){
                $sqlstr .= " and vf.macaddr=" . $searchradarmac;
            }
            
            $sqlstr .=  " where 1=1 and  d.ddate>='" . $searchfromdate . "' and d.ddate<='" . $searchtodate . "' "
                    . " group by d.ddate " ;

//            echo $sqlstr;
            $arr = DB::select($sqlstr);
            $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);
        } else {
            $sqlstr = " select count(vf.id) as vehcount,vf.create_hour as vfhour from  vehdetection_snap vf where 1=1 ";

            if($searchradarmac != ""){
                $sqlstr .= " and vf.macaddr=" . $searchradarmac;
            }            
            
            $sqlstr .= " and create_date='" . $searchtodate . "' and create_date='" . $searchtodate . "' "
                    . " group by vf.create_hour " ;

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
        
        $searchradarmac = "";
        if($request->has("radarmac")){
            $searchradarmac = $request->radarmac;
        }        
        
        $sqlstr = " select count(vf.id) as vehcount, vf.create_hour as vfhour from  vehdetection_snap vf where 1=1 ";
        
        if($searchradarmac != ""){
            $sqlstr .= " and vf.macaddr=" . $searchradarmac;
        }

        $sqlstr .=  " and vf.created_at>='" . $searchfromdate . " 00:00:00' and vf.created_at<='" . $searchtodate . " 23:59:59' "
                . " group by vf.create_hour " ;

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
        
        $searchradar = "-1";
        if($request->has("radarmac")){
            $searchradar = $request->radarmac;
        }        
        
        $searchradarmac = "";
        if($request->has("radarmac")){
            $searchradarmac = $request->radarmac;
        }        
        
        $sqlstr = " select count(vf.vehicletype) as vehtypecount, vf.vehicletype from  vehdetection_snap vf "
                . " left join radardevices rd on vf.macaddr=rd.macaddrint where vf.vehicletype != 'unknown' ";
        
        if($searchradarmac != ""){
            $sqlstr .= " and vf.macaddr=" . $searchradarmac;
        }        
         
        $sqlstr .= " and vf.create_date>='" . $searchfromdate . "' and vf.create_date<='" . $searchtodate . "' ";
                
        if($searchradar != "-1"){
            $sqlstr .=  " and rd.macaddrint=" . $searchradar ;
        }        
        
        $sqlstr .=  " group by vf.vehicletype order by vehtypecount desc  " ;
        
        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehtypes"=>$arr);                        
            
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

                . " left join (select count(id) as w1count, eventtime_date as w1date from aidevents w "
                . " where  w.eventtime_date>='" . $searchfromdate . "' and w.eventtime_date<='" . $searchtodate . "' "
                . " group by w.eventtime_date) w1 on w1.w1date=d.ddate " 
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
            . " where eventtime_date>='" . $searchfromdate . "' and eventtime_date<='" . $searchtodate . "' group by aidevent order by wcount desc ;";
        
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
        

        $sqlstr = " select count(aidevents.id) as vehcount,eventtime_h as aidhour from  aidevents  "
                . " where  aidevents.eventtime_date>='" . $searchfromdate . "' and aidevents.eventtime_date<='" . $searchtodate . "' "
                . " group by eventtime_h " ;

        //echo $sqlstr;
        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehflow"=>$arr);                        
    
        
        return json_encode($arr_vehflows);
    }     
}
