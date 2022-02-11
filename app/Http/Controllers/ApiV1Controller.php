<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DeviceLog;
use App\BsmLog;
use App\User;
use App\Device;

use DB;
use Auth;

define("ret_success", 1);
define("ret_error", -1);
define("ret_invalid_auth", -2);

class ApiV1Controller extends Controller
{
    function getLog(Request $request){
        if(!$request->has("devicecode")){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr);
        }
        
        $devices = Device::where("devicecode", $request->devicecode)
                
                ->select("id")
                ->get();
        
        if(count($devices) == 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"设备不存在！");
            return json_encode($arr);
        }
        
        $deviceid = $devices[0]->id;
        
        $logs = DeviceLog::orderBy("id", "desc")
		->orderBy("lineno", "desc")
                ->where("deviceid", $deviceid)
                ->limit(1000);
        
        if($request->has("maxid") && $request->maxid != "-1"){
            $logs = $logs->where("id", ">", $request->maxid);
        }
        
        if($request->has("minid") && $request->minid != "-1"){
            $logs = $logs->where("id", "<", $request->minid);
        }
        
        $logs = $logs->get();
        
        $arr = array("retcode"=>ret_success, "count"=>count($logs), "logs"=>$logs);
        return json_encode($arr);
    }
    
    function getBsmLog(Request $request){
        if(!$request->has("devicecode")){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr);
        }
        
        $devices = Device::where("devicecode", $request->devicecode)
		->orderBy("lineno", "desc")
                ->select("id")
                ->get();
        
        if(count($devices) == 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"设备不存在！");
            return json_encode($arr);
        }
        
        $deviceid = $devices[0]->id;        
        
        $logs = BsmLog::orderBy("created_at", "desc")
		->orderBy("lineno", "desc")
                ->where("deviceid", $deviceid)
                ->limit(1000);
        
        if($request->has("maxid") && $request->maxid != "-1"){
            $logs = $logs->where("id", ">", $request->maxid);
        }
        
        if($request->has("minid") && $request->minid != "-1"){
            $logs = $logs->where("id", "<", $request->minid);
        }
        
        $logs = $logs->get();
        
        $arr = array("retcode"=>ret_success, "count"=>count($logs), "logs"=>$logs);
        return json_encode($arr);        
    }

    function importLog(Request $request){
        $path = "/var/www/log/";
        $opendir = opendir($path);
        
        while ($file = readdir($opendir)){
            if($file != '.' && $file != '..' && $file != 'testbsmlog' && $file != 'testlog'){
                $secondpath = $path.'/'.$file;
                if(is_dir($secondpath)){
                    $dcode = $file;
                    
                    $deviceid = 0;
                    $devices = Device::where("devicecode", $dcode)
                            ->select("id")
                            ->get();
                    if(count($devices) > 0){
                        $deviceid = $devices[0]->id;
                    } else {
                        $newdevice = new Device();
                        $newdevice->devicecode = $dcode;
                        $newdevice->save();
                        
                        $deviceid = $newdevice->id;
                    }
                    $seconddir = opendir($secondpath);
                    while($secondfile = readdir($seconddir)){
                        if(substr($secondfile, 0, strlen(".swp")) === ".swp"){
                            continue;
                        }
                        if($secondfile != '.' && $secondfile != '..'){
                            $thirdpath = $secondpath . "/" . $secondfile;
                            if(!is_dir($thirdpath)){
                                $chkfileimported = DeviceLog::where("logfile", $secondfile)
                                        ->where("deviceid", $deviceid)
                                        ->limit(1)
                                        ->get();
                                if(count($chkfileimported) > 0){
                                    continue;
                                } else {
                                    $this->readLog($thirdpath, $secondfile, $deviceid);
                                }
                            }
                        }
                    }
                }
            }
        }        
        closedir($opendir);
    }
    
    function readLog($path, $logfile, $did){
        $file = fopen($path, "r");
	$allowed = array("\x9", /* , ... */);

	$time = $this->filename2Time($logfile);
        $lineno = 0;
        //输出文本中所有的行，直到文件结束为止。
        while(! feof($file)){  
            $linestr = trim(fgets($file));
            $newlinestr = "";
            for($i=0; $i < strlen($linestr); $i++) {
                // check if current char is printable
                if(ctype_print($linestr[$i]) || in_array($linestr[$i], $allowed)) {
                    $newlinestr = $newlinestr . $linestr[$i];
                } else {
			$newlinestr = $newlinestr . " 0x" . strtoupper(dechex(ord($linestr[$i]))) . " ";
                }   
            } 
//            echo $linestr . "<br>";
//            echo $newlinestr . "<br><br>";
            $lineno = $lineno + 1;
            try{
                $newlog = new DeviceLog();
                $newlog->logfile = $logfile;
                $newlog->lineno = $lineno;
                $newlog->deviceid = $did;
                $newlog->logcontent = $newlinestr;
                $newlog->created_at = $time;
                $newlog->save(); 
            } catch (Exception $e){
                print $e->getMessage();
            }
        }
        fclose($file);
    }   

    function filename2Time($logfile){
        $tmpfilename = str_replace(".log", "", $logfile);
        if(strpos($tmpfilename,'_') !== false){
            $strs = explode("_", $tmpfilename);
            if(count($strs) >= 6){
                $time = strtotime($strs[0] . "-" . $strs[1] . "-" . $strs[2] . " " . $strs[3] . ":" . $strs[4] . ":" . $strs[5]);
            } else {
                $time = time();
            }
        } else{
            $time = time();
        }
        //echo $logfile . "+++++" . date("Y-m-d h:i:s", $time) . "++++" . time();
        return $time;        
    }
    
    function bsmFilename2Time($logfile){
        $tmpfilename = str_replace(".log", "", $logfile);
        if(strpos($tmpfilename,'_') !== false){
            $strs = explode("_", $tmpfilename);
            if(count($strs) >= 6){
                $time = strtotime("20" . $strs[0] . "-" . $strs[1] . "-" . $strs[2] . " " . $strs[3] . ":" . $strs[4] . ":" . $strs[5]);
	//	echo "<br/>" .$time . "-----<br/>";
            } else {
                $time = time();
            }
        } else{
            $time = time();
        }
        echo $logfile . "+++++" . date("Y-m-d H:i:s", $time);
        return $time;        
    } 

    function importBsmLog(Request $request){
        $path = "/var/www/bsmlog/";
        $opendir = opendir($path);
        
        while ($file = readdir($opendir)){
            if($file != '.' && $file != '..' && $file != 'testbsmlog' && $file != 'testlog'){
                $secondpath = $path.'/'.$file;
                if(is_dir($secondpath)){
                    $dcode = $file;
                    
                    $deviceid = 0;
                    $devices = Device::where("devicecode", $dcode)
                            ->select("id")
                            ->get();
                    if(count($devices) > 0){
                        $deviceid = $devices[0]->id;
                    } else {
                        $newdevice = new Device();
                        $newdevice->devicecode = $dcode;
                        $newdevice->save();
                        
                        $deviceid = $newdevice->id;
                    }                    
                    $seconddir = opendir($secondpath);
                    while($secondfile = readdir($seconddir)){
                        if(substr($secondfile, 0, strlen(".swp")) === ".swp"){
                            continue;
                        }
                        
                        if($secondfile != '.' && $secondfile != '..'){
                            $thirdpath = $secondpath . "/" . $secondfile;
                            if(!is_dir($thirdpath)){
                                $chkfileimported = BsmLog::where("logfile", $secondfile)
                                        ->where("deviceid", $deviceid)
                                        ->limit(1)
                                        ->get();
                                if(count($chkfileimported) > 0){
                                    continue;
                                } else {
                                    $this->readBsmLog($thirdpath, $secondfile, $deviceid);
                                }
                            }
                        }
                    }
                }
            }
        }        
        closedir($opendir);        
    }    
    
    function readBsmLog($path, $logfile, $did){
        $file = fopen($path, "r");
	$allowed = array("\x9", /* , ... */);

	$time = $this->bsmFilename2Time($logfile);

        $lineno = 0;
        //输出文本中所有的行，直到文件结束为止。
        while(! feof($file)){  
            $lineno = $lineno + 1;
            $linestr = trim(fgets($file));
            $newlinestr = "";
            for($i=0; $i < strlen($linestr); $i++) {
                // check if current char is printable
		if(ctype_print($linestr[$i]) || in_array($linestr[$i], $allowed)) {
                    $newlinestr = $newlinestr . $linestr[$i];
                } else {
                    $newlinestr = $newlinestr . " 0x" . strtoupper(dechex(ord($linestr[$i]))) . " ";
                }   
            }             
            
            $newlog = new BsmLog();
            $newlog->logfile = $logfile;
            $newlog->lineno = $lineno;
            $newlog->deviceid = $did;
            $newlog->logcontent = $newlinestr;
		$newlog->created_at = $time;
            $newlog->save();  
        }
        fclose($file);
    }    


    function getServerConfig(Request $request){
        //读取.init文件
        $config_file_path = '/var/www/rsu_config.ini';
        //自己编写一个 my_parse_ini_file 将 db.init
        //说明 db.init 必须是规则
        //属性=属性值 可以多行
        $config_info = parse_ini_file($config_file_path);
        $monitorurl = array_key_exists("monitor_url", $config_info) ? $config_info["monitor_url"] : "";
        $monitoru = array_key_exists("monitor_u", $config_info) ? $config_info["monitor_u"] : ""; 
        $monitorp = array_key_exists("monitor_p", $config_info) ? $config_info["monitor_p"] : "";       
 
        $arr = array("retcode"=>ret_success, "monitorurl"=>$monitorurl,
            "monitoru"=>$monitoru, "monitorp"=>$monitorp);       
 
        return json_encode($arr);
    }
    
    function checkUpdate(Request $request){
        $newapkfile = "update/rsu_rc_release_1.0.5_vc7.apk";
        $newversionname = "1.0.5";
        $newversioncode = 7;
        
        $arr = array("code"=>"0", "version"=>"null", "updateStatus"=>1,
            "versionCode"=>$newversioncode, "versionName"=>$newversionname, 
            "modifyContent"=>"1. Bug修复；",
            "downloadUrl"=>"http://114.116.195.168/" . $newapkfile,
            "apkSize"=>  filesize($newapkfile) / 1024,
            "apkMd5"=>  md5_file($newapkfile));
        
        return json_encode($arr);
    }
    
    function clientLogin(Request $request){
        if(Auth::once(['username' => $request->username, 'password' => $request->password])){
            $users = User::where('username', $request->username)
                     ->get();

            if(count($users) > 0){
                $user = $users[0];
                $arr = array ('retcode'=>ret_success, 'data'=>$user);
                return json_encode($arr);
            }else{
                 $arr = array ('retcode'=>ret_invalid_auth);
                 return json_encode($arr);
            }
        }else{
            $arr = array ('retcode'=>ret_invalid_auth);
            return json_encode($arr);
        }        
    }

    function logs(Request $request){
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
        
        $searchlogtype = "";
        if($request->has("logtype")){
            $searchlogtype = $request->logtype;
        }
        
        $searchkeyword = "";
        if($request->has("keyword")){
            $searchkeyword = $request->keyword;
        }
        
        $logtable = "";
        if($searchlogtype == "1"){
            $logtable = "bsmlogs.";
            $devicelogs = BsmLog::orderby("bsmlogs.created_at", "desc")
			->orderBy("bsmlogs.lineno", "desc");
        } else {
            $logtable = "devicelogs.";
            $devicelogs = DeviceLog::orderby("devicelogs.created_at", "desc")
			->orderby("devicelogs.lineno", "desc");
        }
        
        $devicelogs = $devicelogs->select($logtable . "id", $logtable . "logcontent")
                ->leftjoin("devices as d", "d.id", "=", $logtable . "deviceid");
//                ->limit(10000);
        
        if($searchfromdate != ""){
            $devicelogs = $devicelogs->where($logtable . "created_at", ">=", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $devicelogs = $devicelogs->where($logtable . "created_at", "<=", $searchtodate);            
        }
        
        if($searchfile != ""){
            $devicelogs = $devicelogs->where($logtable . "logfile", $searchfile);
        }
        
        if($searchkeyword != ""){
            $devicelogs = $devicelogs->where($logtable . "logcontent", "like", "%" . $searchkeyword . "%");
        }
        
        if($searchdevice != ""){
            $devicelogs = $devicelogs->where("d.devicecode", $searchdevice);
        } else {
            $devicelogs = $devicelogs->where("deviceid", -1);          
        }
        
        $devicelogs = $devicelogs->paginate(10000);

        
        return view("/mobile/logs", [
            "devicelogs"=>$devicelogs,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchkeyword"=>$searchkeyword,
            "searchdevicecode"=>$searchdevice,
		"searchlogtype"=>$searchlogtype,
        ]);   
    }

    function resetPassword(Request $request){
        if(!$request->has("newpassword")){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr);
        } 

        if(Auth::once(['username' => $request->username, 'password' => $request->password])){
            $users = User::where('username', $request->username)
                     ->get();

            if(count($users) > 0){
                $user = $users[0];
                $user->password = bcrypt($request->newpassword);
                $user->save();
                $arr = array ('retcode'=>ret_success, 'data'=>$user);
                return json_encode($arr);
            }else{
                 $arr = array ('retcode'=>ret_invalid_auth);
                 return json_encode($arr);
            }            
        }else{
            $arr = array ('retcode'=>ret_invalid_auth);
            return json_encode($arr);
        } 
    }
}
