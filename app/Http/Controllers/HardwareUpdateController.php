<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

require_once '../app/Constant.php';

class HardwareUpdateController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $searchdevice = "";
        if($request->has("deviceid")){
            $searchdevice = $request->deviceid;
        }
        
        $searchdevtype = "0";
        if($request->has("devicetype")){
            $searchdevtype = $request->devicetype;
        }
        
        $searchisonline = "0";
        if($request->has("isonline")){
            $searchisonline = $request->isonline;
        }
        
        $sqlstr = "select device_log.log_radom, device_log.device_ID,device_log.hardversion,"
                . "device_log.softversion,device_log.Is_online,device_log.log_datetime,"
                . "device_log.con_datetime,tmp.resource_id,tmp.modifydatetime,tmp.returnJSON from device_log"
                . " left join device_update_temp as tmp on device_log.log_radom=tmp.log_radom where 1=1 ";
        
        if($searchdevtype == "1"){            
            $sqlstr .= " and device_ID like 'v2x%' ";
        } else if($searchdevtype == "2"){
            $sqlstr .= " and device_ID like 'RSU%' ";
        }
        
        if($searchisonline == "1"){
            $sqlstr .= " and Is_online=1";
        } else if($searchisonline == "2"){
            $sqlstr .= " and Is_online=0";
        }
        
        if($searchdevice != "" && $searchdevice != "0"){
            $sqlstr .= " and device_ID='" . $searchdevice . "'";
        }
        
        $sqlstr .= " order by log_datetime desc";
        
        $hws = DB::select($sqlstr);
        
        $updateres = DB::select("select * from update_resource where Is_use=1");
        
        $devices = DB::select("select distinct device_ID from device_log");
        
        return view("/other/hardware", [
            "hws"=>$hws,
            "updateres"=>$updateres,
            "searchdevicetype"=>$searchdevtype,
            "searchisonline"=>$searchisonline,
            "searchdevice"=>$searchdevice,
            "devices"=>$devices
        ]);
    }
    
    function hardwareUpdate(Request $request){
        if($request->radom == ""){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr); 
        }
        
        $log_radom = $request->radom;
        
        $tmpcheck = DB::select("select returnJSON from device_update_temp where log_radom=" . $log_radom);
        if(count($tmpcheck) == 0){
            if($request->resid == ""){
                $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数1！");
                return json_encode($arr); 
            }
            
            $insertstr = "insert into device_update_temp(log_radom, resource_id) values("
                    . $log_radom . "," . $request->resid . ")";
            DB::insert($insertstr);
            
            $arr = array("retcode"=>ret_hw_update_added, "retmsg"=>"添加更新任务成功！");
            return json_encode($arr);            
        }
        
        $retjson = $tmpcheck[0]->returnJSON;
        
        if($retjson == ""){
            $arr = array("retcode"=>ret_hw_update_reply_blank, "retmsg"=>"无回复内容！");
            return json_encode($arr);            
        }
        
        if(strpos($retjson, "NO resource") !== false || strpos($retjson, "not found") !== false){
            $arr = array("retcode"=>ret_error, "retmsg"=>$retjson);
            return json_encode($arr);           
        }
        
        if(strpos($retjson, '{"type"') >= 0){
            $jsonobj = json_decode($retjson, true);
            $retcode = ret_success;
            $retmsg = "";
            if($jsonobj["value"]["result"] == "fail"){
                $retcode = ret_error;
                $errmsg = $jsonobj["value"]["reason"];
                switch($jsonobj["value"]["reason"]){
                    case -1:
                        $errmsg = "无法连接FTP";
                        break;
                    case -2:
                        $errmsg = "指定文件夹的更新包或md5文件或版本文件不存在";
                        break;
                    case -3:
                        $errmsg = "更新失败但是系统正常";
                        break;
                    case -4:
                        $errmsg = "发现系统无备份可用文件，更新失败但是系统正常";
                        break;
                    case -5:
                        $errmsg = "系统更新失败导致系统异常，但是恢复成功";
                        break;      
                    case -6:
                        $errmsg = "<font color='red'>系统更新更新失败导致系统异常，而且恢复失败</font>";
                        break;                    
                }
                $retmsg = $jsonobj["value"]["result"] . "(" . $errmsg . ")";
            } else if($jsonobj["value"]["result"] == "begin"){
                $retmsg = "正在更新……";
                $retcode = ret_hw_update_begin;
            } else if($jsonobj["value"]["result"] == "end"){
                $retmsg = "更新成功！";
                $retcode = ret_hw_update_finish;
            }
            $arr = array("retcode"=>$retcode, "retmsg"=>$retmsg);
            return json_encode($arr);
        }        
    }
    
    function deleteHardwareUpdate(Request $request){
        if($request->radom == ""){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr); 
        }

        if($request->timeout == "1"){
            $devchecks = DB::select("select Is_online from device_log where log_radom=" . $request->radom);
            if(count($devchecks) > 0 && $devchecks[0]->Is_online == 0){
                $arr = array("retcode"=>ret_error, "retmsg"=>"超时，但是设备为离线状态！");
                return json_encode($arr);
            }
        }
        DB::delete("delete from device_update_temp where log_radom=" . $request->radom);
        
        $arr = array("retcode"=>ret_success, "retmsg"=>"取消更新成功！");
        return json_encode($arr);
    }
    
    function deleteHardware(Request $request){
        if($request->log_radom == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);        
        }
        
        DB::delete("delete from device_log where log_radom=" . $request->log_radom);
        
        return redirect("hardware");        
    }


    function updateResources(Request $request){
        $searchdevtype = "0";
        if($request->has("devicetype")){
            $searchdevtype = $request->devicetype;
        }
        
        $searchisuse = "0";
        if($request->has("isuse")){
            $searchisuse = $request->isuse;
        }
        
        $sqlstr = "select * from update_resource ";
        $sqlstr .= " where 1=1";
        
        if($searchdevtype != "" && $searchdevtype != "0"){
            $sqlstr .= " and devicetype=" . $searchdevtype;
        }
        
        if($searchisuse == "1"){
            $sqlstr .= " and Is_use=" . $searchisuse;
        } else if($searchisuse == "2"){
            $sqlstr .= " and Is_use=0";
        }        
        
        $sqlstr .= " order by resource_id desc, modifydate desc";
        
        $resourceses = DB::select($sqlstr);
        
        return view("/other/hwupdateresources", [
            "resources"=>$resourceses,
            "searchdevicetype"=>$searchdevtype,
            "searchisuse"=>$searchisuse
        ]);
    }
    
    function addUpdateResource(Request $request){
        $hwupdate_root = env("hwupdate_root");
        
        return view("/other/addupdateresource", [
            "hwupdate_root"=>$hwupdate_root
        ]);
    }
    
    function addUpdateResourceSave(Request $request){
        $devicetype = $request->devicetype;
        $resname = $request->resourcename;
        $hwversion = $request->hardwareversion;
        $swversion = $request->softwareversion;
        $filefolder = $request->updatefolder;
        $avaliable = $request->avaliable == "true" ? "1" : "0";
        
//            $arr = array("retcode"=>ret_error, "retmsg"=>$filefolder);
//            return json_encode($arr);
        
//        if(!is_dir($filefolder)){
//            $arr = array("retcode"=>ret_error, "retmsg"=>"升级目录不存在！");
//            return json_encode($arr);
//        }
        
        if(!file_exists($filefolder . "/CHIBC_RSU001.zip") ||
                !file_exists($filefolder . "/CHIBC_RSU.md5") ||
                !file_exists($filefolder . "/CHIBC_hard.txt") || 
                !file_exists($filefolder . "/CHIBC_soft.txt")){
            $arr = array("retcode"=>ret_error, "retmsg"=>"升级文件不完整！");
            return json_encode($arr);            
        }
        
        $resnamecheck = DB::select("select id from update_resource where resource_name='" . $resname . "'");
        if(count($resnamecheck) > 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"升级包名称已存在！");
            return json_encode($arr);            
        }
        
        $folderversioncheck = DB::select("select resource_id from update_resource where resource_content='" . $filefolder . "'"
                . " and resource_hardversion='" . $hwversion . "' and resource_softversion='" . $swversion . "'");
        if(count($folderversioncheck) > 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"升级目录和对应的版本已存在！");
            return json_encode($arr);            
        }        
        
        $resid = 0;
        $foldercheck = DB::select("select resource_id from update_resource where resource_content='" . $filefolder . "'");
        if(count($foldercheck) > 0){
            $resid = $foldercheck[0]->resource_id;
        } else{
            $maxid = DB::select("select max(resource_id) as max_res_id from update_resource");
            $resid = $maxid[0]->max_res_id + 1;
        }
        
        $sqlstr = "insert into update_resource(resource_id, devicetype, resource_hardversion,"
                . "resource_softversion,resource_content,Is_use,resource_name,modifydate) values(";
        
        $sqlstr .= $resid . ",";
        $sqlstr .= $devicetype . ",'";
        $sqlstr .= $hwversion . "','";
        $sqlstr .= $swversion . "','";
        $sqlstr .= $filefolder . "',";
        $sqlstr .= $avaliable . ",'";
        $sqlstr .= $resname . "',";
        $sqlstr .= "now())";

        DB::insert($sqlstr);
        
        $arr = array("retcode"=>ret_success, "retmsg"=>"新增升级包成功！");
        return json_encode($arr);
    }
    
    function deleteUpdateResourceSave(Request $request){
        if($request->id == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]); 
        }
        
        DB::delete("delete from update_resource where id=" . $request->id);
        
        return redirect("hwupdateres");
    }
    
    function hardwareInfo(Request $request){
        $devices = DB::select("select log_radom,Is_online,con_datetime from device_log");

        $arr = array("retcode"=>ret_success, "devices"=>$devices);
        return json_encode($arr);
    }
}
