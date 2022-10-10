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
    
    function hkVehType2Str($str){
        $resstr = "";
        switch ($str){
            case "nonmotorVehicle":
                $resstr = "非机动车";
                break;
            case "smallCar":
                $resstr = "小型轿车";
                break;
            case "miniCar":
                $resstr = "微型轿车";
                break;
            case "pickupTruck":
                $resstr = "皮卡车";
                break;
            case "largeBus":
                $resstr = "大型客车";
                break;
            case "truck":
                $resstr = "货车";
                break;
            case "vehicle":
                $resstr = "轿车";
                break;
            case "van":
                $resstr = "面包车";
                break;
            case "buggy":
                $resstr = "小货车";
                break;
            case "pedestrian":
                $resstr = "行人";
                break;
            case "twoWheelVehicle":
                $resstr = "二轮车";
                break;
            case "threeWheelVehicle":
                $resstr = "三轮车";
                break;
            case "SUVMPV":
                $resstr = "SUVMPV";
                break;
            case "mediumBus":
                $resstr = "中型客车";
                break;
            case "motorVehicle":
                $resstr = "机动车";
                break;
            case "crane":
                $resstr = "吊车";
                break;
            case "minibus":
                $resstr = "小型客车";
                break;
            case "coupe":
                $resstr = "轿跑";
                break;
            case "concreteMixer":
                $resstr = "混凝土搅拌车";
                break;
            case "slagTruck":
                $resstr = "渣土车";
                break;
            case "minitruck":
                $resstr = "微卡";
                break;
            case "containerTruck":
                $resstr = "集装箱卡车";
                break;
            case "platformTrailer":
                $resstr = "平板拖车";
                break;
            case "oilTankTruck":
                $resstr = "油罐车";
                break;
            case "hatchback":
                $resstr = "两厢轿车";
                break;
            case "saloon":
                $resstr = "三厢轿车";
                break;
            case "bus":
                $resstr = "客车";
                break;
            case "lightTruck":
                $resstr = "轻微货车";
                break;
            case "mediumHeavyTruck":
                $resstr = "中重型货车";
                break;
            default:
                $resstr = "其他";
                break;
        }
        
        return $resstr;        
    }    
    
    function hkVehType12Str($str){
        $resstr = "";
        switch ($str){
            case "1":
                $resstr = "小型车";
                break;
            case "2":
                $resstr = "大型车";
                break;
            case "3":
                $resstr = "行人";
                break;
            case "4":
                $resstr = "二轮车";
                break;
            case "5":
                $resstr = "三轮车";
                break;
            case "6":
                $resstr = "机动车";
                break;
            default:
                $resstr = "其他";
                break;
        }
        return $resstr;
    }

    function hkVehcolor2Str($str){
        $resstr = "";
        switch ($str){
            case "green":
                $resstr = "绿色";
                break;
            case "brown":
                $resstr = "棕色";
                break;
            case "pink":
                $resstr = "粉色";
                break;
            case "purple":
                $resstr = "紫色";
                break;
            case "deepGray":
                $resstr = "深灰色";
                break;
            case "cyan":
                $resstr = "青色";
                break;
            case "orange":
                $resstr = "橙色";
                break;
            case "white":
                $resstr = "白色";
                break;
            case "silver":
                $resstr = "银色";
                break;
            case "gray":
                $resstr = "灰色";
                break;
            case "black":
                $resstr = "黑色";
                break;
            case "red":
                $resstr = "红色";
                break;
            case "deepBlue":
                $resstr = "深蓝色";
                break;
            case "blue":
                $resstr = "蓝色";
                break;
            case "yellow":
                $resstr = "黄色";
                break;
            default:
                $resstr = "其他";
                break;
        }
        
        return $resstr;
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
                $resstr = "卡口检测";
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
            case "lowSpeed":
                $resstr = "低速行驶";
                break;            
            default:
                $resstr = $str;
        }
        
        return $resstr;
    }
}
