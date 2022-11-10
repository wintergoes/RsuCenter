<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Road;
use App\MapArea;

use DB;
use Auth;

require_once '../app/Constant.php';

class MapAreaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        if($request->roadid == ""){
            return "缺少参数！";
        }
        
        $searchroadid = $request->roadid;
        
        $roads = Road::where("id", $searchroadid)
                ->get();
        
        if(count($roads) == 0){
            return "道路信息不存在！";
        }
        
        $areas = MapArea::where("roadid", $searchroadid)
                ->orderBy("id", "desc")
                ->get();
        
        return view("/road/showroadareas", [
            "areas"=>$areas,
            "road"=>$roads[0]
        ]);
    }
    
    function addRoadArea(Request $request){
        if($request->roadid == ""){
            return "缺少参数！";
        }
        
        $searchroadid = $request->roadid;
        
        $roads = Road::where("id", $searchroadid)
                ->get();
        
        if(count($roads) == 0){
            return "道路信息不存在！";
        }
        
        $default_lat = env("home_default_lat", 36.183753);
        $default_lng = env("home_default_lng", 120.339217);
        $default_zoom = env("home_map_defaultzoom", 15);
        
        return view("/road/addroadarea", [
            "road"=>$roads[0],
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,            
        ]);
    }
    
    function addRoadAreaSave(Request $request){
        if($request->roadid == ""){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr);
        }
        
        $roadid = $request->roadid;        
        
        $p1lat = $request->p1lat; $p1lng = $request->p1lng;
        $p2lat = $request->p2lat; $p2lng = $request->p2lng;
        $p3lat = $request->p3lat; $p3lng = $request->p3lng;
        $p4lat = $request->p4lat; $p4lng = $request->p4lng;
        $p5lat = $request->p5lat; $p5lng = $request->p5lng;
        $p6lat = $request->p6lat; $p6lng = $request->p6lng;
        
        $maxlat = max($p1lat, $p2lat, $p3lat, $p4lat);
        $minlat = min($p1lat, $p2lat, $p3lat, $p4lat);
        $maxlng = max($p1lng, $p2lng, $p3lng, $p4lng);
        $minlng = min($p1lng, $p2lng, $p3lng, $p4lng); 
        
        $latunit = 1/110000; // 每米对应的纬度值 
        $radianToAngle = 180 / pi(); //弧度转角度
        $angleToRadian = pi() / 180; //角度转弧度
        
        $lngcha = abs($p5lng - $p6lng) * cos($p5lat * $angleToRadian);
        $latcha = abs($p5lat - $p6lat);

        $a = 0;
        if($p5lat > $p6lat && $p5lng < $p6lng ){
            $a = atan($lngcha / $latcha) ;
            $angle = 360 - $a * $radianToAngle;                
        } else if($p5lat < $p6lat && $p5lng < $p6lng){
            $a = atan($latcha / $lngcha) ;
            $angle = 270 - $a * $radianToAngle;
        } else if($p5lat < $p6lat && $p5lng > $p6lng){
            $a = atan($lngcha / $latcha) ;
            $angle = 180 - $a * $radianToAngle;
        } else if($p5lat > $p6lat && $p5lng > $p6lng){
            $a = atan($latcha / $lngcha);
            $angle = 90 - $a * $radianToAngle;
        }

        if($p5lat == $p6lat){
            if($p5lng > $p6lng){
                $angle = 90;
            } else {
                $angle = -90;
            }
        }

        if($p5lng == $p6lng){
            if($p5lat > $p6lat){
                $angle = 0;
            } else {
                $angle = 180;
            }
        }        
        
        $area = new MapArea();
        $area->areatype = $request->areatype;
        $area->areaname = $request->areaname;
        $area->areaparam1 = $request->areaparam1;
        $area->areaparam2 = $request->areaparam2;
        $area->areaparam3 = $request->areaparam3;
        $area->roadid = $roadid;
        $area->lat1 = $p1lat;
        $area->lng1 = $p1lng;
        $area->lat2 = $p2lat;
        $area->lng2 = $p2lng;
        $area->lat3 = $p3lat;
        $area->lng3 = $p3lng;
        $area->lat4 = $p4lat;
        $area->lng4 = $p4lng;
        $area->maxlat = $maxlat;
        $area->maxlng = $maxlng;
        $area->minlat = $minlat;
        $area->minlng = $minlng;
        $area->angle = $angle;
        $area->angle1 = $a ;        
        $area->lng = $p5lng;
        $area->lat = $p5lat;
        $area->altitude = 0;
        $area->distance = $this->getDistance($p6lat, $p6lng, $p5lat, $p5lng) * 1000;
        $area->save();
        
        $arr = array("retcode"=>ret_success);
        return json_encode($arr);        
    }
    
    function editRoadArea(Request $request){
        if($request->areaid == ""){
            echo "缺少参数！";
            return;
        }
        
        $areas = MapArea::where("id", $request->areaid)
                ->get();
        
        if(count($areas) == 0){
            echo "区域信息不存在！";
            return;
        }
        
        $default_lat = env("home_default_lat", 36.183753);
        $default_lng = env("home_default_lng", 120.339217);
        $default_zoom = env("home_map_defaultzoom", 15);        
        
        return view("/road/addroadarea", [
            "area"=>$areas[0],
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,     
        ]);
    }
    
    function editRoadAreaSave(Request $request){
        if($request->areaid == ""){
            echo "缺少参数！";
            return;
        }
        
        $areas = MapArea::where("id", $request->areaid)
                ->get();
        
        if(count($areas) == 0){
            echo "区域信息不存在！";
            return;
        }
        
        $area = $areas[0];
        
        $roadid = $request->roadid; 
        
        $area->areatype = $request->areatype;
        $area->areaname = $request->areaname;
        $area->areaparam1 = $request->areaparam1;
        $area->areaparam2 = $request->areaparam2;
        $area->areaparam3 = $request->areaparam3;
        $area->roadid = $roadid;
        $area->save();
        
        return redirect("showroadareas?roadid=" . $roadid);         
    }    
    
    function updateRoadArea(Request $request){
        if($request->areaid == ""){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr);
        }
        
        $areas = MapArea::where("id", $request->areaid)
                ->get();
        
        if(count($areas) == 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"数据不存在！");
            return json_encode($arr);            
        }
        
        $area = $areas[0];
        
        $p1lat = $request->p1lat; $p1lng = $request->p1lng;
        $p2lat = $request->p2lat; $p2lng = $request->p2lng;
        $p3lat = $request->p3lat; $p3lng = $request->p3lng;
        $p4lat = $request->p4lat; $p4lng = $request->p4lng;
        
        $maxlat = max($p1lat, $p2lat, $p3lat, $p4lat);
        $minlat = min($p1lat, $p2lat, $p3lat, $p4lat);
        $maxlng = max($p1lng, $p2lng, $p3lng, $p4lng);
        $minlng = min($p1lng, $p2lng, $p3lng, $p4lng); 
        
        $area->lat1 = $p1lat;
        $area->lng1 = $p1lng;
        $area->lat2 = $p2lat;
        $area->lng2 = $p2lng;
        $area->lat3 = $p3lat;
        $area->lng3 = $p3lng;
        $area->lat4 = $p4lat;
        $area->lng4 = $p4lng;
        $area->maxlat = $maxlat;
        $area->maxlng = $maxlng;
        $area->minlat = $minlat;
        $area->minlng = $minlng;
        $area->save();
        
        $arr = array("retcode"=>ret_success);
        return json_encode($arr);        
    }

    function deleteRoadArea(Request $request){
        DB::delete("delete from mapareas where id=" . $request->areaid);
        return redirect("showroadareas?roadid=" . $request->roadid);
    }   
    
    /**
     * @param $lat1
     * @param $lng1
     * @param $lat2
     * @param $lng2
     * @return int
     */
    function getDistance($lat1, $lng1, $lat2, $lng2){
        // 将角度转为狐度 
        $radLat1 = deg2rad($lat1);// deg2rad()函数将角度转换为弧度
        $radLat2 = deg2rad($lat2);
        $radLng1 = deg2rad($lng1);
        $radLng2 = deg2rad($lng2);

        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;

        $s = 2 * asin(sqrt(pow(sin($a / 2), 2)+cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378.137;

        return $s;
    }    
}
