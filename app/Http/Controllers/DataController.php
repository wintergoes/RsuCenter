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
        
        $searchlicenseplate = "";
        if($request->has("licenseplate")){
            $searchlicenseplate = $request->licenseplate;
        }
        
        $searchvehtype = "-1";
        if($request->has("vehicletype")){
            $searchvehtype = $request->vehicletype;
        }        

        $aidevents = AidEvent::orderBY("aidevents.id", "desc")
                ->select("rd.devicecode", "aidevents.id", "aidevents.plate", "aidevents.laneno", 
                        "aidevents.aidevent", "aidevents.eventtime", "aidevents.platecolor", "aidevents.vehtype",
                        "aidevents.vehcolor", "aidevents.vehspeed", "aidevents.longitude", "aidevents.latitude",
                        "aidevents.detectionpicnumber")
                ->leftjoin("radardevices as rd", "rd.macaddrint", "=", "aidevents.macaddr");
        
        if($searchfromdate != ""){
            $aidevents = $aidevents->where("aidevents.eventtime", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $aidevents = $aidevents->where("aidevents.eventtime", "<=", $searchtodate);
        }
        
        if($searchlicenseplate != ""){
            $aidevents = $aidevents->where("aidevents.plate", "like", "%". $searchlicenseplate . "%");
        }
        
        if($searchvehtype != "-1"){
            $aidevents = $aidevents->where("aidevents.vehtype", "=", $searchvehtype);
        }        
        
        $aidevents = $aidevents->paginate(30);
        
        return view("/data/aidevents", [
            "aidevents"=>$aidevents,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchlicenseplate"=>$searchlicenseplate,
            "searchvehtype"=>$searchvehtype,
        ]);        
    }
    
    function aidDetail(Request $request){
        if($request->aidid == ""){
            echo "缺少参数！";
            return;
        }
        
        $aidevents = AidEvent::where("aidevents.id", $request->aidid)
                ->select("aidevents.id", "aidevents.plate", "aidevents.eventtime", 
                        "aidevents.detectionpicnumber", "rd.devicecode")
                ->leftjoin("radardevices as rd", "rd.macaddrint", "=", "aidevents.macaddr")
                ->get();
        
        if(count($aidevents) == 0){
            echo "记录不存在！";
            return;            
        }
        
        return view("/data/aiddetail", [
           "aidevent"=>$aidevents[0] 
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
        
        $searchlicenseplate = "";
        if($request->has("licenseplate")){
            $searchlicenseplate = $request->licenseplate;
        }
        
        $searchvehtype = "-1";
        if($request->has("vehicletype")){
            $searchvehtype = $request->vehicletype;
        }

        $anprevents = AnprEvent::orderBY("anprevents.id", "desc")
                ->select("rd.devicecode", "anprevents.id", "anprevents.eventtime",
                        "anprevents.licenseplate", "anprevents.lineno", "anprevents.confidencelevel",
                        "anprevents.platecolor", "anprevents.vehicleType", "anprevents.vehtype1",
                        "anprevents.vehspeed", "anprevents.vehlogoname", "anprevents.vehsublogoname",
                        "anprevents.vehpicnum")
                ->leftjoin("radardevices as rd", "rd.macaddrint", "=", "anprevents.macaddr");
        
        if($searchfromdate != ""){
            $anprevents = $anprevents->where("anprevents.eventtime", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $anprevents = $anprevents->where("anprevents.eventtime", "<=", $searchtodate);
        }
        
        if($searchlicenseplate != ""){
            $anprevents = $anprevents->where("anprevents.licenseplate", "like", "%". $searchlicenseplate . "%");
        }
        
        if($searchvehtype != "-1"){
            $anprevents = $anprevents->where("anprevents.vehicletype", "=", $searchvehtype);
        }
        
        $anprevents = $anprevents->paginate(30);
        
        return view("/data/anprevents", [
            "anprevents"=>$anprevents,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchlicenseplate"=>$searchlicenseplate,
            "searchvehtype"=>$searchvehtype,
        ]);
    }
    
    function anprDetail(Request $request){
        if($request->anprid == ""){
            echo "缺少参数！";
            return;
        }
        
        $anprevents = AnprEvent::where("anprevents.id", $request->anprid)
                ->select("anprevents.id", "anprevents.licenseplate", "anprevents.eventtime", 
                        "anprevents.vehpicnum", "anprevents.vehlogoname", "anprevents.vehsublogoname",
                        "anprevents.vehuuid", "rd.devicecode")
                ->leftjoin("radardevices as rd", "rd.macaddrint", "=", "anprevents.macaddr")
                ->get();
        
        if(count($anprevents) == 0){
            echo "记录不存在！";
            return;            
        }
        
        return view("/data/anprdetail", [
           "anprevent"=>$anprevents[0] 
        ]);
    }
}
