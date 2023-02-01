<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Device;
use App\DeviceInfoRequest;
use App\RadarDevice;

use DB;

require_once '../app/Constant.php';

class DeviceController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        $rsustatus = DB::select("select device_ID from RSU_status");
        foreach($rsustatus as $rsu){
            $checkdevices = Device::where("devicecode", $rsu->device_ID)
                    ->select("id")
                    ->get();
            
            if(count($checkdevices) == 0){
                $newdevice = new Device();
                $newdevice->devicecode = $rsu->device_ID;
                $newdevice->save();
            }
        }
        
        $devices = Device::orderBy('devices.created_at', 'asc')
                ->select('devices.id',  'devices.devicecode', 'devices.created_at',
                        'devices.rsulat', 'devices.rsulng', 'devices.rsuremark',
                        "rstatus.*")
                ->leftjoin("RSU_status as rstatus", DB::raw("CONVERT(rstatus.device_ID USING utf8) COLLATE utf8_unicode_ci"), "=", "devices.devicecode");
        
        $devices = $devices->get();
  
        return view('/basicdata/devices', [
            'devices' => $devices
        ]);
    }
    
    function editRsuDevice(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $devices = Device::where("id", $request->id)
                ->get();
        
        if(count($devices) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"设备不存在！",
            ]); 
        }
        
        return view("/basicdata/adddevice", [
           "device"=>$devices[0] 
        ]);
    }
    
    function editRsuDeviceSave(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]); 
        }
        
        $devices = Device::where("id", $request->id)
                ->get();
        
        if(count($devices) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"设备不存在！",
            ]); 
        }
        
        $devices[0]->rsulat = $request->rsulat;
        $devices[0]->rsulng = $request->rsulng;
        $devices[0]->rsuremark = $request->rsuremark;
        $devices[0]->save();
        
        return redirect("/devices");        
    }    
    
    function deleteDevice(Request $request){
        Device::where('id', $request->deviceid)->delete();
        
        return redirect('/devices');        
    }
    
    function rsuSettings(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $devices = Device::where("id", $request->id)
                ->get();
        if(count($devices) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"设备不存在！",
            ]);
        }
        
        return view("/basicdata/rsusettings", [
            "rsudevice"=>$devices[0]
        ]);
    }
    
    function getRsuOnline(Request $request){
        $rsus = DB::select("select * from device_info_connect where Is_online=1");
        
        $arr = array("retcode"=>ret_success, "rsus"=>$rsus);
        return json_encode($arr);
    }
    
    function rsuSendRecords(Request $request){
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
        
        $searchrsudevice = "-1";
        if($request->has("rsudevice")){
            $searchrsudevice = $request->rsudevice;
        } 
        
        $searchdeleteflag = "-1";
        if($request->has("deleteflag")){
            $searchdeleteflag = $request->deleteflag;
        }
        
        $searchreturnjsonstatus = "-1";
        if($request->has("returnjsonStatus")){
            $searchreturnjsonstatus = $request->returnjsonStatus;
        }
        
        $devicereqs = DeviceInfoRequest::orderBy("request_datetime", "desc")
                ->select("log_radom", "device_id", "request_datetime", "modify_datetime",
                        "request_type", "request_no", "request_JSON", "request_start_time",
                        DB::raw("date_add(DATE_FORMAT(concat(year(now()),'-01-01'),'%Y-%m-01'), interval request_start_time minute) as request_start_time_time"),
                        "request_end_time",
                        DB::raw("date_add(DATE_FORMAT(concat(year(now()),'-01-01'),'%Y-%m-01'), interval request_end_time minute) as request_end_time_time"),
                        "return_JSON", "deleted");
        
        echo $searchfromdate . ",  "  . $searchtodate;
        if($searchfromdate != ""){
            $devicereqs = $devicereqs->where("request_datetime", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $devicereqs = $devicereqs->where("request_datetime", "<", $searchtodate . " 23:59:59");
        }
        
        if($searchrsudevice != "-1"){
            $devicereqs = $devicereqs->where("device_id", $searchrsudevice);
        }
        
        if($searchdeleteflag != "-1"){
            $devicereqs = $devicereqs->where("deleted", $searchdeleteflag);
        }
        
        if($searchreturnjsonstatus != "-1"){
            if($searchreturnjsonstatus == "1"){
                $devicereqs = $devicereqs->wherenull("return_JSON");
            } else {
                $devicereqs = $devicereqs->wherenotnull("return_JSON");
            }
        }
        
        $devicereqs = $devicereqs->paginate(20);
        
        $devices = Device::orderBy("id", "asc")
                ->select("id", "devicecode")
                ->get();        
        
        return view("/basicdata/rsusendrecords", [
            "devicerequests"=>$devicereqs,
            "devices"=>$devices,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchrsudevice"=>$searchrsudevice,
            "searchdeleteflag"=>$searchdeleteflag,
            "searchreturnjsonstatus"=>$searchreturnjsonstatus
        ]);
    }
}
