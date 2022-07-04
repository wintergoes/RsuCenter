<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

require_once '../app/Constant.php';

class HardwareUpdateController extends Controller
{
    
    function index(Request $request){
        $searchdevtype = "0";
        if($request->has("devicetype")){
            $searchdevtype = $request->devicetype;
        }
        
        $sqlstr = "select * from device_log where 1=1 ";
        
        if($searchdevtype == "1"){            
            $sqlstr .= " and device_ID like 'v2x%' ";
        } else if($searchdevtype == "2"){
            $sqlstr .= " and device_ID like 'RSU%' ";
        }
        
        $sqlstr .= " order by log_datetime desc";
        
        $hws = DB::select($sqlstr);
        
        return view("/other/hardware", [
            "hws"=>$hws,
            "searchdevicetype"=>$searchdevtype
        ]);
    }
    
    function updateResources(Request $request){
        $searchdevtype = "0";
        if($request->has("devicetype")){
            $searchdevtype = $request->devicetype;
        }
        
        $sqlstr = "select * from update_resource ";
        
        $sqlstr .= " where 1=1";
        
        $sqlstr .= " order by resource_id desc, modifydate desc";
        
        $resourceses = DB::select($sqlstr);
        
        return view("/other/hwupdateresources", [
            "resources"=>$resourceses,
            "searchdevicetype"=>$searchdevtype
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
        $avaliable = $request->avaliable == "on" ? "1" : "0";
        
            $arr = array("retcode"=>ret_error, "retmsg"=>$request->avaliable);
            return json_encode($arr);        
        
        if(!is_dir($filefolder)){
            $arr = array("retcode"=>ret_error, "retmsg"=>"升级目录不存在！");
            return json_encode($arr);
        }
        
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
}
