<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RadarDevice;

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
        
    }
    
    function editRadarDeviceSave(Request $request){
        
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
}
