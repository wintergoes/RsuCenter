function hkVehType2Str(str){
    resstr = "";
    switch (str){
        case "nonmotorVehicle":
            resstr = "非机动车";
            break;
        case "smallCar":
            resstr = "小型轿车";
            break;
        case "miniCar":
            resstr = "微型轿车";
            break;
        case "pickupTruck":
            resstr = "皮卡车";
            break;
        case "largeBus":
            resstr = "大型客车";
            break;
        case "truck":
            resstr = "货车";
            break;
        case "vehicle":
            resstr = "轿车";
            break;
        case "van":
            resstr = "面包车";
            break;
        case "buggy":
            resstr = "小货车";
            break;
        case "pedestrian":
            resstr = "行人";
            break;
        case "twoWheelVehicle":
            resstr = "二轮车";
            break;
        case "threeWheelVehicle":
            resstr = "三轮车";
            break;
        case "SUVMPV":
            resstr = "SUVMPV";
            break;
        case "mediumBus":
            resstr = "中型客车";
            break;
        case "motorVehicle":
            resstr = "机动车";
            break;
        case "crane":
            resstr = "吊车";
            break;
        case "minibus":
            resstr = "小型客车";
            break;
        case "coupe":
            resstr = "轿跑";
            break;
        case "concreteMixer":
            resstr = "混凝土搅拌车";
            break;
        case "slagTruck":
            resstr = "渣土车";
            break;
        case "minitruck":
            resstr = "微卡";
            break;
        case "containerTruck":
            resstr = "集装箱卡车";
            break;
        case "platformTrailer":
            resstr = "平板拖车";
            break;
        case "oilTankTruck":
            resstr = "油罐车";
            break;
        case "hatchback":
            resstr = "两厢轿车";
            break;
        case "saloon":
            resstr = "三厢轿车";
            break;
        case "bus":
            resstr = "客车";
            break;
        case "lightTruck":
            resstr = "轻微货车";
            break;
        case "mediumHeavyTruck":
            resstr = "中重型货车";
            break;
        default:
            resstr = "其他";
            break;
    }

    return resstr;        
}

function hkVehType2StrForVehdetection(str){
    resstr = "";
    switch (str){
        case "nonmotorVehicle":
            resstr = "非机动车";
            break;
        case "smallCar":
            resstr = "小型轿车";
            break;
        case "miniCar":
            resstr = "微型轿车";
            break;
        case "pickupTruck":
            resstr = "皮卡车";
            break;
        case "largeBus":
            resstr = "大型客车";
            break;
        case "truck":
            resstr = "货车";
            break;
        case "vehicle":
            resstr = "轿车";
            break;
        case "van":
            resstr = "面包车";
            break;
        case "buggy":
            resstr = "小货车";
            break;
        case "pede":
            resstr = "行人";
            break;
        case "twoWheelVehicle":
            resstr = "二轮车";
            break;
        case "threeWheelVehicle":
            resstr = "三轮车";
            break;
        case "SUVMPV":
            resstr = "SUVMPV";
            break;
        case "mediumBus":
            resstr = "中型客车";
            break;
        case "motorVehicle":
            resstr = "机动车";
            break;
        case "crane":
            resstr = "吊车";
            break;
        case "minibu":
            resstr = "小型客车";
            break;
        case "coupe":
            resstr = "轿跑";
            break;
        case "concreteMixer":
            resstr = "混凝土搅拌车";
            break;
        case "slagTruck":
            resstr = "渣土车";
            break;
        case "minitruck":
            resstr = "微卡";
            break;
        case "containerTruck":
            resstr = "集装箱卡车";
            break;
        case "platformTrailer":
            resstr = "平板拖车";
            break;
        case "oilTankTruck":
            resstr = "油罐车";
            break;
        case "hatchback":
            resstr = "两厢轿车";
            break;
        case "saloon":
            resstr = "三厢轿车";
            break;
        case "bus":
            resstr = "客车";
            break;
        case "lightTruck":
            resstr = "轻微货车";
            break;
        case "mediumHeavyTruck":
            resstr = "中重型货车";
            break;
        case "vehi":
            resstr = "小客车";
            break; 
        case "twoWhe":
            resstr = "两轮车";
            break;
        case "threeW":
            resstr = "三轮车";
            break;          
        case "pickup":
            resstr = "皮卡";
            break;             
        default:
            resstr = str;
            break;
    }

    return resstr;        
}

