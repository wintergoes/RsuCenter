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
            $arr = array("retcode"=>ret_error, "retmsg"=>"???????????????");
            return json_encode($arr); 
        }
        
        $log_radom = $request->radom;
        
        $tmpcheck = DB::select("select returnJSON from device_update_temp where log_radom=" . $log_radom);
        if(count($tmpcheck) == 0){
            if($request->resid == ""){
                $arr = array("retcode"=>ret_error, "retmsg"=>"????????????1???");
                return json_encode($arr); 
            }
            
            $insertstr = "insert into device_update_temp(log_radom, resource_id) values("
                    . $log_radom . "," . $request->resid . ")";
            DB::insert($insertstr);
            
            $arr = array("retcode"=>ret_hw_update_added, "retmsg"=>"???????????????????????????");
            return json_encode($arr);            
        }
        
        $retjson = $tmpcheck[0]->returnJSON;
        
        if($retjson == ""){
            $arr = array("retcode"=>ret_hw_update_reply_blank, "retmsg"=>"??????????????????");
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
                        $errmsg = "????????????FTP";
                        break;
                    case -2:
                        $errmsg = "??????????????????????????????md5??????????????????????????????";
                        break;
                    case -3:
                        $errmsg = "??????????????????????????????";
                        break;
                    case -4:
                        $errmsg = "??????????????????????????????????????????????????????????????????";
                        break;
                    case -5:
                        $errmsg = "?????????????????????????????????????????????????????????";
                        break;      
                    case -6:
                        $errmsg = "<font color='red'>???????????????????????????????????????????????????????????????</font>";
                        break;                    
                }
                $retmsg = $jsonobj["value"]["result"] . "(" . $errmsg . ")";
            } else if($jsonobj["value"]["result"] == "begin"){
                $retmsg = "??????????????????";
                $retcode = ret_hw_update_begin;
            } else if($jsonobj["value"]["result"] == "end"){
                $retmsg = "???????????????";
                $retcode = ret_hw_update_finish;
            }
            $arr = array("retcode"=>$retcode, "retmsg"=>$retmsg);
            return json_encode($arr);
        }        
    }
    
    function deleteHardwareUpdate(Request $request){
        if($request->radom == ""){
            $arr = array("retcode"=>ret_error, "retmsg"=>"???????????????");
            return json_encode($arr); 
        }

        if($request->timeout == "1"){
            $devchecks = DB::select("select Is_online from device_log where log_radom=" . $request->radom);
            if(count($devchecks) > 0 && $devchecks[0]->Is_online == 0){
                $arr = array("retcode"=>ret_error, "retmsg"=>"???????????????????????????????????????");
                return json_encode($arr);
            }
        }
        DB::delete("delete from device_update_temp where log_radom=" . $request->radom);
        
        $arr = array("retcode"=>ret_success, "retmsg"=>"?????????????????????");
        return json_encode($arr);
    }
    
    function deleteHardware(Request $request){
        if($request->log_radom == ""){
            return "???????????????";           
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
//            $arr = array("retcode"=>ret_error, "retmsg"=>"????????????????????????");
//            return json_encode($arr);
//        }
        
        if(!file_exists($filefolder . "/CHIBC_RSU001.zip") ||
                !file_exists($filefolder . "/CHIBC_RSU.md5") ||
                !file_exists($filefolder . "/CHIBC_hard.txt") || 
                !file_exists($filefolder . "/CHIBC_soft.txt")){
            $arr = array("retcode"=>ret_error, "retmsg"=>"????????????????????????");
            return json_encode($arr);            
        }
        
        $resnamecheck = DB::select("select id from update_resource where resource_name='" . $resname . "'");
        if(count($resnamecheck) > 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"???????????????????????????");
            return json_encode($arr);            
        }
        
        $folderversioncheck = DB::select("select resource_id from update_resource where resource_content='" . $filefolder . "'"
                . " and resource_hardversion='" . $hwversion . "' and resource_softversion='" . $swversion . "'");
        if(count($folderversioncheck) > 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"??????????????????????????????????????????");
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
        
        $arr = array("retcode"=>ret_success, "retmsg"=>"????????????????????????");
        return json_encode($arr);
    }
    
    function deleteUpdateResourceSave(Request $request){
        if($request->id == ""){
            return "???????????????";           
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
