<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AnprEvent;
use App\AidEvent;
use App\RadarDevice;
use App\Forecast;

class DataController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }
        
        $searchlicenseplate = "";
        if($request->has("licenseplate")){
            $searchlicenseplate = $request->licenseplate;
        }
        
        $searchvehtype = "-1";
        if($request->has("vehicletype")){
            $searchvehtype = $request->vehicletype;
        }
        
        $searchaidevent = "-1";
        if($request->has("aidevent")){
            $searchaidevent = $request->aidevent;
        }
        
        $searchradar = "-1";
        if($request->has("radarmac")){
            $searchradar = $request->radarmac;
        }

        $aidevents = AidEvent::orderBY("aidevents.eventtime", "desc")
                ->select("rd.devicecode", "aidevents.id", "aidevents.plate", "aidevents.relatedlaneno", 
                        "aidevents.aidevent", "aidevents.eventtime", "aidevents.platecolor", "aidevents.vehtype",
                        "aidevents.vehcolor", "aidevents.vehspeed", "aidevents.longitude", "aidevents.latitude",
                        "aidevents.detectionpicnumber")
                ->leftjoin("radardevices as rd", "rd.macaddrint", "=", "aidevents.macaddr");
        
//        if($searchfromdate != ""){
//            $aidevents = $aidevents->whereraw("aidevents.eventtime >='" . $searchfromdate . "'");
//        }
//        
//        if($searchtodate != ""){
//            $aidevents = $aidevents->whereraw("date(aidevents.eventtime) <= '" . $searchtodate . "'");
//        }
        
        $aidevents = $aidevents->whereraw("aidevents.eventtime between '" . $searchfromdate . "' and date_add('" . $searchtodate . "', interval 1 day)");
        
        if($searchlicenseplate != ""){
            $aidevents = $aidevents->where("aidevents.plate", "like", "%". $searchlicenseplate . "%");
        }
        
        if($searchvehtype != "-1"){
            $aidevents = $aidevents->where("aidevents.vehtype", "=", $searchvehtype);
        }
        
        if($searchaidevent != "-1"){
            $aidevents = $aidevents->where("aidevents.aidevent", "=", $searchaidevent);
        }
        
        if($searchradar != "-1"){
            $aidevents = $aidevents->where("aidevents.macaddr", "=", $searchradar);
        }
        
        $aidevents = $aidevents->paginate(30);
        
        $radars = RadarDevice::orderBy("id", "asc")
                ->select("id", "macaddrint", "devicecode")
                ->get();
        
        return view("/data/aidevents", [
            "aidevents"=>$aidevents,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchlicenseplate"=>$searchlicenseplate,
            "searchvehtype"=>$searchvehtype,
            "searchaidevent"=>$searchaidevent,
            "searchradar"=>$searchradar,
            "radars"=>$radars
        ]);        
    }
    
    function aidDetail(Request $request){
        if($request->aidid == ""){
            echo "缺少参数！";
            return;
        }
        
        $aidevents = AidEvent::where("aidevents.id", $request->aidid)
                ->select("aidevents.id", "aidevents.plate", "aidevents.aidevent", "aidevents.eventtime", 
                        "aidevents.detectionpicnumber", "rd.devicecode")
                ->leftjoin("radardevices as rd", "rd.macaddrint", "=", "aidevents.macaddr")
                ->get();
        
        if(count($aidevents) == 0){
            echo "记录不存在！";
            return;            
        }
        
        $radar_video_root_path = env("radar_video_root_path");
        
        return view("/data/aiddetail", [
            "aidevent"=>$aidevents[0],
            "radar_video_root_path"=>$radar_video_root_path
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
        
        if(strlen($searchfromdate) == 10){
            $searchfromdate = $searchfromdate . " 00:00:00";
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        } 
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }
        
        if(strlen($searchtodate) == 10){
            $searchtodate .= " 23:59:59";
        }
        
        $searchlicenseplate = "";
        if($request->has("licenseplate")){
            $searchlicenseplate = $request->licenseplate;
        }
        
        $searchvehtype = "-1";
        if($request->has("vehicletype")){
            $searchvehtype = $request->vehicletype;
        }

        $searchradar = "-1";
        if($request->has("radarmac")){
            $searchradar = $request->radarmac;
        }        
        
        $anprevents = AnprEvent::orderBY("anprevents.eventtime", "desc")
                ->select("rd.devicecode", "anprevents.id", "anprevents.eventtime",
                        "anprevents.licenseplate", "anprevents.lineno", "anprevents.confidencelevel",
                        "anprevents.platecolor", "anprevents.vehicleType", "anprevents.vehtype1",
                        "anprevents.vehspeed", "anprevents.vehlogoname", "anprevents.vehsublogoname",
                        "anprevents.vehpicnum")
                ->leftjoin("radardevices as rd", "rd.macaddrint", "=", "anprevents.macaddr");
        
//        if($searchfromdate != ""){
//            $anprevents = $anprevents->whereraw(" date(anprevents.eventtime) >= '" . $searchfromdate . "'") ;
//        }
//        
//        if($searchtodate != ""){
//            $anprevents = $anprevents->whereraw("anprevents.eventtime <='" . $searchtodate . "'");
//        }
        
        $anprevents = $anprevents->whereraw("anprevents.eventtime between '" . $searchfromdate . "' and '" . $searchtodate . "'");
        
        if($searchlicenseplate != ""){
            $anprevents = $anprevents->where("anprevents.licenseplate", "like", "%". $searchlicenseplate . "%");
        }
        
        if($searchvehtype != "-1"){
            $anprevents = $anprevents->where("anprevents.vehicletype", "=", $searchvehtype);
        }
        
        if($searchradar != "-1"){
            $anprevents = $anprevents->where("anprevents.macaddr", "=", $searchradar);
        }        
        
        $anprevents = $anprevents->paginate(30);
        
        $radars = RadarDevice::orderBy("id", "asc")
            ->select("id", "macaddrint", "devicecode")
            ->get();
        
        return view("/data/anprevents", [
            "anprevents"=>$anprevents,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchlicenseplate"=>$searchlicenseplate,
            "searchvehtype"=>$searchvehtype,
            "searchradar"=>$searchradar,
            "radars"=>$radars
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
                
        $radar_video_root_path = env("radar_video_root_path");
        
        return view("/data/anprdetail", [
            "anprevent"=>$anprevents[0],
            "radar_video_root_path"=>$radar_video_root_path
        ]);
    }
    
    function forecast(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time());
        }
        
        $forecast = Forecast::orderBy("id", "desc");
        
        if($searchfromdate != ""){
            $forecast = $forecast->where("created_at", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $forecast = $forecast->where("created_at", "<", $searchtodate . " 23:59:59");
        }
        
        $forecast = $forecast->paginate(30);
        
        return view("/data/forecast", [
            "forecast"=>$forecast,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate
        ]);
    }
}
