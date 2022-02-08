<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DeviceLog;
use App\Device;

use DB;

class DeviceLogController extends Controller
{
    function index(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time());
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate . " 23:59:59";
        }
        
        $searchdevice = "";
        if($request->has("devicecode")){
            $searchdevice = $request->devicecode;
        }

        $searchfile = "";
        if($request->has("logfile")){
            $searchfile = $request->logfile;
        }
        
        $searchkeyword = "";
        if($request->has("keyword")){
            $searchkeyword = $request->keyword;
        }
        
        $logfiles = DB::table('devicelogs')->select("devicelogs.logfile")
                ->distinct()
                ->leftjoin("devices as d", "d.id", "=", "devicelogs.deviceid")
                ->limit(100);
        
        $devicelogs = DeviceLog::orderby("devicelogs.id", "desc")
                ->select("devicelogs.id", "devicelogs.logcontent")
                ->leftjoin("devices as d", "d.id", "=", "devicelogs.deviceid");
//                ->limit(10000);
        
        if($searchfromdate != ""){
            $logfiles = $logfiles->where("devicelogs.created_at", ">=", $searchfromdate);
            $devicelogs = $devicelogs->where("devicelogs.created_at", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $logfiles = $logfiles->where("devicelogs.created_at", "<=", $searchtodate);
            $devicelogs = $devicelogs->where("devicelogs.created_at", "<=", $searchtodate);            
        }
        
        if($searchfile != ""){
            $devicelogs = $devicelogs->where("devicelogs.logfile", $searchfile);
        }
        
        if($searchkeyword != ""){
            $devicelogs = $devicelogs->where("devicelogs.logcontent", "like", "%" . $searchkeyword . "%");
            $logfiles = $logfiles->where("devicelogs.logcontent", "like", "%" . $searchkeyword . "%");
        }
        
        if($searchdevice != ""){
            $devicelogs = $devicelogs->where("d.id", $searchdevice);
            $logfiles = $logfiles->where("d.id", $searchdevice);
        } else {
            $devicelogs = $devicelogs->where("deviceid", -1);
            $logfiles = $logfiles->where("deviceid", -1);            
        }
        
        $devicelogs = $devicelogs->paginate(10000);
        $logfiles = $logfiles->get();
        
        $devices = Device::orderBy("id", "desc")
                ->select("id", "devicecode")
                ->get();
        
        $searchdevicename = "";
        $searchdevices = Device::where("id", $searchdevice)
                ->select("devicecode")
                ->get();
        if(count($searchdevices) > 0){
            $searchdevicename = $searchdevices[0]->devicecode;
        }
        
        return view("/other/devicelogs", [
            "devicelogs"=>$devicelogs,
            "logfiles"=>$logfiles,
            "devices"=>$devices,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchkeyword"=>$searchkeyword,
            "searchdevicecode"=>$searchdevice,
            "searchdevicename"=>$searchdevicename,
        ]);
    }
    
    function dlLogFile(Request $request){
        if($request->filename == "" || $request->devicecode == "" || $request->deviceid == ""){
            return "缺少参数！";
        }
        
        $devicecode = $request->devicecode;
        $deviceid = $request->deviceid;
        $logfile = $request->filename;        
        
        $exportpath = "reports/" ;
        if(!is_dir($exportpath)){
            mkdir($exportpath, 0777, true);
        }
        
        $logfilename = $logfile;
        if(substr($logfile, 0, strlen(".log")) !== ".log"){
            $logfilename = $logfile . ".log";
        }
        $exportfilename =  iconv("UTF-8", "GBK", $exportpath . $devicecode . "_" . $logfilename);
        if(file_exists($exportfilename)){
            return redirect($exportfilename);  
        }
               
//        $contentssrc .=  "," . "结算ID" . "," . "回收时间" . "\n";
//        $contents = iconv("UTF-8", "GBK", $contentssrc);
//        file_put_contents($exportfilename, $contents);

        $logs = DeviceLog::where("logfile", $logfile)
                ->where("deviceid", $deiceid)
                ->select("logcontent")
                ->orderBy("id", "asc")
                ->get();
        foreach($logs as $log){
            $datasrc = $log->logcontent . "\n";

            $contents = iconv("UTF-8", "GBK//IGNORE", $datasrc);
            file_put_contents($exportfilename, $contents, FILE_APPEND);
        }

        return redirect($exportfilename);            
    }
}
