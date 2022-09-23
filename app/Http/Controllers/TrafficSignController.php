<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TrafficSign;
use App\TrafficSignClass;
use App\RoadCoordinate;

use Auth;
use DB;

class TrafficSignController extends Controller
{
    function index(Request $request){
        $signs = TrafficSign::orderBy("trafficsigns.id", "desc")
                ->select("trafficsigns.id", "trafficsigns.tscid", "trafficsigns.tsname", "trafficsigns.tslat", 
                        "trafficsigns.tslng", "trafficsigns.created_at", "trafficsigns.tsparam1", 
                        "trafficsigns.starttime", "trafficsigns.endtime",
                        "u.realname")
                ->leftjoin("trafficsignclasses as tsc", "trafficsigns.tscid", "=", "tsc.id")
                ->leftjoin("users as u", "u.id", "=", "trafficsigns.tsmanager")
                ->paginate(30);
        
        
        return view("/road/trafficsigns", [
           "trafficsigns"=>$signs 
        ]);
    }
    
    function addTrafficSign(Request $request){
        $tscs = TrafficSignClass::orderBy("id", "asc")
                ->get();
        
        return view("/road/addtrafficsign", [
            "tscs"=>$tscs
        ]);
    }
    
    function addTrafficSignSave(Request $request){
        $lat = 0;
        if($request->tslat != ""){
            $lat = $request->tslat;
        }
        
        $lng = 0;
        if($request->tslng != ""){
            $lat = $request->tslng;
        }
        
        $starttime = "";
        if($request->starttime != ""){
            $starttime = $request->starttime;
        }
        
        $endtime = "";
        if($request->endtime != ""){
            $endtime = $request->endtime;
        }        
        
        $ts = new TrafficSign();
        $ts->tscid = trim($request->tscid);
        $ts->tsname = $request->tsname;
        $ts->tslat = $lat;
        $ts->tslng = $lng;
        $ts->tsmanager = Auth::user()->id;
        $ts->tsparam1 = $request->tsparam1;
        $ts->starttime = $starttime;
        $ts->endtime = $endtime; 
        $ts->save();
        
        return redirect("trafficsigns");
    }    
    
    function editTrafficSign(Request $request){
        if($request->id == ""){
            echo "缺少参数！";
            return ;
        }
        
        $trafficsigns = TrafficSign::where("id", $request->id)
                ->get();
        if(count($trafficsigns) == 0){
            echo "数据不存在！";
            return;
        }
        
        $roadsStart = RoadCoordinate::where("roadcoordinates.minlat", "<", $trafficsigns[0]->tslat)
                ->where("roadcoordinates.maxlat", ">", $trafficsigns[0]->tslat)
                ->where("roadcoordinates.minlng", "<", $trafficsigns[0]->tslng)
                ->where("roadcoordinates.maxlng", ">", $trafficsigns[0]->tslng)               
                ->select("r.roadname", "roadcoordinates.lanetype", "roadcoordinates.laneno")
                ->leftjoin("roads as r", "roadcoordinates.roadid", "=", "r.id")                
                ->distinct()
                ->get();         
        
        $tscs = TrafficSignClass::orderBy("id", "asc")
                ->get();        
        
        return view("/road/addtrafficsign", [
            "trafficsign"=>$trafficsigns[0],
            "tscs"=>$tscs,
            "roadsStart"=>$roadsStart
        ]);
    }
    
    function editTrafficSignSave(Request $request){
        if($request->id == ""){
            echo "缺少参数！";
            return ;
        }
        
        $trafficsigns = TrafficSign::where("id", $request->id)
                ->get();
        if(count($trafficsigns) == 0){
            echo "数据不存在！";
            return;
        }
        
        $ts = $trafficsigns[0];
        $ts->tscid = trim($request->tscid);
        $ts->tsname = $request->tsname;
        $ts->tslat = $request->tslat;
        $ts->tslng = $request->tslng;
        $ts->tsmanager = Auth::user()->id;
        $ts->tsparam1 = $request->tsparam1;
        $ts->starttime = $request->starttime;
        $ts->endtime = $request->endtime;          
        $ts->save();
        
        return redirect("trafficsigns");
    }     
    
    function deleteTrafficSign(Request $request){
        if($request->id == ""){
            echo "缺少参数！";
            return ;
        }
        
        DB::delete("delete from trafficsigns where id=" . $request->id);
        return redirect("trafficsigns");
    }
}
