<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DeviceLog;
use App\Device;
use App\BsmLog;

use DB;

class DeviceLogController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }
        
        $logtype = $request->logtype;
        if($logtype == ""){
            $logtype = "0";
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time()) . " 00:00:00";
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
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
        
        $logtable = "";
        if($logtype == "1"){
            $logtable = "bsmlogs.";
            $logfiles = DB::table('bsmlogs')->select($logtable . "logfile");
            $devicelogs = BsmLog::orderby($logtable . "created_at", "desc");            
        } else {
            $logtable = "devicelogs.";
            $logfiles = DB::table('devicelogs')->select($logtable . "logfile");
            $devicelogs = DeviceLog::orderby($logtable . "created_at", "desc");
        }        
        
        
        $logfiles = $logfiles->distinct()
                ->orderBy($logtable . "logfile", "desc")
                ->leftjoin("devices as d", "d.id", "=", $logtable . "deviceid")
                ->limit(100);
        
        
        $devicelogs = $devicelogs->orderBy($logtable . "lineno", "desc")
                ->select($logtable . "id", $logtable . "logcontent")
                ->leftjoin("devices as d", "d.id", "=", $logtable . "deviceid");
//                ->limit(10000);
        
        if($searchfromdate != ""){
            $logfiles = $logfiles->where($logtable . "created_at", ">=", $searchfromdate);
            $devicelogs = $devicelogs->where($logtable . "created_at", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $logfiles = $logfiles->where($logtable . "created_at", "<=", $searchtodate);
            $devicelogs = $devicelogs->where($logtable . "created_at", "<=", $searchtodate);            
        }
        
        if($searchfile != ""){
            $devicelogs = $devicelogs->where($logtable . "logfile", $searchfile);
        }
        
        if($searchkeyword != ""){
            $devicelogs = $devicelogs->where($logtable . "logcontent", "like", "%" . $searchkeyword . "%");
            $logfiles = $logfiles->where($logtable . "logcontent", "like", "%" . $searchkeyword . "%");
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
            "logtype"=>$logtype
        ]);
    }
        
    function logfileContent(Request $request){
        if($request->filename == "" || $request->devicecode == "" || $request->deviceid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $devicecode = $request->devicecode;
        $deviceid = $request->deviceid;
        $logfile = $request->filename;
        $logtype = $request->logtype;
        
        $logtypestr = "";
	$path = "/var/www/"; // 根目录地址
        if($logtype == "1"){
            $logtypestr = "_bsm";
            $path = $path . "bsmlog/" . $devicecode . "/";
        } else {
            $path = $path . "log/" . $devicecode . "/";
        }
        
        $path .= $logfile;
        $allowed = array("\x9", "\xd", "\xa" /* , ... */);   
        //echo $path;
        
	if (is_file($path)) {
            $handle = fopen($path, "rb");//读取二进制文件时，需要将第二个参数设置成'rb'

            //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
            $contents = fread($handle, filesize ($path));
            $newcontent = "";
            for($i=0; $i < strlen($contents); $i++) {
                if(ctype_print($contents[$i]) || in_array($contents[$i], $allowed)){
                    $newcontent = $newcontent . $contents[$i];
                } else {
                    $newcontent = $newcontent . "0x" . strtoupper(dechex(ord($contents[$i]))) ;
                }
            }
            
            fclose($handle);
            return view("/other/logcontent", [
                "logtype"=>$logtype,
                "logfile"=>$logfile,
                "logcontent"=>$newcontent,
            ]);
	} else {
            return view('/other/simplemessage', [
                'simplemessage'=>"log文件不存在(" . $logfile . "), Log类型：" . $logtype . "！",
            ]);
        }
    }    
}
