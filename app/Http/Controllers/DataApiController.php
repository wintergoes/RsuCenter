<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

use App\User;
use App\ObuDevice;
use App\ObuRouteDetail;
use App\DataApiClient;

require_once '../app/Constant.php';

define("dataapi_ret_success", 1);
define("dataapi_ret_error", -1);


define("dataapi_ret_no_input_data_error", 10000); //缺少参数
define("dataapi_no_auth", 10001); //数据接口用户验证失败
define("dataapi_ret_reqdata_error", 10010);
define("dataapi_ret_reqdata_missing", 10011);
define("dataapi_ret_not_exist", 10012);  //数据不存在

class DataApiController extends Controller
{
    function dataapiLogin(Request $request){
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
    
    function getVehicles(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $searchplateno = $request->searchplateno;        
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        if($searchplateno != ""){
            $wherestr = " and anpr.licenseplate like '%" . $searchplateno . "%' ";
        }
        
        $sqlstr = "select anpr.id, anpr.licenseplate, anpr.lineno, "
                . "anpr.platecolor, anpr.vehicleType, anpr.vehtype1, anpr.vehspeed, anpr.vehlogoname,"
                . "anpr.eventtime, anpr.vehpicnum, rd.devicecode from anprevents anpr "
                . " left join radardevices rd on anpr.macaddr=rd.macaddrint "
                . " where anpr.eventtime > '" . $searchfromdate . "' and anpr.eventtime < '" . $searchtodate . "' " 
                . $wherestr 
                . " order by anpr.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $vehicles = DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as anprcount from anprevents anpr "
                . " where eventtime > '" . $searchfromdate . "' and eventtime < '" . $searchtodate . "' " 
                . $wherestr);
        $pagecount = intval($stats[0]->anprcount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "anprcount"=>$stats[0]->anprcount, "plateno"=>$searchplateno);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "vehicles"=>$vehicles);
        return json_encode($arr);        
    }
    
    function getAidEvents(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";  
        
        $searchaidevent = "-1";
        if($request->has("searchaidevent")){
            $searchaidevent = $request->searchaidevent;
        }        
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        if($searchaidevent != "-1"){
            $wherestr = " and aid.aidevent='" . $searchaidevent . "' ";
        }
        
        $sqlstr = "select * from aidevents aid "
                . " left join radardevices rd on aid.macaddr=rd.macaddrint "
                . " where aid.eventtime > '" . $searchfromdate . "' and aid.eventtime < '" . $searchtodate . "' " 
                . $wherestr 
                . " order by aid.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $vehicles = DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as aidcount from aidevents aid "
                . " where eventtime > '" . $searchfromdate . "' and eventtime < '" . $searchtodate . "' " 
                . $wherestr);
        $pagecount = intval($stats[0]->aidcount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "aidcount"=>$stats[0]->aidcount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "vehicles"=>$vehicles);
        return json_encode($arr);        
    }
    
    function getForecast(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        
        $sqlstr = "select * from forecast f "
                . " where f.created_at > '" . $searchfromdate . "' and f.created_at < '" . $searchtodate . "' " 
                . $wherestr 
                . " order by f.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $forecast = DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as forecastcount from forecast f "
                . " where created_at > '" . $searchfromdate . "' and created_at < '" . $searchtodate . "' " 
                . $wherestr);
        $pagecount = intval($stats[0]->forecastcount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "forecastcount"=>$stats[0]->forecastcount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "forecast"=>$forecast);
        return json_encode($arr);
    }
    
    function getWarnings(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        
        $sqlstr = "select w.id, w.winame, w.teccode, w.wistatus, w.wisource, w.wipriority, w.startlat, w.startlng,"
                . " w.stoplat, w.stoplng, w.wiradius, w.starttime, w.endtime, tec.tecname as tecname, tecp.tecname as tecpname from warninginfo w "
                . " left join trafficeventclasses as tec on w.teccode=tec.teccode "
                . " left join trafficeventclasses as tecp on tec.tecparentcode=tecp.teccode "
                . " where w.created_at > '" . $searchfromdate . "' and w.created_at < '" . $searchtodate . "' " 
                . $wherestr 
                . " order by w.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $warnings= DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as wcount from warninginfo w "
                . " where created_at > '" . $searchfromdate . "' and created_at < '" . $searchtodate . "' " 
                . $wherestr);
        $pagecount = intval($stats[0]->wcount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "wcount"=>$stats[0]->wcount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "warnings"=>$warnings);
        return json_encode($arr); 
    }
    
    function getTrafficSigns(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        
        $sqlstr = "select * from trafficsigns ts "
                . " where ts.created_at > '" . $searchfromdate . "' and ts.created_at < '" . $searchtodate . "' " 
                . $wherestr 
                . " order by ts.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $trafficsigns= DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as tscount from trafficsigns w "
                . " where created_at > '" . $searchfromdate . "' and created_at < '" . $searchtodate . "' " 
                . $wherestr);
        $pagecount = intval($stats[0]->tscount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "tscount"=>$stats[0]->tscount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "trafficsigns"=>$trafficsigns);
        return json_encode($arr);
    }
    
    function getClockins(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        
        $sqlstr = "select od.obuid as obudevicecode, od.plateno, ci.id,"
                . " ci.cistarttime, ci.ciendtime, ci.cidistance,"
                . " timestampdiff(SECOND, ci.cistarttime, ifnull(ci.ciendtime, date_add(ci.cistarttime, interval 30 minute))) as citimeseconds from clockinfull ci "
                . " left join obudevices od on od.id=ci.relatedid "
                
                . " where ci.created_at > '" . $searchfromdate . "' and ci.created_at < '" . $searchtodate . "' " 
                . $wherestr 
                . " order by ci.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $clockins = DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as cicount from clockins ci "
                . " where created_at > '" . $searchfromdate . "' and created_at < '" . $searchtodate . "' " 
                . $wherestr);
        $pagecount = intval($stats[0]->cicount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "tscount"=>$stats[0]->cicount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "clockins"=>$clockins);
        return json_encode($arr);
    }
    
    function getUsers(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        
        $sqlstr = "select u.id, u.username, u.realname, u.mobile, u.created_at from users u "
                . " where 1=1 " 
                . $wherestr 
                . " order by id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $users = DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as ucount from users "
                . " where 1=1 " 
                . $wherestr);
        $pagecount = intval($stats[0]->ucount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "ucount"=>$stats[0]->ucount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "users"=>$users);
        return json_encode($arr);  
    }
    
    function getRsuDevices(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        
        $sqlstr = "select d.id, d.devicecode, d.rsulat, d.rsulng, d.rsuremark, d.created_at from devices d "
                . " where 1=1 " 
                . $wherestr 
                . " order by d.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $devices = DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as dcount from devices "
                . " where 1=1 " 
                . $wherestr);
        $pagecount = intval($stats[0]->dcount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "dcount"=>$stats[0]->dcount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "devices"=>$devices);
        return json_encode($arr); 
    }
    
    function getObuDevices(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        
        $sqlstr = "select od.id, od.obuid, od.obulocalid, od.obustatus, od.obulatitude, od.obulongtitude,"
                . " od.plateno, od.oburemark, od.created_at from obudevices od "
                . " where 1=1 " 
                . $wherestr 
                . " order by od.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $obudevices = DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as odcount from obudevices "
                . " where 1=1 " 
                . $wherestr);
        $pagecount = intval($stats[0]->odcount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "odcount"=>$stats[0]->odcount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "obudevices"=>$obudevices);
        return json_encode($arr);         
    }
    
    function getRadarDevices(Request $request){
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
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = "";
        
        $sqlstr = "select rd.id, rd.devicecode, rd.ipaddress, rd.httpstreamport, rd.videostreamaddress,"
                . " rd.lanenumber, rd.status, rd.validYPosSmall, rd.validYPosLarge, rd.roadangle from radardevices rd "
                . " where 1=1 " 
                . $wherestr 
                . " order by rd.id desc limit 30 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $obudevices = DB::select($sqlstr);
        
        $stats = DB::select("select count(id) as rdcount from radardevices "
                . " where 1=1 " 
                . $wherestr);
        $pagecount = intval($stats[0]->rdcount / 30) + 1;
        
        $statary = array("pagecount"=>$pagecount, "rdcount"=>$stats[0]->rdcount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "radardevices"=>$obudevices);
        return json_encode($arr);
    }
    
    function getObuVideos(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time()) . " 00:00:00";
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = " and f.created_at>='" . $searchfromdate . "' and f.created_at<='" . $searchtodate . "' ";
        
        $sqlstr = "select f.id, f.obuid, f.filename, f.filesize, f.medialen, f.filemd5, f.fileremark,"
                . " od .obuid as obudevicecode from uploadfiles f "
                . " left join obudevices od on od.id=f.obuid "
                . " where filetype=2 " 
                . $wherestr 
                . " order by f.id desc limit 21 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $obuvideos = DB::select($sqlstr);
        
        $stats = DB::select("select count(f.id) as fcount from uploadfiles f"
                . " where f.filetype=2 " 
                . $wherestr);
        $pagecount = intval($stats[0]->fcount / 21) + 1;
        
        $statary = array("pagecount"=>$pagecount, "fcount"=>$stats[0]->fcount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "obuvideos"=>$obuvideos);
        return json_encode($arr);        
    }
    
    function getRadarVideos(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time()) . " 00:00:00";
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        if($searchtodate == ""){
            $searchtodate = date('Y-m-d',time()) ;
        }        
        $searchtodate = $searchtodate . " 23:59:59";
        
        $pageno = $request->reqpage;
        if($pageno == ""){
            $pageno = 0;
        } else {
            $pageno = $pageno - 1;
        }
        $offsetval = $pageno * 30;
        
        $wherestr = " and rv.created_at>='" . $searchfromdate . "' and rv.created_at<='" . $searchtodate . "' ";
        
        $sqlstr = "select * from radarvideos rv "
                . " left join radardevices rd on rd.id=rv.radarid "
                . $wherestr 
                . " order by rv.id desc limit 21 "
                . " offset " . $offsetval;
