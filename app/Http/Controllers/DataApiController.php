<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\ObuDevice;
use App\ObuRouteDetail;
use App\DataApiClient;

define("dataapi_ret_success", 1);
define("dataapi_ret_error", -1);


define("dataapi_ret_no_input_data_error", 10000); //缺少参数
define("dataapi_no_auth", 10001); //数据接口用户验证失败
define("dataapi_ret_reqdata_error", 10010);
define("dataapi_ret_reqdata_missing", 10011);
define("dataapi_ret_not_exist", 10012);  //数据不存在

class DataApiController extends Controller
{
    function getObus(Request $request){
        $chkapiclient = $this->checkApiClient($request);
        if($chkapiclient instanceof DataApiClient){
            
        } else {
            return $chkapiclient;
        }        
        
        $obus = ObuDevice::orderby("id", "desc")
                ->get();
        
        $arr = array("retcode"=>dataapi_ret_success, "obus"=>$obus);
        return json_encode($arr);
    }
    
    function getObuRoute(Request $request){
        
    }    
    
    function checkIpAddress(){
        $fromip = $_SERVER['REMOTE_ADDR'];
        
        $ips = IpWhiteList::where("ipaddress", $fromip)
                ->select("id")
                ->get();
        
        if(count($ips) == 0){
            $arr = array("retcode"=>ret_data_error, "retmsg"=>"非法请求!");
            return json_encode($arr);	            
        }
        
        return true;
    }
    
    function checkApiClient(Request $request){
        if($request->clientid == "" || $request->clientkey == ""){
            $arr = array("retcode"=>dataapi_ret_no_input_data_error, "retmsg"=>"缺少参数!");
            return json_encode($arr);            
        }
        
        $clients = DataApiClient::where('id', $request->clientid)
                ->select('clientkey')
                ->get();
        
        if(count($clients) == 0 || $clients[0]->clientkey != $request->clientkey){
            $arr = array("retcode"=>dataapi_no_auth, "retmsg"=>"无效的接口客户!");
            return json_encode($arr);              
        }
        
        return $clients[0];
    }
}
