<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DeviceLog;
use App\BsmLog;
use App\User;
use App\Device;

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
                ->select("id")
                ->get();
        
        if(count($devices) == 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"设备不存在！");
            return json_encode($arr);
        }
        
        $deviceid = $devices[0]->id;        
        
        $logs = BsmLog::orderBy("id", "desc")
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
            if($file != '.' && $file != '..'){
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

        //输出文本中所有的行，直到文件结束为止。
        while(! feof($file)){
            $newlog = new DeviceLog();
            $newlog->logfile = $logfile;
            $newlog->deviceid = $did;
            $newlog->logcontent = trim(fgets($file));
            $newlog->save(); 
        }
        fclose($file);
    }    

    function importBsmLog(Request $request){
        $path = "/var/www/bsmlog/";
        $opendir = opendir($path);
        
        while ($file = readdir($opendir)){
            if($file != '.' && $file != '..'){
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

        //输出文本中所有的行，直到文件结束为止。
        while(! feof($file)){
            $newlog = new BsmLog();
            $newlog->logfile = $logfile;
            $newlog->deviceid = $did;
            $newlog->logcontent = trim(fgets($file));
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
        $monitorurl = $config_info["monitor_url"];
        
        $arr = array("retcode"=>ret_success, "monitorurl"=>$monitorurl);
        
        return json_encode($arr);
    }
    
    function checkUpdate(Request $request){
        $newapkfile = "update/rsu_rc_release_1.0.1_vc3.apk";
        $newversionname = "1.0.1";
        $newversioncode = 3;

        $arr = array("code"=>"0", "version"=>"null", "updateStatus"=>1,
            "versionCode"=>$newversioncode, "versionName"=>$newversionname,
            "modifyContent"=>"1. 红绿灯设置增加当前时间；\r\n2. 完善Bsm日志功能；",
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
}