//        echo $sqlstr;
        $radarvideos = DB::select($sqlstr);
        
        $stats = DB::select("select count(rv.id) as rvcount from radarvideos rv "
                . " where 1=1 "
                . $wherestr);
        $pagecount = intval($stats[0]->rvcount / 21) + 1;
        
        $statary = array("pagecount"=>$pagecount, "rvcount"=>$stats[0]->rvcount);
        
        $arr = array("retcode"=>dataapi_ret_success, "stat"=>$statary,  "radarvideos"=>$radarvideos);
        return json_encode($arr);        
    }    
    
    function getAppNotification(Request $request){
        $maxradareventid = -1;
        if($request->has("maxradareventid")){
            $maxradareventid = $request->maxradareventid;
        }
        
//        $wherestr = "";
        
        $wherestr = " and (ae.aidevent='pedestrian' or ae.aidevent='abandonedObject' "
                . " or ae.aidevent='construction' or ae.aidevent='illegalParking'"
                . " or ae.aidevent='congestion' or ae.aidevent='trafficAccident')";
        
//        echo $maxradareventid;
        
        if($maxradareventid == -1){
            $sqlstr = "select ae.id, ae.aidevent, ae.eventtime, ae.plate, rd.devicecode from aidevents ae "
                    . " left join radardevices rd on rd.macaddrint=ae.macaddr "
                    . " where 1=1 "
                    . $wherestr
                    . " order by ae.id desc limit 1 ";            
        } else {
            $sqlstr = "select ae.id, ae.aidevent, ae.eventtime, ae.plate, rd.devicecode from aidevents ae"
                    . " left join radardevices rd on rd.macaddrint=ae.macaddr "
                    . " where ae.id> " . $maxradareventid . " "
                    . $wherestr
                    . " order by ae.id desc limit 5";
        }
        
//        echo $sqlstr;
        
        $revents = DB::select($sqlstr);
        $resmaxradareventid = -1;
        if(count($revents) > 0) {
            $resmaxradareventid = $revents[0]->id;
        }
        
        $arr = array("retcode"=>dataapi_ret_success, "resmaxradareventid"=>$resmaxradareventid, "radarevents"=>$revents);
        return json_encode($arr);
    }
}
