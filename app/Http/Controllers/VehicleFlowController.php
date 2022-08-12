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
                . " group by vf.vehtype " ;

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
                . " group by vf.vehbrand order by vehbrandcount desc limit 20" ;

        $arr = DB::select($sqlstr);
        $arr_vehflows = array("retcode"=>ret_success, "vehbrands"=>$arr);                        
        
        return json_encode($arr_vehflows);
    }      
}
