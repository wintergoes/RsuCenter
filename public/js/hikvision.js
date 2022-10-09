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