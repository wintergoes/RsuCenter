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
                ->select('devices.id',  'devices.devicecode', 'devices.created_at');
        
        $devices = $devices->get();
  
        return view('/basicdata/devices', [
            'devices' => $devices
        ]);
    }
    
    function deleteDevice(Request $request){
        Device::where('id', $request->deviceid)->delete();
        
        return redirect('/devices');        
    }
}
