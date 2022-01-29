<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DeviceLog;
use App\BsmLog;

define("ret_success", 1);
define("ret_error", -1);

class ApiV1Controller extends Controller
{
    function getLog(Request $request){
        if(!$request->has("devicecode")){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr);
        }
        
        $logs = DeviceLog::orderBy("id", "desc")
                ->where("devicecode", $request->devicecode)
                ->limit(100);
        
        if($request->has("maxid")){
            $logs = $logs->where("id", ">", $request->maxid);
        }
        $logs = $logs->get();
        
        $arr = array("retcode"=>ret_success, "count"=>count($logs), "logs"=>$logs);
        return json_encode($arr);
    }
    
    function getBsmLog(Request $request){
        
    }

    function importLog(Request $request){
        $path = "/var/www/log/";
        $opendir = opendir($path);
        
        while ($file = readdir($opendir)){
            if($file != '.' && $file != '..'){
                $secondpath = $path.'/'.$file;
                if(is_dir($secondpath)){
                    $dcode = $file;
                    $seconddir = opendir($secondpath);
                    while($secondfile = readdir($seconddir)){
                        if($secondfile != '.' && $secondfile != '..'){
                            $thirdpath = $secondpath . "/" . $secondfile;
                            if(!is_dir($thirdpath)){
                                $chkfileimported = DeviceLog::where("logfile", $secondfile)
                                        ->where("devicecode", $dcode)
                                        ->limit(1)
                                        ->get();
                                if(count($chkfileimported) > 0){
                                    continue;
                                } else {
                                    $this->readLog($thirdpath, $secondfile, $dcode);
                                }
                            }
                        }
                    }
                }
            }
        }        
        closedir($opendir);
    }
    
    function readLog($path, $logfile, $dcode){
        $file = fopen($path, "r");
//        $user=array();
//        $i=0;
        //输出文本中所有的行，直到文件结束为止。
        while(! feof($file)){
            $newlog = new DeviceLog();
            $newlog->logfile = $logfile;
            $newlog->devicecode = $dcode;
            $newlog->logcontent = trim(fgets($file));
            $newlog->save();            
//            $user[$i]= trim(fgets($file));//fgets()函数从文件指针中读取一行
//            $i++;
        }
        fclose($file);
//        $user=array_filter($user);
//        return $user;
    }    

    function importBsmLog(Request $request){
        
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
        $newapkfile = "update/rsu_rc_1_0_11.apk";
        $newversionname = "1.0.11";
        $newversioncode = 12;
        
        $arr = array("code"=>"0", "version"=>"null", "updateStatus"=>1,
            "versionCode"=>$newversioncode, "versionName"=>$newversionname, 
            "modifyContent"=>"1. fix ...",
            "downloadUrl"=>"http://114.116.195.168/" . $newapkfile,
            "apkSize"=>  filesize($newapkfile) / 1024,
            "apkMd5"=>  md5_file($newapkfile));
        
        return json_encode($arr);
    }
}
