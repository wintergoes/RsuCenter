<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Device;

class DeviceController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        $devices = Device::orderBy('devices.created_at', 'asc')
                ->select('devices.id',  'devices.devicecode', 'devices.created_at',
                        'devices.rsulat', 'devices.rsulng',
                        "rstatus.*")
                ->leftjoin("RSU_status as rstatus", "rstatus.device_ID", "=", "devices.devicecode");
        
        $devices = $devices->get();
  
        return view('/basicdata/devices', [
            'devices' => $devices
        ]);
    }
    
    function editRsuDevice(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        $devices = Device::where("id", $request->id)
                ->get();
        
        if(count($devices) == 0){
            return "设备不存在！";
        }
        
        return view("/basicdata/adddevice", [
           "device"=>$devices[0] 
        ]);
    }
    
    function editRsuDeviceSave(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        $devices = Device::where("id", $request->id)
                ->get();
        
        if(count($devices) == 0){
            return "设备不存在！";
        }
        
        $devices[0]->rsulat = $request->rsulat;
        $devices[0]->rsulng = $request->rsulng;
        $devices[0]->save();
        
        return redirect("/devices");        
    }    
    
    function deleteDevice(Request $request){
        Device::where('id', $request->deviceid)->delete();
        
        return redirect('/devices');        
    }
    
    function rsuSettings(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        $devices = Device::where("id", $request->id)
                ->get();
        if(count($devices) == 0){
            return "设备不存在！";
        }
        
        return view("/basicdata/rsusettings", [
            "rsudevice"=>$devices[0]
        ]);
    }
}
