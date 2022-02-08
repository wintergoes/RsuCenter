<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DeviceLog;

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
        
        $logfiles = DB::table('devicelogs')->select("logfile")
                ->distinct()
                ->limit(100);
        
        $devicelogs = DeviceLog::orderby("id", "desc")
                ->select("id", "logcontent")
                ->limit(100000);
        
        if($searchfromdate != ""){
            $logfiles = $logfiles->where("created_at", ">=", $searchfromdate);
            $devicelogs = $devicelogs->where("created_at", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $logfiles = $logfiles->where("created_at", "<=", $searchtodate);
            $devicelogs = $devicelogs->where("created_at", "<=", $searchtodate);            
        }
        
        if($searchfile != ""){
            $devicelogs = $devicelogs->where("logfile", $searchfile);
        }
        
        if($searchdevice != ""){
            $devicelogs = $devicelogs->where("devicecode", $searchdevice);
            $logfiles = $logfiles->where("devicecode", $searchdevice);
        } else {
            $devicelogs = $devicelogs->where("devicecode", "00000");
            $logfiles = $logfiles->where("devicecode", "00000");            
        }
        
        $devicelogs = $devicelogs->get();
        $logfiles = $logfiles->get();
        
        return view("/other/devicelogs", [
            "devicelogs"=>$devicelogs,
            "logfiles"=>$logfiles,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchdevicecode"=>$searchdevice
        ]);
    }
    
    function dlLogFile(Request $request){
        if($request->filename == "" || $request->devicecode == ""){
            return "缺少参数！";
        }
        
        $devicecode = $request->devicecode;
        $logfile = $request->filename;
        
        $exportpath = "reports/" ;
        if(!is_dir($exportpath)){
            mkdir($exportpath, 0777, true);
        }        
        $exportfilename =  iconv("UTF-8", "GBK", $exportpath . $devicecode . "_" . $logfile . ".log");
               
//        $contentssrc .=  "," . "结算ID" . "," . "回收时间" . "\n";
//        $contents = iconv("UTF-8", "GBK", $contentssrc);
//        file_put_contents($exportfilename, $contents);

        $logs = DeviceLog::where("logfile", $logfile)
                ->where("devicecode", $devicecode)
                ->select("logcontent")
                ->orderBy("id", "asc")
                ->get();
        foreach($logs as $log){

            $datasrc = $log->logcontent;

            $contents = iconv("UTF-8", "GBK//IGNORE", $datasrc);
            file_put_contents($exportfilename, $contents, FILE_APPEND);
        }

        return redirect($exportfilename);            
    }
}
