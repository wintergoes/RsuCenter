<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DeviceLog;
use App\BsmLog;
use App\User;
use App\Device;
use App\UploadFile;
use App\ObuDevice;
use App\SysToken;
use App\Road;
use App\RoadCoordinate;
use App\RoadLink;
use App\ObuRouteDetail;
use App\ClockIn;
use App\WarningRecord;

use DB;
use Auth;

require_once '../app/Constant.php';

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
	$time = $this->filename2Time($logfile);
        
        $newlog = new DeviceLog();
        $newlog->logfile = $logfile;
        $newlog->lineno = 0;
        $newlog->deviceid = $did;
        $newlog->logcontent = "";
        $newlog->created_at = $time;
        $newlog->save();        
                
        $file = fopen($path, "r");
	$allowed = array("\x9", /* , ... */);                
                
        $lineno = 0;
        //输出文本中所有的行，直到文件结束为止。
        while(! feof($file)){  
            $linestr = trim(fgets($file));
            if($linestr == ""){
                continue;
            }
            
//            $newlinestr = $linestr;            
            
            $newlinestr = "";
            for($i=0; $i < strlen($linestr); $i++) {
                // check if current char is printable
                if(ctype_print($linestr[$i]) || in_array($linestr[$i], $allowed)) {
                    $newlinestr = $newlinestr . $linestr[$i];
                } else {
                    $newlinestr = $newlinestr . "0x" . strtoupper(dechex(ord($linestr[$i]))) ;
                }   
            } 

            for($i = 0; $i <= strlen($newlinestr) / 3000; $i++){
                $innerlinestr = substr($newlinestr, $i * 3000, 3000);
                $newlog = new DeviceLog();
                $newlog->logfile = $logfile;
                $newlog->lineno = $lineno;
                $newlog->deviceid = $did;
                $newlog->logcontent = $innerlinestr;
                $newlog->created_at = $time;
                $newlog->save(); 
                $lineno = $lineno + 1;
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

    function importBsmLog(Request $request){
        $path = "/var/www/bsmlog/";
        $opendir = opendir($path);
        
        while ($file = readdir($opendir)){
            if($file != '.' && $file != '..' && $file != 'testbsmlog' && $file != 'testlog' && $file != 'bakBSM'){
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
        $time = $this->filename2Time($logfile);        
        
        $newlog = new BsmLog();
        $newlog->logfile = $logfile;
        $newlog->lineno = 0;
        $newlog->deviceid = $did;
        $newlog->logcontent = "";
        $newlog->created_at = $time;
        $newlog->save();  
                
//        $file = fopen($path, "r");
//	$allowed = array("\x9", /* , ... */);
//
//	
//
//        $lineno = 1;
//        //输出文本中所有的行，直到文件结束为止。
//        while(! feof($file)){              
//            $linestr = trim(fgets($file));
//            if($linestr == ""){
//                continue;
//            }
//           
////            $newlinestr = $linestr;
//            
//            $newlinestr = "";
//            for($i=0; $i < strlen($linestr); $i++) {
//                // check if current char is printable
//		if(ctype_print($linestr[$i]) || in_array($linestr[$i], $allowed)) {
//                    $newlinestr = $newlinestr . $linestr[$i];
//                } else {
//                    $newlinestr = $newlinestr . "0x" . strtoupper(dechex(ord($linestr[$i]))) ;
//                }   
//            }
//            
//            for($i = 0; $i <= strlen($newlinestr) / 3000; $i++){
//                $innerlinestr = substr($newlinestr, $i * 3000, 3000);
//                $newlog = new BsmLog();
//                $newlog->logfile = $logfile;
//                $newlog->lineno = $lineno;
//                $newlog->deviceid = $did;
//                $newlog->logcontent = $innerlinestr;
//                $newlog->created_at = $time;
//                $newlog->save();  
//                $lineno = $lineno + 1;                
//            }
//        }
//        fclose($file);
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
    
    function getObuServerConfig(Request $request){
        if($this->obuApiAuth($request) === false){
            $arr = array("retcode"=>ret_invalid_auth, "retmsg"=>"验证失败！");
            return json_encode($arr);
        }        
        
        $clockin_on_start = env("clockin_on_start") ;
        if($clockin_on_start == ""){
            $clockin_on_start = "0700";
        }
        
        $clockin_on_end = env("clockin_on_end") ;
        if($clockin_on_end == ""){
            $clockin_on_end = "0900";
        }
        
        $clockin_off_start = env("clockin_off_start") ;
        if($clockin_off_start == ""){
            $clockin_off_start = "1700";
        }
        
        $clockin_off_end = env("clockin_off_end") ;
        if($clockin_off_end == ""){
            $clockin_off_end = "2359";
        }
 
        $arr = array("retcode"=>ret_success, "clockin_on_start"=>$clockin_on_start,
            "clockin_on_end"=>$clockin_on_end, "clockin_off_start"=>$clockin_off_start,
            "clockin_off_end"=>$clockin_off_end);
 
        return json_encode($arr);
    }    
    
    function checkUpdate(Request $request){
        if($request->appKey == "cn.chibc.v2xapp"){
            $newapkfile = "update/v2xapp/v2x_release_1.0_vc1.apk";
            $newversionname = "1.0.1";
            $newversioncode = 2;
            $modifycontent = "1. Bug修复；";
        } else {
            $newapkfile = "update/rsu_rc_release_1.0.7_vc9.apk";
            $newversionname = "1.0.7";
            $newversioncode = 9;
            $modifycontent = "1. Bug修复；";
        }
        
        $arr = array("code"=>"0", "version"=>"null", "updateStatus"=>1,
            "versionCode"=>$newversioncode, "versionName"=>$newversionname, 
            "modifyContent"=>$modifycontent,
            "downloadUrl"=>"http://114.116.195.168/" . $newapkfile,
            "apkSize"=>  filesize($newapkfile) / 1024,
            "apkMd5"=>  md5_file($newapkfile));
        
        return json_encode($arr);
    }
    
    function clientLogin(Request $request){
        if(Auth::once(['username' => $request->username, 'password' => $request->password])){
            $users = User::where('username', $request->username)
                    ->select("users.id", "users.username", "users.realname", "st.tokenvalue")
                    ->leftjoin("systokens as st", function ($join) {
                            $join->on('st.relatedid', '=', 'users.id')
                                ->where('st.tokentype', '=', token_usertoken_on_obu);
                            })
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
            $searchfromdate = date('Y-m-d',time()) . " 00:00:00";
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate;
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
            $logfiles = DB::table('bsmlogs')->select($logtable . "logfile");
            $devicelogs = BsmLog::orderby("bsmlogs.created_at", "desc")
			->orderBy("bsmlogs.lineno", "desc");
        } else {
            $logtable = "devicelogs.";
            $logfiles = DB::table('devicelogs')->select($logtable . "logfile");
            $devicelogs = DeviceLog::orderby("devicelogs.created_at", "desc")
			->orderby("devicelogs.lineno", "desc");
        }
        
        $logfiles = $logfiles->distinct()
                ->orderBy($logtable . "logfile", "desc")
                ->leftjoin("devices as d", "d.id", "=", $logtable . "deviceid");        
        
        $devicelogs = $devicelogs->select($logtable . "id", $logtable . "logcontent")
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
        }
        
        if($searchdevice != ""){
            $devicelogs = $devicelogs->where("d.devicecode", $searchdevice);
            $logfiles = $logfiles->where("d.devicecode", $searchdevice);
        } else {
            $devicelogs = $devicelogs->where("deviceid", -1);  
            $logfiles = $logfiles->where("deviceid", -1);
        }
        
        $devicelogs = $devicelogs->paginate(10000);
        $logfiles = $logfiles->get();
        
        $searchdeviceid = "";
        $searchdevices = Device::where("devicecode", $searchdevice)
                ->select("id")
                ->get();
        if(count($searchdevices) > 0){
            $searchdeviceid = $searchdevices[0]->id;
        }        
        
        return view("/mobile/logs", [
            "devicelogs"=>$devicelogs,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchkeyword"=>$searchkeyword,
            "searchdevicecode"=>$searchdevice,
            "searchlogtype"=>$searchlogtype,
            "logfiles"=>$logfiles,
            "searchdeviceid"=>$searchdeviceid,
            "logtype"=>$searchlogtype
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
    
    function dlLogFile(Request $request){
        if($request->filename == "" || $request->devicecode == "" || $request->deviceid == ""){
            return "缺少参数！";
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
        
        //echo $path;
        
	if (is_file($path)) {
	    header("Content-Description: File Transfer");
	    header("Content-Type: application/octet-stream");
	    header("Content-Disposition: attachment; filename= ".basename($devicecode . $logtypestr . "_" .$logfile)." ");
	    header("Content-Transfer-Encoding: binary");
	    header("Connection: Keep-Alive");
	    header("Expires: 0");
	    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	    header("Pragma: public");
	    header("Content-Length: " . filesize($path));
	    readfile($path);
	    exit;
	} else {
            return "文件不存在！";
        }
    }    
            
    function dlLogFile_old(Request $request){
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
                ->where("deviceid", $deviceid)
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
    
    function bdmapJs(Request $request){
        //1. 如果传递数据了，说明向服务器提交数据(post)，如果没有传递数据，认为从服务器读取资源(get)
        $ch = curl_init();
        //2. 不管是get、post，跳过证书的验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $mapjsurl = "https://api.map.baidu.com/api?v=3.0&ak=lKXGBob7gIDaPPzrfc6qtHTBNukNcLzE";
        if($request->maptype == "webgl"){
            $mapjsurl .= "&type=webgl";
        }
        //3. 设置请求的服务器地址
        curl_setopt($ch, CURLOPT_URL, $mapjsurl);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

        curl_close($ch);     
    }
    
    function uploadFile(Request $request){
        if(!file_exists(upload_folder)){
            mkdir(upload_folder, 0777, true);
        }
        
        $base_path = upload_folder;
        
        if($request->filetype == upd_file_obu_picture){
            $base_path .= "obuimages/" ;
        } else if($request->filetype == upd_file_obu_video){
            $base_path .= "obuvideos/" ;
        }

        if(!file_exists($base_path)){
            mkdir($base_path, 0777, true);
        }
        
        $base_path .=  $request->obuid . "/";
        if(!file_exists($base_path)){
            mkdir($base_path, 0777, true);
        }        

        $target_path = $base_path . $request->filename;
        //$fileputres = file_put_contents($target_path, $request->file);
        if(!move_uploaded_file ($_FILES["file"]["tmp_name"], $target_path )){
            $array = array ("retcode" => ret_upload_error, "retmsg" => "上传失败!", "path"=>$_FILES["file"]["error"]);
            return json_encode ( $array );
        };
        
        $obuid = "0";
        if($request->obuid != ""){
            $obuid = $request->obuid;
        }
        
        $uploader = "0";
        if($request->uploader != ""){
            $uploader = $request->uploader;
        }
        
        $updfile = new UploadFile();
        $updfile->obuid = $obuid;
        $updfile->uploader = $uploader;
        $updfile->filetype = $request->filetype;
        $updfile->filename = $request->filename;
        $updfile->filesize = $request->filesize;
        $updfile->filemd5 = $request->filemd5;
        $updfile->medialen = $request->medialen;
        if($request->createtime != ""){
            $updfile->created_at = $request->createtime;
        }
        $updfile->save();

        //echo $request->file;

        $array = array ("retcode" => ret_success, "retmsg" => "上传成功！", "filelocalid"=>$request->filelocalid );
        return json_encode ( $array );
    }
    
    public static function create_uuid($prefix=""){
        $chars = md5(uniqid(mt_rand(), true));
        $uuid = substr ( $chars, 0, 8 )
            . substr ( $chars, 8, 4 ) 
            . substr ( $chars, 12, 4 )
            . substr ( $chars, 16, 4 )
            . substr ( $chars, 20, 12 );
        return $prefix.$uuid ;
    }    
    
    function registerObu(Request $request){
        if($request->localid == ""){
            $array = array ("retcode" => ret_error, "retmsg" => "缺少参数！" );
            return json_encode ( $array );
        }
        
        //echo $request->localid;
        $obus = ObuDevice::where("obulocalid", "=", $request->localid)
                ->get();
        
//        echo count($obus);
        if(count($obus) > 0){
            $tokens = SysToken::where("relatedid", $obus[0]->id)
                    ->where("tokentype", token_obu_local)
                    ->get();
            
            $array = array ("retcode" => ret_success, "obu" => $obus[0], "token"=>$tokens[0], "firstreg"=>"0");
            return json_encode ( $array );
        }
        
        $obu = new ObuDevice();
        $obu->obulocalid = $request->localid;
        $obu->save();
        
        $obu->obuid = "OBU" . str_pad($obu->id, 6, "0", STR_PAD_LEFT);
        $obu->save();
        
        $systoken = new SysToken();
        $systoken->tokentype = token_obu_local;
        $systoken->relatedid = $obu->id;
        $systoken->tokenvalue = $this->create_uuid();
        $systoken->save();
        
        $array = array ("retcode" => ret_success, "obu" => $obu, "token"=>$systoken, "firstreg"=>"1");
        return json_encode ( $array ); 
    }
    
    function obuApiAuth(Request $request){
        return true;
    }
    
    function getManagers(Request $request){
        if($this->obuApiAuth($request) === false){
            $arr = array("retcode"=>ret_invalid_auth, "retmsg"=>"验证失败！");
            return json_encode($arr);
        }        
        
        $users = User::orderBy("users.id", "desc")
                ->select("users.id", "users.username", "users.realname")
                ->leftjoin("usergroups as ug", "users.usergroup", "=", "ug.id")
                ->where("users.username", "<>", "admin");
        if($request->usergroupname != ""){
            $users = $users->where("ug.groupname", $request->usergroupname);
        } else {
            
        }
        $users = $users->get();
        
        $arr = array("retcode"=>ret_success, "users"=>$users);
        return json_encode($arr);
    }
    
    function uploadLocations(Request $request){
        if($this->obuApiAuth($request) === false){
            $arr = array("retcode"=>ret_invalid_auth, "retmsg"=>"验证失败！");
            return json_encode($arr);
        }

        $localids = "";
        $locs = json_decode($request->locjson);
        foreach($locs as $loc){
            $oburoutedetail = new ObuRouteDetail();
            $oburoutedetail->obuid = $request->obuid;
            $oburoutedetail->lat = $loc->lat;
            $oburoutedetail->lng = $loc->lng;
            $oburoutedetail->altitude = $loc->altitude;
            $oburoutedetail->distance = $loc->distance;
            $oburoutedetail->locationtype = $loc->locationtype;
            $oburoutedetail->created_at = strtotime($loc->ctime);
            $oburoutedetail->save();
            
            if($localids == ""){
                $localids = $loc->id;
            } else {
                $localids .= "," . $loc->id;
            }
        }
        
        $arr = array("retcode"=>ret_success, "localids"=>$localids);
        return json_encode($arr);
    }
    
    function uploadWarningRecords(Request $request){
        if($this->obuApiAuth($request) === false){
            $arr = array("retcode"=>ret_invalid_auth, "retmsg"=>"验证失败！");
            return json_encode($arr);
        }

        $localids = "";
        $jsonrows = json_decode($request->wrjson);
        foreach($jsonrows as $row){
            $wrecord = new WarningRecord();
            $wrecord->obuid = $request->obuid;
            $wrecord->eventid = $row->eventid;
            $wrecord->eventtype = $row->eventtype;
            $wrecord->eventsource = $row->eventsource;
            $wrecord->eventstarttime = $row->eventstarttime ;
            $wrecord->eventlat = $row->eventlat;
            $wrecord->eventlng = $row->eventlng;
            $wrecord->obulat = $row->obulat;
            $wrecord->obulng = $row->obulng;
            $wrecord->obualt = $row->obualt;
            $wrecord->created_at = $row->createtime ;
            $wrecord->save();
            
            if($localids == ""){
                $localids = $row->id;
            } else {
                $localids .= "," . $row->id;
            }
        }
        
        $arr = array("retcode"=>ret_success, "localids"=>$localids);
        return json_encode($arr);
    }    
    
    function getRoadInfo(Request $request){
        if($this->obuApiAuth($request) === false){
            $arr = array("retcode"=>ret_invalid_auth, "retmsg"=>"验证失败！");
            return json_encode($arr);
        }
        
        $maxroadid = 0;
        $maxrcid = 0;
        $maxroadlinkid = 0;
        
//        if($request->maxroadid != ""){
//            $maxroadid = $request->maxroadid;
//        }
        
        if($request->maxrcid != ""){
            $maxrcid = $request->maxrcid;
        }
        
        if($request->maxroadlinkid != ""){
            $maxroadlinkid = $request->maxroadlinkid;
        }
        
        $roads = Road::orderBy("id", "asc")
                ->where("published", 1)
                ->select("id", "roadname", "remark")
                ->get();
        
        $roadcoords = RoadCoordinate::orderBy("roadcoordinates.id", "asc")
                ->where("roadcoordinates.id", ">", $maxrcid)
                ->where("r.published", 1)
                ->select("roadcoordinates.id", "roadcoordinates.coordtype", "roadcoordinates.roadid", "roadcoordinates.laneno", "roadcoordinates.lanetype", 
                        "roadcoordinates.lat1", "roadcoordinates.lng1", "roadcoordinates.lat2", "roadcoordinates.lng2", 
                        "roadcoordinates.lat3", "roadcoordinates.lng3", "roadcoordinates.lat4", "roadcoordinates.lng4",
                        "roadcoordinates.maxlat", "roadcoordinates.maxlng", "roadcoordinates.minlat", "roadcoordinates.minlng", "roadcoordinates.lat", "roadcoordinates.lng",
                        "roadcoordinates.angle", "roadcoordinates.distance")
                ->leftjoin("roads as r", "r.id", "=", "roadcoordinates.roadid")
                ->get();
        
        $roadlinks = RoadLink::orderBy("roadlinks.id", "asc")
                ->where("roadlinks.id", ">", $maxroadlinkid)
                ->where("r.published", 1)
                ->select("roadlinks.id", "roadlinks.roadid", "roadlinks.rcid", "roadlinks.linkroadid", "roadlinks.linkrcid", "roadlinks.linktype") 
                ->leftjoin("roads as r", "r.id", "=", "roadlinks.roadid")
                ->get();
        
        $arr = array("retcode"=>ret_success, "roads"=>$roads, "roadcoords"=>$roadcoords, 
            "roadlinks"=>$roadlinks);
        return json_encode($arr);
    }
    
    function userApiAuth(Request $request){
        return true;
    }
    
    function clientClockIn(Request $request){
        if($this->userApiAuth($request) === false){
            $arr = array("retcode"=>ret_invalid_auth, "retmsg"=>"验证失败！");
            return json_encode($arr);            
        }
        
        $clockin = new ClockIn();
        $clockin->userid = $request->userid;
        $clockin->citype = $request->citype;
        if($request->obuid != ""){
            $clockin->relatedid = $request->obuid;
        }
        $clockin->cilat = $request->cilat;
        $clockin->cilng = $request->cilng;
        $clockin->cialt = $request->cialt;
        $clockin->save();
        
        $arr = array("retcode"=>ret_success, "clockin"=>$clockin);
        return json_encode($arr);
    }
    
    function getClockInHistory(Request $request){
        if($this->userApiAuth($request) === false){
            $arr = array("retcode"=>ret_invalid_auth, "retmsg"=>"验证失败！");
            return json_encode($arr);            
        }
        
        //select min(created_at),userid from clockins as sb where citype=1 group by date(created_at),userid;
        //select max(created_at),userid from clockins as xb where citype=2 group by date(created_at),userid;
        
//        $clockins = ClockIn::orderBy("id", "asc")
//                ->select("userid", "citype", "relatedid", "cilat", "cilng", "created_at")
//                ->where("userid", $request->userid)
//                ->get();
        
        $sqlstr = "select c.clockindate,c.userid,sb.sbtime,xb.xbtime from (select distinct(date(created_at)) as clockindate,userid from clockins) as c "
                . " left join (select min(created_at) sbtime,  userid as sbuserid from clockins where citype=1 group by date(created_at),userid) as sb on date(sb.sbtime)=c.clockindate and sb.sbuserid=c.userid "
                . " left join (select max(created_at) as xbtime,userid as xbuserid from clockins where citype=2 group by date(created_at), userid ) as xb on date(xb.xbtime)=c.clockindate and xb.xbuserid=c.userid ";
        
        if($request->userid != ""){
            $sqlstr .= " where c.userid=" . $request->userid;
        }
        
        $sqlstr .= " order by c.clockindate desc, c.userid; ";
        
        $clockins = DB::select($sqlstr);
        
        $arr = array("retcode"=>ret_success, "clockins"=>$clockins);
        return json_encode($arr);
    }
}