function hkEvent2Str(str){
    resstr = "";
//        
//        if(str == "abandonedObject"){
//            resstr = "抛洒物";
//        }

    switch (str){
        case "abandonedObject":
            resstr = "抛洒物";
            break;
        case "checkPoint":
            resstr = "卡口检测";
            break;
        case "congestion":
            resstr = "拥堵";
            break;
        case "construction":
            resstr = "施工";
            break;
        case "crossLane":
            resstr = "压线";
            break;
        case "edfManual":
            resstr = "手动取证";
            break;
        case "fogDetection":
            resstr = "浓雾检测";
            break;
        case "gasser":
            resstr = "加塞";
            break;
        case "group":
            resstr = "人员聚集";
            break;
        case "illegalParking":
            resstr = "违停";
            break;
        case "intersectionStranded":
            resstr = "车辆滞留";
            break;
        case "laneChange":
            resstr = "变道";
            break;
        case "objectDroppedDown":
            resstr = "物体坠落";
            break;
        case "occupyOvertakingLane":
            resstr = "占用超车道";
            break;
        case "parallelParking":
            resstr = "侧方位停车";
            break;
        case "pedestrian":
            resstr = "行人检测";
            break;
        case "polyJam":
            resstr = "多边形拥堵,鹰眼拥堵";
            break;
        case "prohibitionMarkViolation":
            resstr = "违反禁令";
            break;
        case "roadBlock":
            resstr = "路障";
            break;
        case "slowMoving":
            resstr = "车辆缓行";
            break;
        case "smoke":
            resstr = "烟雾";
            break;
        case "speed":
            resstr = "车辆超速";
            break;
        case "suddenSpeedDrop":
            resstr = "速度骤降";
            break;
        case "trafficAccident":
            resstr = "交通事故检测";
            break;
        case "trafficConflict":
            resstr = "车流冲突";
            break;
        case "turnRound":
            resstr = "掉头";
            break;
        case "vehicleexist":
            resstr = "机占非";
            break;
        case "wrongDirection":
            resstr = "逆行";
            break;
        case "singleVehicleBreakdown":
            resstr = "单车抛锚";
            break;
        case "vehNoYieldPedest":
            resstr = "机动车不礼让行人";
            break;
        case "illegalMannedVeh":
            resstr = "机动车违法载人";
            break;
        case "illegalMannedNonMotorVeh":
            resstr = "非机动车违法载人";
            break;
        case "umbrellaTentInstall":
            resstr = "非机动车违规加装雨棚";
            break;
        case "nonMotorVehOnVehLane":
            resstr = "非机动车占用机动车道";
            break;
        case "wearingNoHelmet":
            resstr = "非机动车未佩戴头盔事";
            break;
        case "pedestRedLightRunning":
            resstr = "行人闯红灯";
            break;
        case "pedestOnNonMotorVehLane":
            resstr = "行人非机动车道行走";
            break;
        case "pedestOnVehLane":
            resstr = "行人机动车道行走";
            break;
        case "tfsManuaTrigger":
            resstr = "手动违章取证";
            break;
        case "lowSpeed":
            resstr = "低速行驶";
            break;
        case "lowVisibility":
            resstr = "能见度低";
            break; 
        case "dragRacing":
            resstr = "飚车";
            break; 
        case "unknown":
            resstr = "其他";
            break;   
        case "notKeepDistance":
            resstr = "未保持车距";
            break;        
        default:
            resstr = str;
    }

    return resstr;
}

function hkVehcolor2Str(str){
    resstr = "";
    switch (str){
        case "green":
            resstr = "绿色";
            break;
        case "brown":
            resstr = "棕色";
            break;
        case "pink":
            resstr = "粉色";
            break;
        case "purple":
            resstr = "紫色";
            break;
        case "deepGray":
            resstr = "深灰色";
            break;
        case "cyan":
            resstr = "青色";
            break;
        case "orange":
            resstr = "橙色";
            break;
        case "white":
            resstr = "白色";
            break;
        case "silver":
            resstr = "银色";
            break;
        case "gray":
            resstr = "灰色";
            break;
        case "black":
            resstr = "黑色";
            break;
        case "red":
            resstr = "红色";
            break;
        case "deepBlue":
            resstr = "深蓝色";
            break;
        case "blue":
            resstr = "蓝色";
            break;
        case "yellow":
            resstr = "黄色";
            break;
        default:
            resstr = "其他";
            break;
    }

    return resstr;
}

