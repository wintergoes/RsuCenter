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
