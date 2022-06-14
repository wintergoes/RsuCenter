<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoadCoordinate;
use App\Road;

class RoadCoordinateController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        if($request->roadid == ""){
            return "缺少参数！";
        }
        
        $roads = Road::where("id", $request->roadid)
                ->get();
        
        if(count($roads) == 0){
            return "道路信息不存在！";
        }
        
        $coordinates = RoadCoordinate::orderBy("id", "desc")
                ->where("roadid", $request->roadid)
                ->paginate(50);
        
        return view("/road/roadcoordinates", [
           "coordinates"=>$coordinates,
            "roadid"=>$request->roadid,
            "road"=>$roads[0]
        ]);
    }
    
    function addRoadCoordinate(Request $request){
        return view("/road/addroadcoordinate");
    }
    
    function addRoadCoordinateSave(Request $request){
        
    }

    function editRoadCoordinate(Request $request){
        
    }

    function editRoadCoordinateSave(Request $request){
        
    }    
    
    function DeleteRoadCoordinate(Request $request){
        
    }
    
    function importRoadCoordinate(Request $request){
        $roads = Road::where("id", $request->roadid)
                ->get();
        
        if(count($roads) == 0){
            return "道路信息不存在！";
        }        
        
        return view("/road/importroadcoordinate", [
            "road"=>$roads[0]
        ]);
    }
    
    function importRoadCoordinateSave(Request $request){
        $drow = explode("\r", $request->gpsdata);
        $importcount = 0;
        $roadid = $request->roadid;
        
        $laneno = 0;
        if($request->laneno != ""){
            $laneno = $request->laneno;
        }
        
        $lastlat = 0; $lastlng = 0;
        for($i = 1; $i < count($drow); $i++){
            $row = $drow[$i];
            if(trim($row) == ""){
                echo "blank row<br/>";
                continue;
            }
            
            if($lastlat == 0 || $lastlng == 0){
                $lastrow = $drow[$i-1];
                $lastcols = explode(",", $lastrow);
                $lastlat = $lastcols[1];
                $lastlng = $lastcols[0];
            }
            
            $cols = explode(",", $row);
            if(count($cols) < 2){
                echo "invalid row<br/>";
                continue;                
            }
            
            $lat = $cols[1];
            $lng = $cols[0];
            
            if($lastlat == 0 || $lastlng == 0 || $lat == 0 || $lng == 0){
                $lastlat = $lat;
                $lastlng = $lng;                
                continue;
            }
            
            if($lat == $lastlat && $lng == $lastlng){
                continue;                
            }
            
            $distanceM = 10;    //路的宽度，米     
            $angle = 0;
            
            $latunit = 1/110000; // 每米对应的纬度值 
            $lngunit = 1/(110000 * cos($lat)); //每米对应的经度值
            
            $lngcha = abs($lng - $lastlng) * cos($lat);
            $latcha = abs($lat - $lastlat) ;
            
            $a = 0;
            if($lat > $lastlat && $lng < $lastlng ){
                $a = atan($lngcha / $latcha) ;
                $angle = 0 - $a * (180 / pi());
                $latdistance = $distanceM * sin($a) * $latunit;
                $lngdistance = $distanceM * cos($a) * $lngunit;
                
                $p1lng = $lastlng + $lngdistance; $p1lat = $lastlat + $latdistance;
                $p2lng = $lastlng - $lngdistance; $p2lat = $lastlat - $latdistance;
                $p3lng = $lng - $lngdistance; $p3lat = $lat - $latdistance;
                $p4lng = $lng + $lngdistance; $p4lat = $lat + $latdistance;
            } else if($lat < $lastlat && $lng < $lastlng){
                $a = atan($latcha / $lngcha) ;
                $angle = 0 - (90 + $a * (180 / pi()));
                $lngdistance = $distanceM * sin($a) * $lngunit;
                $latdistance = $distanceM * cos($a) * $latunit;
                
                $p1lng = $lastlng - $lngdistance; $p1lat = $lastlat + $latdistance;
                $p2lng = $lastlng + $lngdistance; $p2lat = $lastlat - $latdistance;
                $p3lng = $lng + $lngdistance; $p3lat = $lat - $latdistance;
                $p4lng = $lng - $lngdistance; $p4lat = $lat + $latdistance;                
            } else if($lat < $lastlat && $lng > $lastlng){
                $a = atan($lngcha / $latcha) ;
                $angle = 180 + $a * (180 / pi());
                $latdistance = $distanceM * sin($a) * $latunit;
                $lngdistance = $distanceM * cos($a) * $lngunit;
                
                $p1lng = $lastlng - $lngdistance; $p1lat = $lastlat - $latdistance;
                $p2lng = $lastlng + $lngdistance; $p2lat = $lastlat + $latdistance;
                $p3lng = $lng + $lngdistance; $p3lat = $lat + $latdistance;
                $p4lng = $lng - $lngdistance; $p4lat = $lat - $latdistance;                
            } else if($lat > $lastlat && $lng > $lastlng){
                $a = atan($latcha / $lngcha);
                $angle = 90 + $a * (180 / pi());
                $lngdistance = $distanceM * sin($a) * $lngunit;
                $latdistance = $distanceM * cos($a) * $latunit;
                
                $p1lng = $lastlng + $lngdistance; $p1lat = $lastlat - $latdistance;
                $p2lng = $lastlng - $lngdistance; $p2lat = $lastlat + $latdistance;
                $p3lng = $lng - $lngdistance; $p3lat = $lat + $latdistance;
                $p4lng = $lng + $lngdistance; $p4lat = $lat - $latdistance;                
            }
            
            if($lat == $lastlat){
                $latdistance = $distanceM * $latunit;
                $p1lng = $lastlng; $p1lat = $lastlat - $latdistance;
                $p2lng = $lastlng; $p2lat = $lastlat + $latdistance; 
                $p3lng = $lng; $p3lat = $lat + $latdistance;
                $p4lng = $lng; $p4lat = $lat - $latdistance;
                
                if($lng > $lastlng){
                    $angle = 90;
                } else {
                    $angle = -90;
                }
            }
            
            if($lng == $lastlng){
                $lngdistance = $distanceM * $lngunit;
                $p1lng = $lastlng + $lngdistance; $p1lat = $lastlat;
                $p2lng = $lastlng - $lngdistance; $p2lat = $lastlat;
                $p3lng = $lng - $lngdistance; $p3lat = $lat;
                $p4lng = $lng + $lngdistance; $p4lat = $lat;
                
                if($lat > $lastlat){
                    $angle = 0;
                } else {
                    $angle = 180;
                }
            }
            
            $maxlat = max($p1lat, $p2lat, $p3lat, $p4lat);
            $minlat = min($p1lat, $p2lat, $p3lat, $p4lat);
            $maxlng = max($p1lng, $p2lng, $p3lng, $p4lng);
            $minlng = min($p1lng, $p2lng, $p3lng, $p4lng);
            
            $roadcoord = new RoadCoordinate();
            $roadcoord->roadid = $roadid;
            $roadcoord->lanetype = $request->lanetype;
            $roadcoord->laneno = $laneno;
            $roadcoord->lat1 = $p1lat;
            $roadcoord->lng1 = $p1lng;
            $roadcoord->lat2 = $p2lat;
            $roadcoord->lng2 = $p2lng;
            $roadcoord->lat3 = $p3lat;
            $roadcoord->lng3 = $p3lng;
            $roadcoord->lat4 = $p4lat;
            $roadcoord->lng4 = $p4lng;
            $roadcoord->maxlat = $maxlat;
            $roadcoord->maxlng = $maxlng;
            $roadcoord->minlat = $minlat;
            $roadcoord->minlng = $minlng;
            $roadcoord->angle = $angle;
            $roadcoord->angle1 = $a;
            $roadcoord->lat = $lat;
            $roadcoord->lng = $lng;
            $roadcoord->save();
            
            //echo $p1lng . "," . $p1lat . ";" . $p2lng . "," . $p2lat . ";" . $p3lng . "," . $p3lat . ";" . $p4lng . "," . $p4lat . "<br/>";
            print(sprintf("%.6f,%.6f;  %.6f,%.6f;  %.6f,%.6f;  %.6f,%.6f; ===========%.6f, %.6f; %.6f, %.6f;===========%.2f<br/>", 
                    $p1lng, $p1lat, $p2lng, $p2lat, $p3lng, $p3lat, $p4lng, $p4lat,
                    $lat, $lng, $lastlat, $lastlng, $angle));
            
            $lastlat = $lat;
            $lastlng = $lng;
        }
    }    
    
    function showRoadCoordinate(Request $request){
        if($request->roadid == ""){
            return "缺少参数！";
        }
        
        $roadid = $request->roadid;
        
        $coords = RoadCoordinate::where("roadid", $roadid)
                ->orderBy("id", "desc")
                ->get();
        
        return view("/road/showroadcoordinate", [
            "coords"=>$coords
        ]);
    }
}
