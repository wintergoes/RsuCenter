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
            case "lowVisibility":
                $resstr = "能见度低";
                break;            
            default:
                $resstr = $str;
        }
        
        return $resstr;
    }
    
    function getRsuError($device, $prefix, $suffix){
        $errstr = "";
        if($device->cfg_f_wfi_ID == 1){
            $errstr .= $prefix . "wifi网络设备名称配置文件丢失"  . $suffix;
        } 
        
        if($device->cfg_f_wfi_CID == 1){
            $errstr .= $prefix . "wifi连接设备配置文件丢失"  . $suffix;
        }        
        
        if($device->cfg_f_dev_ID == 1){
            $errstr .= $prefix . "设备编号配置文件丢失"  . $suffix;
        } 
        
        if($device->cfg_f_dev_SF == 1){
            $errstr .= $prefix . "设备版本号配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_dev_HD == 1){
            $errstr .= $prefix . "设备硬件版本号配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_radar_IP == 1){
            $errstr .= $prefix . "雷视机IP地址配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_dev_POS == 1){
            $errstr .= $prefix . "设备坐标位置配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_monitor_IP == 1){
            $errstr .= $prefix . "设备上报监控信息主机IP配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_dev_IP == 1){
            $errstr .= $prefix . "设备IP配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_AID == 1){
            $errstr .= $prefix . "设备启动AID配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_resv_AID == 1){
            $errstr .= $prefix . "设备启动AID接收配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_RSI_HZ == 1){
            $errstr .= $prefix . "设备发射RSI频率配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_RSM_HZ == 1){
            $errstr .= $prefix . "设备发射RSM频率配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_RTE_HZ == 1){
            $errstr .= $prefix . "设备发射RTE频率配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_RTS_HZ == 1){
            $errstr .= $prefix . "设备发射RTS频率配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_SPAT_HZ == 1){
            $errstr .= $prefix . "设备发射SPAT频率配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_MAP_HZ == 1){
            $errstr .= $prefix . "设备发射MAP频率配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_update_START == 1){
            $errstr .= $prefix . "设备升级后动作配置文件丢失"  . $suffix;
        }
        
        if($device->cfg_f_OTA_1 == 1){
            $errstr .= $prefix . "设备OTA升级文件1丢失"  . $suffix;
        }
        
        if($device->cfg_f_OTA_2 == 1){
            $errstr .= $prefix . "设备OTA升级文件2丢失"  . $suffix;
        }
        
        if($device->cfg_f_OTA_3 == 1){
            $errstr .= $prefix . "设备OTA升级文件3丢失"  . $suffix;
        }
        
        if($device->cfg_f_OTA_4 == 1){
            $errstr .= $prefix . "设备OTA升级文件4丢失"  . $suffix;
        }
        
        if($device->cfg_f_OTA_5 == 1){
            $errstr .= $prefix . "设备OTA升级文件5丢失"  . $suffix;
        }
        
        if($device->cfg_f_OTA_6 == 1){
            $errstr .= $prefix . "设备OTA升级文件6丢失"  . $suffix;
        }
        
        if($device->cfg_f_OTA_7 == 1){
            $errstr .= $prefix . "设备OTA升级文件7丢失"  . $suffix;
        }
        
        if($device->cfg_f_OTA_VERIFY == 1){
            $errstr .= $prefix . "设备OTA验证文件丢失"  . $suffix;
        }
        
        if($device->cfg_m_MF == 1){
            $errstr .= $prefix . "设备主模块下线"  . $suffix;
        }
        
        if($device->cfg_m_REPROT == 1){
            $errstr .= $prefix . "设备汇报模块下线"  . $suffix;
        }
        
        if($device->cfg_m_RBSM == 1){
            $errstr .= $prefix . "BSM信息获取模块下线"  . $suffix;
        }      
        
        if($device->cfg_m_RRSM == 1){
            $errstr .= $prefix . "RSM信息获取模块下线"  . $suffix;
        }
        
        if($device->cfg_m_WIFI == 1){
            $errstr .= $prefix . "wifi连接模块下线"  . $suffix;
        }          
        
        if($device->cfg_m_FBSM == 1){
            $errstr .= $prefix . "BSM信息发射模块下线"  . $suffix;
        }          
        
        if($device->cfg_m_RRADAR == 1){
            $errstr .= $prefix . "雷达数据获取模块下线"  . $suffix;
        }
        
        if($device->cfg_m_FRADAR == 1){
            $errstr .= $prefix . "RSM雷达数据发射模块下线"  . $suffix;
        }
        
        if($device->cfg_m_OTA == 1){
            $errstr .= $prefix . "OTA升级模块下线"  . $suffix;
        }
        
        if($device->cfg_m_RELAYRSM == 1){
            $errstr .= $prefix . "cfg_m_RELAYRSM"  . $suffix;
        }
        
        if($device->cfg_m_RELAYRSI == 1){
            $errstr .= $prefix . "cfg_m_RELAYRSI"  . $suffix;
        }
        
        if($device->cfg_c_GPS == 1){
            $errstr .= $prefix . "GPS无法连接"  . $suffix;
        }
        
        if($device->cfg_c_ONLINE == 1){
            $errstr .= $prefix . "设备无法上网"  . $suffix;
        }
        
        if($device->cfg_c_RADAR == 1){
            $errstr .= $prefix . "设备无法连接雷视设备"  . $suffix;
        }
        
        if($device->cfg_c_MOTION == 1){
            $errstr .= $prefix . "设备无法连接运动设备"  . $suffix;
        }        
        
        if($device->cfg_c_MEC == 1){
            $errstr .= $prefix . "设备无法连接MEC"  . $suffix;
        }
        
        if($device->cfg_f_OBU_CLOUD_KEY == 1){
            $errstr .= $prefix . "设备位置鉴权字符串文件丢失"  . $suffix;
        }     
        
        if( $device->cfg_f_OBU_CLOUD_PORT == 1){
            $errstr .= $prefix . "设备位置端口文件丢失"  . $suffix;
        }   
        
        if($device->cfg_f_BSM_CLOUD_KEY == 1){
            $errstr .= $prefix . "设备BSM鉴权字符串文件丢失"  . $suffix;
        }     
        
        if($device->cfg_f_BSM_CLOUD_PORT == 1){
            $errstr .= $prefix . "设备BSM端口文件丢失"  . $suffix;
        } 

        if($device->cfg_f_RSM_CLOUD_KEY == 1){
            $errstr .= $prefix . "设备RSM鉴权字符串文件丢失"  . $suffix;
        }     
        
        if($device->cfg_f_RSM_CLOUD_PORT == 1){
            $errstr .= $prefix . "设备RSM端口文件丢失"  . $suffix;
        } 

        if($device->cfg_f_RSI_CLOUD_KEY == 1){
            $errstr .= $prefix . "设备RSI鉴权字符串文件丢失"  . $suffix;
        }     
        
        if($device->cfg_f_RSI_CLOUD_PORT == 1){
            $errstr .= $prefix . "设备RSI端口文件丢失"  . $suffix;
        } 
        
        if($device->cfg_f_zabbix_IP == 1){
            $errstr .= $prefix . "设备连接zabbix文件丢失"  . $suffix;
        } 
        
        if($device->cfg_f_ROI == 1){
            $errstr .= $prefix . "设备设置ROI区域文件丢失"  . $suffix;
        } 

        if($device->cfg_m_CLOUD == 1){
            $errstr .= $prefix . "设备云服务连接模块下线"  . $suffix;
        } 

        if( $device->cfg_m_CURL == 1){
            $errstr .= $prefix . "设备雷视触发模块下线"  . $suffix;
        } 

        if($device->cfg_m_RELAYRSI == 1){
            $errstr .= $prefix . "设备RSI接收模块下线"  . $suffix;
        } 

        if($device->cfg_c_ZABBIX == 1){
            $errstr .= $prefix . "设备无法连接zabbix服务"  . $suffix;
        }          

        //echo $errstr;
        if($errstr == $prefix . $suffix){
            $errstr = "";
        } else {
//            if($errstr != ""){
//                $errstr = substr($errstr, 3);
//            }
        }
        
        return $errstr;
    }    
    
    function getObuError($device, $prefix, $suffix){
        $errstr = "";
        if(property_exists($device, "cfg_f_wfi_ID") && $device->cfg_f_wfi_ID == 1){
            $errstr .= $prefix . "wifi网络设备名称配置文件丢失"  . $suffix;
        } 
        
        if(property_exists($device, "cfg_f_wfi_CID") && $device->cfg_f_wfi_CID == 1){
            $errstr .= $prefix . "wifi连接设备配置文件丢失"  . $suffix;
        }        
        
        if(property_exists($device, "cfg_f_dev_ID") && $device->cfg_f_dev_ID == 1){
            $errstr .= $prefix . "设备编号配置文件丢失"  . $suffix;
        } 
        
        if(property_exists($device, "cfg_f_dev_SF") && $device->cfg_f_dev_SF == 1){
            $errstr .= $prefix . "设备版本号配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_dev_HD") && $device->cfg_f_dev_HD == 1){
            $errstr .= $prefix . "设备硬件版本号配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_radar_IP") && $device->cfg_f_radar_IP == 1){
            $errstr .= $prefix . "雷视机IP地址配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_dev_POS") && $device->cfg_f_dev_POS == 1){
            $errstr .= $prefix . "设备坐标位置配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_monitor_IP") && $device->cfg_f_monitor_IP == 1){
            $errstr .= $prefix . "设备上报监控信息主机IP配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_dev_IP") && $device->cfg_f_dev_IP == 1){
            $errstr .= $prefix . "设备IP配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_AID") && $device->cfg_f_AID == 1){
            $errstr .= $prefix . "设备启动AID配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_resv_AID") && $device->cfg_f_resv_AID == 1){
            $errstr .= $prefix . "设备启动AID接收配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_RSI_HZ") && $device->cfg_f_RSI_HZ == 1){
            $errstr .= $prefix . "设备发射RSI频率配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_RSM_HZ") && $device->cfg_f_RSM_HZ == 1){
            $errstr .= $prefix . "设备发射RSM频率配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_RTE_HZ") && $device->cfg_f_RTE_HZ == 1){
            $errstr .= $prefix . "设备发射RTE频率配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_RTS_HZ") && $device->cfg_f_RTS_HZ == 1){
            $errstr .= $prefix . "设备发射RTS频率配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_SPAT_HZ") && $device->cfg_f_SPAT_HZ == 1){
            $errstr .= $prefix . "设备发射SPAT频率配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_MAP_HZ") && $device->cfg_f_MAP_HZ == 1){
            $errstr .= $prefix . "设备发射MAP频率配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_update_START") && $device->cfg_f_update_START == 1){
            $errstr .= $prefix . "设备升级后动作配置文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OTA_1") && $device->cfg_f_OTA_1 == 1){
            $errstr .= $prefix . "设备OTA升级文件1丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OTA_2") && $device->cfg_f_OTA_2 == 1){
            $errstr .= $prefix . "设备OTA升级文件2丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OTA_3") && $device->cfg_f_OTA_3 == 1){
            $errstr .= $prefix . "设备OTA升级文件3丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OTA_4") && $device->cfg_f_OTA_4 == 1){
            $errstr .= $prefix . "设备OTA升级文件4丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OTA_5") && $device->cfg_f_OTA_5 == 1){
            $errstr .= $prefix . "设备OTA升级文件5丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OTA_6") && $device->cfg_f_OTA_6 == 1){
            $errstr .= $prefix . "设备OTA升级文件6丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OTA_7") && $device->cfg_f_OTA_7 == 1){
            $errstr .= $prefix . "设备OTA升级文件7丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OTA_VERIFY") && $device->cfg_f_OTA_VERIFY == 1){
            $errstr .= $prefix . "设备OTA验证文件丢失"  . $suffix;
        }
        
        if(property_exists($device, "cfg_m_MF") && $device->cfg_m_MF == 1){
            $errstr .= $prefix . "设备主模块下线"  . $suffix;
        }
        
        if(property_exists($device, "cfg_m_REPROT") && $device->cfg_m_REPROT == 1){
            $errstr .= $prefix . "设备汇报模块下线"  . $suffix;
        }
        
        if(property_exists($device, "cfg_m_RBSM") && $device->cfg_m_RBSM == 1){
            $errstr .= $prefix . "BSM信息获取模块下线"  . $suffix;
        }      
        
        if(property_exists($device, "cfg_m_RRSM") && $device->cfg_m_RRSM == 1){
            $errstr .= $prefix . "RSM信息获取模块下线"  . $suffix;
        }
        
        if(property_exists($device, "cfg_m_WIFI") && $device->cfg_m_WIFI == 1){
            $errstr .= $prefix . "wifi连接模块下线"  . $suffix;
        }          
        
        if(property_exists($device, "cfg_m_FBSM") && $device->cfg_m_FBSM == 1){
            $errstr .= $prefix . "BSM信息发射模块下线"  . $suffix;
        }          
        
        if(property_exists($device, "cfg_m_RRADAR") && $device->cfg_m_RRADAR == 1){
            $errstr .= $prefix . "雷达数据获取模块下线"  . $suffix;
        }
        
        if(property_exists($device, "cfg_m_FRADAR") && $device->cfg_m_FRADAR == 1){
            $errstr .= $prefix . "RSM雷达数据发射模块下线"  . $suffix;
        }
        
        if(property_exists($device, "cfg_m_OTA") && $device->cfg_m_OTA == 1){
            $errstr .= $prefix . "OTA升级模块下线"  . $suffix;
        }
        
        if(property_exists($device, "cfg_m_RELAYRSM") && $device->cfg_m_RELAYRSM == 1){
            $errstr .= $prefix . "cfg_m_RELAYRSM"  . $suffix;
        }
        
        if(property_exists($device, "cfg_m_RELAYRSI") && $device->cfg_m_RELAYRSI == 1){
            $errstr .= $prefix . "cfg_m_RELAYRSI"  . $suffix;
        }
        
        if(property_exists($device, "cfg_c_GPS") && $device->cfg_c_GPS == 1){
            $errstr .= $prefix . "GPS无法连接"  . $suffix;
        }
        
        if(property_exists($device, "cfg_c_ONLINE") && $device->cfg_c_ONLINE == 1){
            $errstr .= $prefix . "设备无法上网"  . $suffix;
        }
        
        if(property_exists($device, "cfg_c_RADAR") && $device->cfg_c_RADAR == 1){
            $errstr .= $prefix . "设备无法连接雷视设备"  . $suffix;
        }
        
        if(property_exists($device, "cfg_c_MOTION") && $device->cfg_c_MOTION == 1){
            $errstr .= $prefix . "设备无法连接运动设备"  . $suffix;
        }        
        
        if(property_exists($device, "cfg_c_MEC") && $device->cfg_c_MEC == 1){
            $errstr .= $prefix . "设备无法连接MEC"  . $suffix;
        }
        
        if(property_exists($device, "cfg_f_OBU_CLOUD_KEY") && $device->cfg_f_OBU_CLOUD_KEY == 1){
            $errstr .= $prefix . "设备位置鉴权字符串文件丢失"  . $suffix;
        }     
        
        if(property_exists($device, "cfg_f_OBU_CLOUD_PORT") && $device->cfg_f_OBU_CLOUD_PORT == 1){
            $errstr .= $prefix . "设备位置端口文件丢失"  . $suffix;
        }   
        
        if(property_exists($device, "cfg_f_BSM_CLOUD_KEY") && $device->cfg_f_BSM_CLOUD_KEY == 1){
            $errstr .= $prefix . "设备BSM鉴权字符串文件丢失"  . $suffix;
        }     
        
        if(property_exists($device, "cfg_f_BSM_CLOUD_PORT") && $device->cfg_f_BSM_CLOUD_PORT == 1){
            $errstr .= $prefix . "设备BSM端口文件丢失"  . $suffix;
        } 

        if(property_exists($device, "cfg_f_RSM_CLOUD_KEY") && $device->cfg_f_RSM_CLOUD_KEY == 1){
            $errstr .= $prefix . "设备RSM鉴权字符串文件丢失"  . $suffix;
        }     
        
        if(property_exists($device, "cfg_f_RSM_CLOUD_PORT") && $device->cfg_f_RSM_CLOUD_PORT == 1){
            $errstr .= $prefix . "设备RSM端口文件丢失"  . $suffix;
        } 

        if(property_exists($device, "cfg_f_RSI_CLOUD_KEY") && $device->cfg_f_RSI_CLOUD_KEY == 1){
            $errstr .= $prefix . "设备RSI鉴权字符串文件丢失"  . $suffix;
        }     
        
        if(property_exists($device, "cfg_f_RSI_CLOUD_PORT") && $device->cfg_f_RSI_CLOUD_PORT == 1){
            $errstr .= $prefix . "设备RSI端口文件丢失"  . $suffix;
        } 
        
        if(property_exists($device, "cfg_f_zabbix_IP") && $device->cfg_f_zabbix_IP == 1){
            $errstr .= $prefix . "设备连接zabbix文件丢失"  . $suffix;
        } 
        
        if(property_exists($device, "cfg_f_ROI") && $device->cfg_f_ROI == 1){
            $errstr .= $prefix . "设备设置ROI区域文件丢失"  . $suffix;
        } 

        if(property_exists($device, "cfg_m_CLOUD") && $device->cfg_m_CLOUD == 1){
            $errstr .= $prefix . "设备云服务连接模块下线"  . $suffix;
        } 

        if(property_exists($device, "cfg_m_CURL") && $device->cfg_m_CURL == 1){
            $errstr .= $prefix . "设备雷视触发模块下线"  . $suffix;
        } 

        if(property_exists($device, "cfg_m_RELAYRSI") && $device->cfg_m_RELAYRSI == 1){
            $errstr .= $prefix . "设备RSI接收模块下线"  . $suffix;
        } 

        if(property_exists($device, "cfg_c_ZABBIX") && $device->cfg_c_ZABBIX == 1){
            $errstr .= $prefix . "设备无法连接zabbix服务"  . $suffix;
        }          

        //echo $errstr;
        if($errstr == $prefix . $suffix){
            $errstr = "";
        } else {
//            if($errstr != ""){
//                $errstr = substr($errstr, 3);
//            }
        }
        
        return $errstr;
    }
    
    function getRsuScoreStr($score){
        if($score == 0){
            return "<font color=green>正常</font>";
        } else if($score > 0 && $score <= 30){
            return "<font color=Coral>轻微错误</font>";
        } else if($score > 30 && $score <= 50){
            return "<font color=OrangeRed>中等错误</font>";
        } else {
            return "<font color=DarkRed>严重错误</font>";
        }
    }
}
