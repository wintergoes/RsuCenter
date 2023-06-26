<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClockIn;
use App\ClockInFull;
use App\User;
use App\ObuDevice;

use DB;

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
        
        $clockins = ClockInFull::orderBy("clockinfull.id", "desc")
                ->select("clockinfull.id", "clockinfull.cistarttime", "clockinfull.ciendtime", DB::raw("ifnull(ciendtime, date_add(cistarttime, interval 30 minute)) as ciendtime1"), "od.plateno",
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
