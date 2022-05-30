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
    
    function deleteObuDevice(Request $request){
        if($request->id == ""){
            return "缺少参数！";
        }
        
        DB::delete("delete from obudevices where id=" . $request->id);
        return redirect("/obudevices");
    }
}
