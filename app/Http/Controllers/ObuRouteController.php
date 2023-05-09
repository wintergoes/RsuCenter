<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ObuRoute;
use App\ObuRouteDetail;
use App\ObuDevice;

use DB;

require_once '../app/Constant.php';

class ObuRouteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    function obuRoute(Request $request){
//        echo "oburoute";
//        return;
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time()) ;
        }
        
        $searchfromtime = "08:00";
        if($request->has("fromtime")){
            $searchfromtime = $request->fromtime;
        }
        
        $searchtotime = "18:00";
        if($request->has("totime")){
            $searchtotime = $request->totime;
        } 
        
        $searchobu = "0";
        if($request->has("obudevice")){
            $searchobu = $request->obudevice;
        }
        
        $searchlocationtype = "1";
        if($request->has("locationtype")){
            $searchlocationtype = $request->locationtype;
        } else {
            $searchlocationtype = "1";
        }
        
        $obus = ObuDevice::orderBy("id", "desc")
                ->select("id", "obuid", "plateno")
                ->get();
        
        if($searchobu == "0"){
            if(count($obus) > 0){
                $searchobu = $obus[count($obus)-1]->id;
            }
        }
        
        $validdates = DB::select("select distinct(create_date) as vdate from oburoutedetails where obuid=" . $searchobu . " order by vdate desc");
        
        $default_lat = env("home_default_lat", 36.183753);
        $default_lng = env("home_default_lng", 120.339217);
        
        $routes = ObuRouteDetail::orderBy("id", "asc")
                ->select("lat", "lng", "locationtype", "flag")
                ->where("created_at", ">=", $searchfromdate . " " . $searchfromtime . ":00")
                ->where("created_at", "<=", $searchfromdate . " " . $searchtotime . ":59")
                ->where("obuid", $searchobu);
        
        if($searchlocationtype != "-1"){
            $routes = $routes->where("locationtype", $searchlocationtype);
        }
        
        // 临时逻辑，数据太多，经常查询错误，暂时屏蔽掉一些数据
        if($searchlocationtype == 1){
//            $routes = $routes->whereraw("id % 20 = 0");
        }
        
        $routes = $routes->get();
//        return count($routes);
        
        return view("/stat/oburoute", [
            "routes"=>$routes,
            "obus"=>$obus,
            "validdates"=>$validdates,
            "searchfromdate"=>$searchfromdate,
            "searchfromtime"=>$searchfromtime,
            "searchtotime"=>$searchtotime,
            "searchlocationtype"=>$searchlocationtype,
            "searchobu"=>$searchobu,
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
        ]);        
    }
    
    function getObuRouteJson(Request $request){
        $searchfromdate = $request->fromdate;
        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time()) ;
        }        
        
        $searchfromtime = "00:00";
        if($request->has("fromtime")){
            $searchfromtime = $request->fromtime;
        }
        
        $searchtotime = "23:59";
        if($request->has("totime")){
            $searchtotime = $request->totime;
        }

        $searchlocationtype = "-1";
        if($request->has("locationtype")){
            $searchlocationtype = $request->locationtype;
        } else {
            $searchlocationtype = "1";
        }
        
        $searchobu = $request->obu;
        if($searchobu == ""){
            $arr = array("retcode"=>ret_error, "retmsg"=>"obu为空！");
            return json_encode($arr);
        }

        $routes = ObuRouteDetail::orderBy("id", "asc")
                ->select("lat", "lng", "locationtype", "flag")
                ->where("created_at", ">=", $searchfromdate . " " . $searchfromtime . ":00")
                ->where("created_at", "<=", $searchfromdate . " " . $searchtotime . ":59")
                ->where("obuid", $searchobu);
        
        if($searchlocationtype != "-1"){
            $routes = $routes->where("locationtype", $searchlocationtype);
        }
        
        $routes = $routes->get();

        $arr = array("retcode"=>ret_success, "routecount"=>count($routes), "routes"=>$routes);
        return json_encode($arr);
    }
    
    function getRouteValidDate(Request $request){
        $validdates = DB::select("select distinct(create_date) as vdate from oburoutedetails where obuid=" . $request->obuid . " order by vdate desc");
        $arr = array("retcode"=>ret_success, "vdates"=>$validdates);
        return json_encode($arr);
    }
}
