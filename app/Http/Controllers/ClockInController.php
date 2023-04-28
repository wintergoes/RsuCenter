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
            $searchfromdate = date('Y-m-d', time());
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        } 
        
        $searchobu = "";
        if($request->has("obuid")){
            $searchobu = $request->obuid;
        }
        
        $clockins = ClockInFull::orderBy("clockinfull.id", "desc")
                ->select("clockinfull.id", "clockinfull.cistarttime", "clockinfull.ciendtime", "od.plateno",
                        "od.obuid", "od.id as obuintid")
                ->leftjoin("obudevices as od", "od.id", "=", "clockinfull.relatedid");
  
        if($searchfromdate != ""){
            $clockins = $clockins->where("clockinfull.created_at", ">=", $searchfromdate );
        }
        
        if($searchtodate != ""){
            $clockins = $clockins->where("clockinfull.created_at", "<=", $searchtodate);
        }
        
        if($searchobu != "-1" && $searchobu != ""){
            $clockins = $clockins->where("clockinfull.relatedid", $searchobu);
        }
        
        $clockins = $clockins->get();

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
