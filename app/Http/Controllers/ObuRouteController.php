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
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

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
        
        $searchobu = "0";
        if($request->has("obudevice")){
            $searchobu = $request->obudevice;
        }      
        
        $obus = ObuDevice::orderBy("id", "desc")
                ->select("id", "obuid")
                ->get();
        
        if($searchobu == "0"){
            if(count($obus) > 0){
                $searchobu = $obus[count($obus)-1]->id;
            }
        }
        
        $validdates = DB::select("select distinct(date(created_at)) as vdate from oburoutedetails where obuid=" . $searchobu);
        
        $default_lat = env("home_default_lat", 36.183753);
        $default_lng = env("home_default_lng", 120.339217); 
        
        $routes = ObuRouteDetail::orderBy("id", "asc")
                ->where("created_at", ">=", $searchfromdate . " " . $searchfromtime . ":00")
                ->where("created_at", "<=", $searchfromdate . " " . $searchtotime . ":59")
                ->where("obuid", $searchobu)
                ->get();
        
        return view("/stat/oburoute", [
            "routes"=>$routes,
            "obus"=>$obus,
            "validdates"=>$validdates,
            "searchfromdate"=>$searchfromdate,
            "searchfromtime"=>$searchfromtime,
            "searchtotime"=>$searchtotime,
            "searchobu"=>$searchobu,
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
        ]);        
    }
    
    function getRouteValidDate(Request $request){
        $validdates = DB::select("select distinct(date(created_at)) as vdate from oburoutedetails where obuid=" . $request->obuid);
        $arr = array("retcode"=>ret_success, "vdates"=>$validdates);
        return json_encode($arr);
    }
}
