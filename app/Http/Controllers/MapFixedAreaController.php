<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MapFixedArea;
use DB;

class MapFixedAreaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $fixedareas = MapFixedArea::orderBy("id", "desc")
                ->get();
        
        $default_lat = env("home_default_lat", 36.183753);
        $default_lng = env("home_default_lng", 120.339217);
        $default_zoom = env("home_map_defaultzoom", 15);        
        
        return view("/road/showmapfixedareas", [
            "fixedareas"=>$fixedareas,
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,  
        ]);
    }
    
    
    function addMapFixedArea(Request $request){
        $default_lat = env("home_default_lat", 36.183753);
        $default_lng = env("home_default_lng", 120.339217);
        $default_zoom = env("home_map_defaultzoom", 15);
        
        return view("/road/addmapfixedarea", [
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom, 
        ]);
    }
    
    function addMapFixedAreaSave(Request $request){
        $area = new MapFixedArea();
        $area->areatype = $request->areatype;
        $area->areaname = $request->areaname;
        $area->coordinates = $request->coordinates;
        $area->centerlat = $request->centerlat;
        $area->centerlng = $request->centerlng;    
        $area->daytexture = $request->daytexture;  
        $area->nighttexture = $request->nighttexture;
        $area->areaparam1 = $request->areaparam1;
        $area->areaparam2 = $request->areaparam2;
        $area->areaparam3 = $request->areaparam3;
        $area->save();
        
        return redirect("mapfixedareas");        
    }
    
    function editMapFixedArea(Request $request){
        if($request->areaid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $areas = MapFixedArea::where("id", $request->areaid)
                ->get();
        
        if(count($areas) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"区域信息不存在！",
            ]);
        }
        
        $default_lat = env("home_default_lat", 36.183753);
        $default_lng = env("home_default_lng", 120.339217);
        $default_zoom = env("home_map_defaultzoom", 15);        
        
        return view("/road/addmapfixedarea", [
            "area"=>$areas[0],
            "default_lat"=>$default_lat,
            "default_lng"=>$default_lng,
            "default_zoom"=>$default_zoom,     
        ]);
    }
    
    function editMapFixedAreaSave(Request $request){
        if($request->areaid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $areas = MapFixedArea::where("id", $request->areaid)
                ->get();
        
        if(count($areas) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"区域信息不存在！",
            ]);
        }
        
        $area = $areas[0];
        $area->areatype = $request->areatype;
        $area->areaname = $request->areaname;
        $area->coordinates = $request->coordinates;
        $area->centerlat = $request->centerlat;
        $area->centerlng = $request->centerlng;    
        $area->daytexture = $request->daytexture;  
        $area->nighttexture = $request->nighttexture;
        $area->areaparam1 = $request->areaparam1;
        $area->areaparam2 = $request->areaparam2;
        $area->areaparam3 = $request->areaparam3;
        $area->save();
        
        return redirect("mapfixedareas"); 
    }    
    
    function updateRoadFixedArea(Request $request){
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

    function deleteMapFixedArea(Request $request){
        DB::delete("delete from mapfixedareas where id=" . $request->areaid);
        return redirect("mapfixedareas"); 
    }       
}
