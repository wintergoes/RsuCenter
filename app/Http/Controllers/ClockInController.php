<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClockIn;
use App\ClockInFull;
use App\User;
use App\ObuDevice;

use DB;

function getDistance($longitude1, $latitude1, $longitude2, $latitude2, $unit=2, $decimal=2){

  $EARTH_RADIUS = 6370.996; // 地球半径系数
  $PI = 3.1415926;

  $radLat1 = $latitude1 * $PI / 180.0;
  $radLat2 = $latitude2 * $PI / 180.0;

  $radLng1 = $longitude1 * $PI / 180.0;
  $radLng2 = $longitude2 * $PI /180.0;

  $a = $radLat1 - $radLat2;
  $b = $radLng1 - $radLng2;

  $distance = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
  $distance = $distance * $EARTH_RADIUS * 1000;

  if($unit==2){
    $distance = $distance / 1000;
  }

  return round($distance, $decimal);

}

class ClockInController extends Controller
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
            $searchfromdate = date('Y-m-d', strtotime("-7 day"));
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        } 
        
        $searchobu = "-1";
        if($request->has("obudevice")){
            $searchobu = $request->obudevice;
        }
        
        $clockinchecks = ClockInFull::orderBy("clockinfull.id", "desc")
                ->where("clockinfull.cistarttime", ">=", $searchfromdate )
                ->where("clockinfull.cidistance", "0")
                ->where("clockinfull.ciendtime", "!=", "null")
                ->get();
        foreach ($clockinchecks as $check){
            $getdistance = DB::select("select lat,lng from oburoutedetails where loctime>'" . $check->cistarttime . "' and loctime<'" . $check->ciendtime 
                    . "' and obuid=" . $check->relatedid . " order by id desc");
            if(count($getdistance) > 0){
                $lastlat = 0;
                $lastlng = 0; 
                $sumdistance = 0;
                foreach($getdistance as $dis){
                    if($lastlat != 0){
                        $sumdistance = $sumdistance + getDistance($lastlng, $lastlat,  $dis->lng, $dis->lat,  1, 3);
//                        echo $sumdistance . ",";
                    }
                    $lastlat = $dis->lat;
                    $lastlng = $dis->lng;
                }
                DB::update("update clockinfull set cidistance=" . $sumdistance . " where id=" . $check->id);
            }
        }
        
        $clockins = ClockInFull::orderBy("clockinfull.id", "desc")
                ->select("clockinfull.id", "clockinfull.cistarttime", "clockinfull.ciendtime", "clockinfull.cidistance",
                        DB::raw("ifnull(ciendtime, date_add(cistarttime, interval 30 minute)) as ciendtime1"), "od.plateno",
                        DB::raw("timestampdiff(SECOND, cistarttime, ifnull(ciendtime, date_add(cistarttime, interval 30 minute))) as citimeseconds"),
//                        DB::raw("(select sum(distance) from oburoutedetails where loctime>clockinfull.cistarttime and loctime<ciendtime and obuid=clockinfull.relatedid) as distance"),
                        "od.obuid", "od.id as obuintid")
                ->leftjoin("obudevices as od", "od.id", "=", "clockinfull.relatedid");
  
        if($searchfromdate != ""){
            $clockins = $clockins->where("clockinfull.cistarttime", ">=", $searchfromdate );
        }
        
        if($searchtodate != ""){
            $clockins = $clockins->where("clockinfull.cistarttime", "<=", $searchtodate);
        }
        
        if($searchobu != "-1" && $searchobu != ""){
            $clockins = $clockins->where("clockinfull.relatedid", $searchobu);
        }
        
        $clockins = $clockins->paginate(20);

        $obus = ObuDevice::orderBy("id", "desc")
                ->select("id", "obuid", "plateno")
                ->get();
        
        return view("/stat/clockins", [
            "clockins"=>$clockins,
            "obus"=>$obus,
            "searchobu"=>$searchobu,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
        ]);
    }
}
