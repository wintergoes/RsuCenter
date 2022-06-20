<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WarningInfo;
use App\User;
use App\RoadCoordinate;
use App\Road;

use Auth;
use DB;

class WarningInfoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $winfos = WarningInfo::orderBy('id', 'desc')
                ->select("warninginfo.id", "warninginfo.winame", "warninginfo.startlat",  "warninginfo.wistatus",
                        "warninginfo.startlng", "warninginfo.stoplat", "warninginfo.stoplng",
                        "warninginfo.wicreator", "warninginfo.created_at", "warninginfo.wisource", "u.realname")
                ->leftjoin("users as u", "warninginfo.wicreator", "=", "u.id")
                ->get();
        
        return view('/road/warninginfo', [
            "warninginfo"=>$winfos
        ]);
    }
    
    function addWarningInfo(Request $request){
        return view("/road/addwarninginfo");
    }

    function addWarningInfoSave(Request $request){
        if($request->winame == "" || $request->startlat == "" || $request->startlng == ""){
            return "缺少参数！";
        }
        
        if($request->stoplat == "" || $request->stoplng == ""){
            $request->stoplat = $request->startlat;
            $request->stoplng = $request->stoplng;
        }
        
        $winfo = new WarningInfo();
        $winfo->winame = $request->winame;
        $winfo->wistatus = $request->wistatus;
        $winfo->startlat = $request->startlat;
        $winfo->startlng = $request->startlng;
        $winfo->stoplat = $request->stoplat;
        $winfo->stoplng = $request->stoplng;
        $winfo->wisource = 1;
        $winfo->wicreator = Auth::user()->id;
        $winfo->save();
        
        return redirect("/warninginfo");
    }

    function editWarningInfo(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        $winfos = WarningInfo::where("id", $request->id)
                ->get();
        
        if(count($winfos) == 0){
            return "预警信息不存在！";
        }
        $winfo = $winfos[0];
        
        $roadsStart = RoadCoordinate::where("roadcoordinates.minlat", "<", $winfo->startlat)
                ->where("roadcoordinates.maxlat", ">", $winfo->startlat)
                ->where("roadcoordinates.minlng", "<", $winfo->startlng)
                ->where("roadcoordinates.maxlng", ">", $winfo->startlng)               
                ->select("r.roadname", "roadcoordinates.lanetype", "roadcoordinates.laneno")
                ->leftjoin("roads as r", "roadcoordinates.roadid", "=", "r.id")
                ->distinct()
                ->get();        
        
        $roadsEnd = RoadCoordinate::where("roadcoordinates.minlat", "<", $winfo->stoplat)
                ->where("roadcoordinates.maxlat", ">", $winfo->stoplat)
                ->where("roadcoordinates.minlng", "<", $winfo->stoplng)
                ->where("roadcoordinates.maxlng", ">", $winfo->stoplng)               
                ->select("r.roadname", "roadcoordinates.lanetype", "roadcoordinates.laneno")
                ->leftjoin("roads as r", "roadcoordinates.roadid", "=", "r.id")
                ->distinct()
                ->get();                
        
        return view("/road/addwarninginfo", [
            "winfo"=>$winfo,
            "roadsStart"=>$roadsStart,
            "roadsEnd"=>$roadsEnd
        ]);
    }

    function editWarningInfoSave(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }   
        
       if($request->winame == "" || $request->startlat == "" || $request->startlng == ""){
            return "缺少参数！";
        }
        
        if($request->stoplat == "" || $request->stoplng == ""){
            $request->stoplat = $request->startlat;
            $request->stoplng = $request->stoplng;
        }
        
        $winfos = WarningInfo::where("id", $request->id)
                ->get();
        
        if(count($winfos) == 0){
            return "预警信息不存在！";
        }        
        
        $winfo = $winfos[0];
        $winfo->winame = $request->winame;
        $winfo->wistatus = $request->wistatus;
        $winfo->startlat = $request->startlat;
        $winfo->startlng = $request->startlng;
        $winfo->stoplat = $request->stoplat;
        $winfo->stoplng = $request->stoplng;
        $winfo->wisource = 1;
        $winfo->wicreator = Auth::user()->id;
        $winfo->save();
        
        return redirect("/warninginfo");        
    }
    
    function deleteWarningInfo(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        DB::delete("delete from warninginfo where id=" . $request->id);
        
        return redirect("/warninginfo");
    }
    
    function warningInfoStat(Request $request){
        return view("/stat/warninginfostat", [
            "searchfromdate"=>"2022-04-01",
            "searchtodate"=>"2022-04-11",
        ]);
    }
}
