<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RadarDevice;
use App\RadarVideo;

use DB;

class RadarDeviceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    function index(Request $request){
        $rdevices = RadarDevice::orderBy("id", "desc")
                ->get();
        
        return view("/basicdata/radardevices", [
            "radardevices"=>$rdevices
        ]);
    }
    
    function addRadarDevice(Request $request){
        return view("/basicdata/addradardevice");
    }
    
    function addRadarDeviceSave(Request $request){
        $rdevices = RadarDevice::where("devicecode", $request->devicecode)
                ->select("id")
                ->get();
        
        if(count($rdevices) > 0){
            return "设备编码已存在！";
        }
        
        $rdevice = new RadarDevice();
        $rdevice->devicecode = $request->devicecode;
        $rdevice->macaddress = $request->macaddress;
        $rdevice->ipaddress = $request->ipaddress;
        $rdevice->httpstreamport = $request->httpstreamport;
        $rdevice->videostreamaddress = $request->videostreamaddress;
        $rdevice->macaddrint = $this->mac_to_int($request->macaddress);
        $rdevice->lanenumber = $request->lanenumber;
        $rdevice->lanewidth = $request->lanewidth;
        $rdevice->status = $request->status;
        $rdevice->lat = $request->lat;
        $rdevice->lng = $request->lng;
        $rdevice->save();
        
        return redirect("radardevices");
    }
    
    function editRadarDevice(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        $radars = RadarDevice::where("id", $request->id)
                ->get();
        
        if(count($radars) == 0){
            return "设备不存在！";
        }
        
        return view("/basicdata/addradardevice", [
            "radardevice"=>$radars[0]
        ]);
    }
    
    function editRadarDeviceSave(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        $radars = RadarDevice::where("id", $request->id)
                ->get();
        
        if(count($radars) == 0){
            return "设备不存在！";
        }
        
        $rdevice = $radars[0];
        $rdevice->devicecode = $request->devicecode;
        $rdevice->macaddress = $request->macaddress;
        $rdevice->ipaddress = $request->ipaddress;
        $rdevice->httpstreamport = $request->httpstreamport;
        $rdevice->videostreamaddress = $request->videostreamaddress;
        $rdevice->macaddrint = $this->mac_to_int($request->macaddress);
        $rdevice->lanenumber = $request->lanenumber;
        $rdevice->lanewidth = $request->lanewidth;
        $rdevice->status = $request->status;
        $rdevice->lat = $request->lat;
        $rdevice->lng = $request->lng;
        $rdevice->save();
        
        return redirect("radardevices");        
    }
    
    function deleteRadarDevice(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        DB::delete("delete from radardevices where id=" . $request->id);
        
        return redirect("/radardevices");        
    }
    
    function mac_check($mac){
            if (empty($mac)) {
                    return FALSE;
            }

            $mac_reg = '/^([0-9a-fA-F]{2})((([:][0-9a-fA-F]{2}){5})|(([-][0-9a-fA-F]{2}){5}))$/i';
            return preg_match($mac_reg, $mac) == 1 ? TRUE : FALSE;
    }

    function mac_to_int($mac_str){
            if (!$this->mac_check($mac_str)) return 0;
            $filter_mac = strtolower(preg_replace('/[:-]/', '', $mac_str));
            $mac_int = hexdec($filter_mac);
            if (is_numeric($mac_int))
                    return $mac_int;
            else
                    return 0;
    }
    
    function radarVideos(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time()) . " 00:00:00";
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        $searchradar = "";
        if($request->has("radardevice")){
            $searchradar = $request->radardevice;
        }
        
        $radarvideos = RadarVideo::orderBy("radarvideos.id", "desc")
                ->where("radarvideos.deleted", "0")
                ->select("radarvideos.id", "radarvideos.filename", "radar.devicecode")
                ->leftjoin("radardevices as radar", "radar.id", "=", "radarvideos.radarid");
        
        if($searchradar != "" && $searchradar != "-1"){
            $radarvideos = $radarvideos->where("radarvideos.radarid", $searchradar);
        }
        
        if($searchfromdate != ""){
            $radarvideos = $radarvideos->where("radarvideos.created_at", ">", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $radarvideos = $radarvideos->where("radarvideos.created_at", "<", $searchtodate);
        }
        
        $radarvideos = $radarvideos->paginate(16);
        
        $radars = RadarDevice::orderBy("id", "desc")
                ->select("id", "devicecode")
                ->get();
        
        return view("/other/radarvideos", [
            "radarvideos"=>$radarvideos,
            "radars"=>$radars,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchradar"=>$searchradar
        ]);        
    }
    
    function getRadarVideo(Request $request){
        $filename = "/var/video/RS00001/20220824_143722.ogg";
        return file_get_contents($filename);
    }
}
