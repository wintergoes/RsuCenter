<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ObuDevice;

use DB;

class ObuDeviceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $obudevices = ObuDevice::orderBy("id")
                ->get();
        
        return view("/basicdata/obudevices", [
           "obudevices"=>$obudevices 
        ]);
    }
    
    function editObuDevice(Request $request){
        if($request->obuid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $obudevices = ObuDevice::where("id", $request->obuid)
                ->get();
        
        if(count($obudevices) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"OBU信息不存在！",
            ]);            
        }
        
        $obuhardwares = DB::select("select device_ID from OBU_status");
        
        return view("/basicdata/addobudevice", [
            "obudevice"=>$obudevices[0],
            "obuhardwares"=>$obuhardwares
        ]);
    }
    
    function editObuDeviceSave(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $obudevices = ObuDevice::where("id", $request->id)
                ->get();
        
        if(count($obudevices) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"OBU信息不存在！",
            ]);            
        }
        
        $obudevices[0]->obuhardware = $request->obuhardware;
        $obudevices[0]->obulatitude = $request->obulatitude;
        $obudevices[0]->obulongtitude = $request->obulongtitude;
        $obudevices[0]->obustatus = $request->obustatus;
        $obudevices[0]->oburemark = $request->oburemark;
        $obudevices[0]->save();
        
        return redirect("/obudevices");
    }    
    
    function deleteObuDevice(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        DB::delete("delete from obudevices where id=" . $request->id);
        return redirect("/obudevices");
    }
    
    function obuHardwares(Request $request){
        $obuhardwares = DB::select("select os.*, ob.obulatitude, ob.obulongtitude from OBU_status os "
                . " left join obudevices as ob on CONVERT(os.device_ID USING utf8) COLLATE utf8_unicode_ci=ob.obuhardware");
        
        return view("/basicdata/obuhardwares", [
           "obuhardwares"=>$obuhardwares 
        ]);
    }
}
