<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;

class ToolsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function dataPlayback(Request $request){
        return view("/tools/dataplayback");
    }
    
    function exportVehFlow(Request $request){
        $timestamp=strtotime('2023-05-10 00:00:00');
        for($i = 0; $i < 30240; $i++){ // 30240
            $small_timestamp=$timestamp+ 60 * $i;
            $large_timestamp=$timestamp+ 60 * ($i+1);
            $small_time=date('Y-m-d H:i:s',$small_timestamp);
            $small_date=date('Y-m-d',$small_timestamp);
            if($small_date == "2023-05-21" || $small_date == "2023-05-22" || $small_date == "2023-05-23"){
                continue;
            }
            $large_time=date('Y-m-d H:i:s',$large_timestamp);
            $snapsql = "select ifnull(snapstat.vehcount, 0) as vehcount, ifnull(snapstat.vehspeed, 0) as vehspeed, rdouter.devicecode from radardevices as rdouter left join("
                    . "select count(vehsnap.id) as vehcount, avg(nullif(speed,0)) as vehspeed, rd.devicecode from vehdetection_snap as vehsnap "
                    . " left join radardevices as rd on rd.macaddrint=vehsnap.macaddr  "
                    . "where detecttime>='"  . $small_time . "' and detecttime<'" . $large_time . "' group by rd.devicecode order by rd.devicecode ) as snapstat"
                    . " on rdouter.devicecode=snapstat.devicecode order by rdouter.devicecode ";
            
            $snaps = DB::select($snapsql);
            foreach($snaps as $snap){
//                echo $snap;
                //echo $snap->devicecode . "---". $snap->vehcount . "---" . $snap->vehspeed . " <br/>";
                if($snap->devicecode == "LS00110"){
                    echo date('Y-m-d',$small_timestamp) . ", " . date('H:i:s',$small_timestamp) . ", ";
                }
                
                echo $snap->vehcount . ", " . round($snap->vehspeed, 2);
                
                if($snap->devicecode != "LS00119"){
                    echo ", ";
                } else {
                    echo "<br/>";
                }
            }
//            echo $new_time . "     ";
        }
    }
}