function fillVehTypeSelect(selecterid, selectedVehType){
    $("#" + selecterid).empty();
    var optstr = "<option value='-1'" + (selectedVehType === "-1" ? "selected" : "") + ">不限</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='nonmotorVehicle' " + (selectedVehType === "nonmotorVehicle" ? "selected" : "") + ">非机动车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='smallCar' " + (selectedVehType === "smallCar" ? "selected" : "") + ">小型轿车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='miniCar' " + (selectedVehType === "miniCar" ? "selected" : "") + ">微型轿车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='pickupTruck' " + (selectedVehType === "pickupTruck" ? "selected" : "") + ">皮卡车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='largeBus' " + (selectedVehType === "largeBus" ? "selected" : "") + ">大型客车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='truck' " + (selectedVehType === "truck" ? "selected" : "") + ">货车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='vehicle' " + (selectedVehType === "vehicle" ? "selected" : "") + ">轿车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='van' " + (selectedVehType === "van" ? "selected" : "") + ">面包车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='buggy' " + (selectedVehType === "buggy" ? "selected" : "") + ">小货车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='pedestrian' " + (selectedVehType === "pedestrian" ? "selected" : "") + ">行人</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='twoWheelVehicle' " + (selectedVehType === "twoWheelVehicle" ? "selected" : "") + ">二轮车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='threeWheelVehicle' " + (selectedVehType === "threeWheelVehicle" ? "selected" : "") + ">三轮车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='SUVMPV' " + (selectedVehType === "SUVMPV" ? "selected" : "") + ">SUVMPV</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='mediumBus' " + (selectedVehType === "mediumBus" ? "selected" : "") + ">中型客车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='motorVehicle' " + (selectedVehType === "motorVehicle" ? "selected" : "") + ">机动车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='crane' " + (selectedVehType === "crane" ? "selected" : "") + ">吊车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='minibus' " + (selectedVehType === "minibus" ? "selected" : "") + ">小型客车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='coupe' " + (selectedVehType === "coupe" ? "selected" : "") + ">轿跑</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='concreteMixer' " + (selectedVehType === "concreteMixer" ? "selected" : "") + ">混凝土搅拌车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='slagTruck' " + (selectedVehType === "slagTruck" ? "selected" : "") + ">渣土车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='minitruck' " + (selectedVehType === "minitruck" ? "selected" : "") + ">微卡</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='containerTruck' " + (selectedVehType === "containerTruck" ? "selected" : "") + ">集装箱卡车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='platformTrailer' " + (selectedVehType === "platformTrailer" ? "selected" : "") + ">平板拖车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='oilTankTruck' " + (selectedVehType === "oilTankTruck" ? "selected" : "") + ">油罐车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='hatchback' " + (selectedVehType === "hatchback" ? "selected" : "") + ">两厢轿车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='saloon' " + (selectedVehType === "saloon" ? "selected" : "") + ">三厢轿车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='bus' " + (selectedVehType === "bus" ? "selected" : "") + ">客车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='lightTruck' " + (selectedVehType === "lightTruck" ? "selected" : "") + ">轻微货车</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='mediumHeavyTruck' " + (selectedVehType === "mediumHeavyTruck" ? "selected" : "") + ">中重型货车</option>";
    $("#" + selecterid).append(optstr);
}


function fillAidEventSelect(selecterid, selectedAidEvent){
    $("#" + selecterid).empty();
    var optstr = "<option value='-1'" + (selectedAidEvent === "-1" ? "selected" : "") + ">不限</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='abandonedObject' " + (selectedAidEvent === "abandonedObject" ? "selected" : "") + ">抛洒物</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='congestion' " + (selectedAidEvent === "congestion" ? "selected" : "") + ">拥堵</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='laneChange' " + (selectedAidEvent === "laneChange" ? "selected" : "") + ">变道</option>";
    $("#" + selecterid).append(optstr);    
    optstr = "<option value='crossLane' " + (selectedAidEvent === "crossLane" ? "selected" : "") + ">压线</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='illegalParking' " + (selectedAidEvent === "illegalParking" ? "selected" : "") + ">违停</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='pedestrian' " + (selectedAidEvent === "pedestrian" ? "selected" : "") + ">行人检测</option>";
    $("#" + selecterid).append(optstr);
//    optstr = "<option value='smoke' " + (selectedAidEvent === "smoke" ? "selected" : "") + ">烟雾</option>";
//    $("#" + selecterid).append(optstr);
    optstr = "<option value='speed' " + (selectedAidEvent === "speed" ? "selected" : "") + ">车辆超速</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='lowSpeed' " + (selectedAidEvent === "lowSpeed" ? "selected" : "") + ">低速行驶</option>";
    $("#" + selecterid).append(optstr);     
//    optstr = "<option value='trafficAccident' " + (selectedAidEvent === "trafficAccident" ? "selected" : "") + ">交通事故</option>";
//    $("#" + selecterid).append(optstr);
    optstr = "<option value='wrongDirection' " + (selectedAidEvent === "wrongDirection" ? "selected" : "") + ">逆行</option>";
    $("#" + selecterid).append(optstr);
    optstr = "<option value='singleVehicleBreakdown' " + (selectedAidEvent === "singleVehicleBreakdown" ? "selected" : "") + ">单车抛锚</option>";
    $("#" + selecterid).append(optstr);
    
//    optstr = "<option value='lowVisibility' " + (selectedAidEvent === "lowVisibility" ? "selected" : "") + ">低能见度</option>";
//    $("#" + selecterid).append(optstr);
//    optstr = "<option value='fogDetection' " + (selectedAidEvent === "fogDetection" ? "selected" : "") + ">浓雾</option>";
//    $("#" + selecterid).append(optstr);
    optstr = "<option value='construction' " + (selectedAidEvent === "construction" ? "selected" : "") + ">道路施工</option>";
    $("#" + selecterid).append(optstr);        
}