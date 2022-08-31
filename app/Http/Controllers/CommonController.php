<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    function eventSource2Str($src){
        switch ($src){
            case 1:
                return "交警";
            case 2:
                return "政府";
            case 3:
                return "气象部门";
            case 4:
                return "互联网";
            case 5:
                return "本地检测";
            default:
                return "未知";
        }
    }
    
    function hkEvent2Str($str){
        $resstr = "";
//        
//        if($str == "abandonedObject"){
//            $resstr = "抛洒物";
//        }
        
        switch ($str){
            case "abandonedObject":
                $resstr = "抛洒物";
                break;
            case "checkPoint":
                $resstr = "卡 口检测";
                break;
            case "congestion":
                $resstr = "拥堵";
                break;
            case "construction":
                $resstr = "施工";
                break;
            case "crossLane":
                $resstr = "压线";
                break;
            case "edfManual":
                $resstr = "手动取证";
                break;
            case "fogDetection":
                $resstr = "浓雾检测";
                break;
            case "gasser":
                $resstr = "加塞";
                break;
            case "group":
                $resstr = "人员聚集";
                break;
            case "illegalParking":
                $resstr = "违停";
                break;
            case "intersectionStranded":
                $resstr = "车辆滞留";
                break;
            case "laneChange":
                $resstr = "变道";
                break;
            case "objectDroppedDown":
                $resstr = "物体坠落";
                break;
            case "occupyOvertakingLane":
                $resstr = "占用超车道";
                break;
            case "parallelParking":
                $resstr = "侧方位停车";
                break;
            case "pedestrian":
                $resstr = "行人检测";
                break;
            case "polyJam":
                $resstr = "多边形拥堵,鹰眼拥堵";
                break;
            case "prohibitionMarkViolation":
                $resstr = "违反禁令";
                break;
            case "roadBlock":
                $resstr = "路障";
                break;
            case "slowMoving":
                $resstr = "车辆缓行";
                break;
            case "smoke":
                $resstr = "烟雾";
                break;
            case "speed":
                $resstr = "车辆超速";
                break;
            case "suddenSpeedDrop":
                $resstr = "速度骤降";
                break;
            case "trafficAccident":
                $resstr = "交通事故检测";
                break;
            case "trafficConflict":
                $resstr = "车流冲突";
                break;
            case "turnRound":
                $resstr = "掉头";
                break;
            case "vehicleexist":
                $resstr = "机占非";
                break;
            case "wrongDirection":
                $resstr = "逆行";
                break;
            case "singleVehicleBreakdown":
                $resstr = "单车抛锚";
                break;
            case "vehNoYieldPedest":
                $resstr = "机动车不礼让行人";
                break;
            case "illegalMannedVeh":
                $resstr = "机动车违法载人";
                break;
            case "illegalMannedNonMotorVeh":
                $resstr = "非机动车违法载人";
                break;
            case "umbrellaTentInstall":
                $resstr = "非机动车违规加装雨棚";
                break;
            case "nonMotorVehOnVehLane":
                $resstr = "非机动车占用机动车道";
                break;
            case "wearingNoHelmet":
                $resstr = "非机动车未佩戴头盔事";
                break;
            case "pedestRedLightRunning":
                $resstr = "行人闯红灯";
                break;
            case "pedestOnNonMotorVehLane":
                $resstr = "行人非机动车道行走";
                break;
            case "pedestOnVehLane":
                $resstr = "行人机动车道行走";
                break;
            case "tfsManuaTrigger":
                $resstr = "手动违章取证";
                break;
            default:
                $resstr = $str;
        }
        
        return $resstr;
    }
}
