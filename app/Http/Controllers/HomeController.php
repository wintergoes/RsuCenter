<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once "../app/Constant.php";

use App\Device;
use App\ObuDevice;
use App\WarningInfo;

use DB;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $obus = ObuDevice::orderBy("id", "desc")
                ->limit(6)
                ->get();
        
        return view('/layouts/summary', [
            "obus"=>$obus
        ]);
    }
    
    public function dataSummary(Request $request){
        $stats = DB::select("select * from (select " . ret_success . " as ret_code) as ret,"
                . "(select count(id) as rsucount from devices) as rsustat, "
                . "(select count(id) as obucount from obudevices) as obustat,"
                . "(select count(id) as warncount from warninginfo where wistatus=1) as warnstat");
        
        return json_encode($stats);
    }
    
    function bdmapSummary(Request $request){
        $rdevices = Device::orderBy("id")
                ->select("id", "devicecode", "rsulat", "rsulng")
                ->get();
        
        $odevices = ObuDevice::orderBy("id")
                ->select("id", "obuid", "obulatitude", "obulongtitude")
                ->get();
        
        $warnings = WarningInfo::orderBy("id")
                ->select("winame", "startlat", "startlng", "stoplat", "stoplng")
                ->get();
        
        $arr = array("retcode"=>ret_success, "rsudevices"=>$rdevices, "obudevices"=>$odevices,
            "warnings"=>$warnings);
        return json_encode($arr);
    }
}
