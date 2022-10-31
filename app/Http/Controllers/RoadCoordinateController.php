<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoadCoordinate;
use App\Road;

use DB;

require_once '../app/Constant.php';

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
        if($request->coordid == ""){
            return "缺少参数！";
        }
        
        $coordid = $request->coordid;
        
        $coords = RoadCoordinate::where("id", $coordid)
                ->get();
        
        if(count($coords) == 0){
            return "信息不存在！";
        }
        
        return view("/road/addroadcoordinate", [
            "coord"=>$coords[0]
        ]);
    }

    function editRoadCoordinateSave(Request $request){
        
    }    
    
    function deleteRoadCoordinate(Request $request){
        if($request->coordid == ""){
            return "缺少参数！";
        }

        RoadCoordinate::where("id", $request->coordid)->delete();
        
        return "删除成功！";
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
        
        $distanceL = $request->leftwidth;    //坐标点左侧路的宽度，米
        $distanceR = $request->rightwidth;  //坐标点右侧路的宽度，米
        
        $latunit = 1/110000; // 每米对应的纬度值 
        $radianToAngle = 180 / pi(); //弧度转角度
        $angleToRadian = pi() / 180; //角度转弧度
        
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
            $altitude = 0;
            if(count($cols) > 2){
                $altitude = $cols[2];
            }
            
            if($lastlat == 0 || $lastlng == 0 || $lat == 0 || $lng == 0){
                $lastlat = $lat;
                $lastlng = $lng;                
                continue;
            }
            
            if($lat == $lastlat && $lng == $lastlng){
                continue;                
            }
            
            $angle = 0;
            $lngunit = 1/(110000 * cos($lat * $angleToRadian)); //每米对应的经度值
            
            $lngcha = abs($lng - $lastlng) * cos($lat * $angleToRadian);
            $latcha = abs($lat - $lastlat);
            
            $a = 0;
            if($lat > $lastlat && $lng < $lastlng ){
                $a = atan($lngcha / $latcha) ;
                $angle = 360 - $a * $radianToAngle;
                $latdistanceL = $distanceL * sin($a) * $latunit;
                $lngdistanceL = $distanceL * cos($a) * $lngunit;
                $latdistanceR = $distanceR * sin($a) * $latunit;
                $lngdistanceR = $distanceR * cos($a) * $lngunit;                
                                
                $p1lng = $lastlng - $lngdistanceL; $p1lat = $lastlat - $latdistanceL;
                $p2lng = $lng - $lngdistanceL; $p2lat = $lat - $latdistanceL;
                $p3lng = $lng + $lngdistanceR; $p3lat = $lat + $latdistanceR;
                $p4lng = $lastlng + $lngdistanceR; $p4lat = $lastlat + $latdistanceR;                
            } else if($lat < $lastlat && $lng < $lastlng){
                $a = atan($latcha / $lngcha) ;
                $angle = 270 - $a * $radianToAngle;
                $lngdistanceL = $distanceL * sin($a) * $lngunit;
                $latdistanceL = $distanceL * cos($a) * $latunit;
                $lngdistanceR = $distanceR * sin($a) * $lngunit;
                $latdistanceR = $distanceR * cos($a) * $latunit;                
                
                $p1lng = $lastlng + $lngdistanceL; $p1lat = $lastlat - $latdistanceL;
                $p2lng = $lng + $lngdistanceL; $p2lat = $lat - $latdistanceL;
                $p3lng = $lng - $lngdistanceR; $p3lat = $lat + $latdistanceR;
                $p4lng = $lastlng - $lngdistanceR; $p4lat = $lastlat + $latdistanceR;
            } else if($lat < $lastlat && $lng > $lastlng){
                $a = atan($lngcha / $latcha) ;
                $angle = 180 - $a * $radianToAngle;
                $latdistanceL = $distanceL * sin($a) * $latunit;
                $lngdistanceL = $distanceL * cos($a) * $lngunit;
                $latdistanceR = $distanceR * sin($a) * $latunit;
                $lngdistanceR = $distanceR * cos($a) * $lngunit;                
                
                $p1lng = $lastlng + $lngdistanceL; $p1lat = $lastlat + $latdistanceL;
                $p2lng = $lng + $lngdistanceL; $p2lat = $lat + $latdistanceL;
                $p3lng = $lng - $lngdistanceR; $p3lat = $lat - $latdistanceR;
                $p4lng = $lastlng - $lngdistanceR; $p4lat = $lastlat - $latdistanceR;
            } else if($lat > $lastlat && $lng > $lastlng){
                $a = atan($latcha / $lngcha);
                $angle = 90 - $a * $radianToAngle;
                $lngdistanceL = $distanceL * sin($a) * $lngunit;
                $latdistanceL = $distanceL * cos($a) * $latunit;
                $lngdistanceR = $distanceR * sin($a) * $lngunit;
                $latdistanceR = $distanceR * cos($a) * $latunit;                
                
                $p1lng = $lastlng - $lngdistanceL; $p1lat = $lastlat + $latdistanceL;
                $p2lng = $lng - $lngdistanceL; $p2lat = $lat + $latdistanceL;
                $p3lng = $lng + $lngdistanceR; $p3lat = $lat - $latdistanceR;
                $p4lng = $lastlng + $lngdistanceR; $p4lat = $lastlat - $latdistanceR;
            }
            
            if($lat == $lastlat){
                $latdistanceL = $distanceL * $latunit;
                $latdistanceR = $distanceR * $latunit;

                $p1lng = $lastlng; $p1lat = $lastlat + $latdistanceL; 
                $p2lng = $lng; $p2lat = $lat + $latdistanceL;
                $p3lng = $lng; $p3lat = $lat - $latdistanceR;
                $p4lng = $lastlng; $p4lat = $lastlat - $latdistanceR;
                
                if($lng > $lastlng){
                    $angle = 90;
                } else {
                    $angle = -90;
                }
            }
            
            if($lng == $lastlng){
                $lngdistanceL = $distanceL * $lngunit;
                $lngdistanceR = $distanceR * $lngunit;
                
                $p1lng = $lastlng - $lngdistanceL; $p1lat = $lastlat;
                $p2lng = $lng - $lngdistanceL; $p2lat = $lat;
                $p3lng = $lng + $lngdistanceR; $p3lat = $lat;
                $p4lng = $lastlng + $lngdistanceR; $p4lat = $lastlat;
                
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
            $roadcoord->angle1 = $a ;
            $roadcoord->lat = $lat;
            $roadcoord->lng = $lng;
            $roadcoord->altitude = $altitude;
            $roadcoord->distance = $this->getDistance($lastlat, $lastlng, $lat, $lng) * 1000;
            $roadcoord->save();
            
            //echo $p1lng . "," . $p1lat . ";" . $p2lng . "," . $p2lat . ";" . $p3lng . "," . $p3lat . ";" . $p4lng . "," . $p4lat . "<br/>";
//            print(sprintf("%.6f,%.6f;  %.6f,%.6f;  %.6f,%.6f;  %.6f,%.6f; ===========%.6f, %.6f; %.6f, %.6f;===========%.2f<br/>", 
//                    $p1lng, $p1lat, $p2lng, $p2lat, $p3lng, $p3lat, $p4lng, $p4lat,
//                    $lat, $lng, $lastlat, $lastlng, $angle));
            
//            print(sprintf("%.6f,%.6f;  %.6f<br/>", 
//                    $latcha, $lngcha, $p2lng));            
            
            $lastlat = $lat;
            $lastlng = $lng;
        }
        
        return "导入成功！　　<a href='importroadcoordinate?roadid=" . $roadid . "'>继续导入</a>　　<a href='showroadcoordinate?roadid=" . $roadid . "'>点击在地图中查看</a>";
    }
    
    function updateRoadCoordinate(Request $request){
        if($request->coordid == ""){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr);
        }
        
        $coords = RoadCoordinate::where("id", $request->coordid)
                ->get();
        
        if(count($coords) == 0){
            $arr = array("retcode"=>ret_error, "retmsg"=>"数据不存在！");
            return json_encode($arr);            
        }
        
        $roadcoord = $coords[0];
        
        $p1lat = $request->p1lat; $p1lng = $request->p1lng;
        $p2lat = $request->p2lat; $p2lng = $request->p2lng;
        $p3lat = $request->p3lat; $p3lng = $request->p3lng;
        $p4lat = $request->p4lat; $p4lng = $request->p4lng;
        
        $maxlat = max($p1lat, $p2lat, $p3lat, $p4lat);
        $minlat = min($p1lat, $p2lat, $p3lat, $p4lat);
        $maxlng = max($p1lng, $p2lng, $p3lng, $p4lng);
        $minlng = min($p1lng, $p2lng, $p3lng, $p4lng); 
        
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
        $roadcoord->save();
        
        $arr = array("retcode"=>ret_success);
        return json_encode($arr);
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
    
    function showRoadCoordinate(Request $request){
        if($request->roadid == ""){
            return "缺少参数！";
        }
        
        $roadid = $request->roadid;
        
        $roads = Road::where("id", $roadid)
                ->get();
        
        if(count($roads) == 0){
            return "道路信息不存在！";
        }        
        
        $coords = RoadCoordinate::where("roadid", $roadid)
                ->orderBy("id", "desc")
                ->get();
        
        return view("/road/showroadcoordinate", [
            "coords"=>$coords,
            "road"=>$roads[0]
        ]);
    }
    
    function exportRoadCoordinate(Request $request){
        if($request->roadid == ""){
            return "缺少参数！";
        }
        
        $roadid = $request->roadid;
        
        $roads = Road::where("id", $roadid)
                ->get();
        
        if(count($roads) == 0){
            return "道路信息不存在！";
        }         
        
        $coords = RoadCoordinate::where("roadid", $roadid)
                ->orderBy("lanetype", "asc")
                ->orderBy("laneno", "asc")
                ->orderBy("id", "asc")
                ->get();
        
        if(count($coords) == 0){
            return "无坐标数据！";
        }
        
        $exportpath = "temp/" ;
        if(!is_dir($exportpath)){
            mkdir($exportpath, 0777, true);
        }
        $showtime=date("[Ymd_His]");
        $exportfilename =  iconv("UTF-8", "GBK", $exportpath . $roads[0]->roadname . $showtime . '.csv');

//        $contentssrc = "区名称,街道名称,社区名称,居民名称,积分卡号,微信昵称,电话,垃圾类型,"
//            . "商品名称" . "," . "重量/斤" . ",";

        foreach($coords as $coord){
            $datasrc = $coord->coordtype . "," . $coord->lanetype . "," . $coord->laneno . "," . 
                    sprintf("%.6f", $coord->lng1) . "," . sprintf("%.6f", $coord->lat1) . "," . sprintf("%.6f", $coord->lng2) . "," . sprintf("%.6f", $coord->lat2) . "," . 
                    sprintf("%.6f", $coord->lng3) . "," . sprintf("%.6f", $coord->lat3) . "," . sprintf("%.6f", $coord->lng4) . "," . sprintf("%.6f", $coord->lat4) . "," . 
                    sprintf("%.6f", $coord->maxlng) . "," . sprintf("%.6f", $coord->maxlat) . "," . sprintf("%.6f", $coord->minlng) . "," . sprintf("%.6f", $coord->minlat) . "," . 
                    sprintf("%.6f", $coord->lng) . "," . sprintf("%.6f", $coord->lat) . "," . sprintf("%.6f", $coord->altitude) . "," . $coord->angle . "," . 
                    $coord->distance . "\n";

            $contents = iconv("UTF-8", "GBK//IGNORE", $datasrc);
            file_put_contents($exportfilename, $contents, FILE_APPEND);
        }

        return redirect($exportfilename);        
    }
}
