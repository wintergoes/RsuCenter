<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cyupdate;

class CyupdateController extends Controller
{
    function getNextVersion(Request $request){
        $updates = Cyupdate::where("versionno", ">", $request->localversion)
                ->orderBy('versionno', 'asc')
                ->limit(1)
                ->get();
        
        if(count($updates) > 0){
            $arr = array("retcode" => "1", "versionno" => $updates[0]->versionno);
            return json_encode($arr);
        }else{
            $arr = array("retcode" => "0");
            return json_encode($arr);
        }
    }
}
