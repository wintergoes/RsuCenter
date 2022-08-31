<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AnprEvent;
use App\AidEvent;

class DataController extends Controller
{
    function aidEvents(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }
        
        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time());
        }        

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        } 

        $aidevents = AidEvent::orderBY("id", "desc");
        
        if($searchfromdate != ""){
            $aidevents = $aidevents->where("eventtime", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $aidevents = $aidevents->where("eventtime", "<=", $searchtodate);
        }
        
        $aidevents = $aidevents->paginate(30);
        
        return view("/data/aidevents", [
            "aidevents"=>$aidevents,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
        ]);        
    }
    
    function anprEvents(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }
        
        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time());
        }        

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        } 

        $anprevents = AnprEvent::orderBY("id", "desc");
        
        if($searchfromdate != ""){
            $anprevents = $anprevents->where("eventtime", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $anprevents = $anprevents->where("eventtime", "<=", $searchtodate);
        }
        
        $anprevents = $anprevents->paginate(30);
        
        return view("/data/anprevents", [
            "anprevents"=>$anprevents,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
        ]);
    }
}
