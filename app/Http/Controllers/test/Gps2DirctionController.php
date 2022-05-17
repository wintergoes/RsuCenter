<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\test\Gps2Direction;

class Gps2DirctionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function importData(Request $request){
        return view("test/importgps2directiondata");
    }
    
    public function importDataSave(Request $request){
        if($request->dname == "" || $request->dcontent == ""){
            return "名称或者导入内容不能为空!";            
        }
        
        $drow = explode("\r", $request->dcontent);
        $importcount = 0;
        foreach($drow as $row){
            if(trim($row) == ""){
                echo "blank row<br/>";
                continue;
            }
            $cols = explode(",", $row);
            if(count($cols) < 6){
                echo "invalid row<br/>";
                continue;                
            }
            
            $lat = $cols[0];
            $lat = str_replace("lat:", "", $lat);
            
            $lng = $cols[1];
            $lng = str_replace("lng:", "", $lng);
            
            $satnum = $cols[2];
            $satnum = str_replace("*", "", $satnum);
            
            $direction = $cols[3];
            
            $distance = $cols[4];
            $distance = str_replace("米", "", $distance);
            
            $speed = $cols[5];
            $speed = str_replace("m/s", "", $speed);
            
            $gpsdata = new Gps2Direction();
            $gpsdata->dname = $request->dname;
            $gpsdata->lat = $lat;
            $gpsdata->lng = $lng;
            $gpsdata->satnum = $satnum;
            $gpsdata->direction = $direction;
            $gpsdata->distance = $distance;
            $gpsdata->speed = $speed;
            $gpsdata->save();
            $importcount++;
            //echo $row . "<br/>";
        }
        
        echo "导入了" . $importcount . "条数据。";
    }    
    
    public function showData(Request $request){
        $dnames = DB::select("select distinct dname from gps2direction");
        
        if($request->dname != ""){
            $gpsdatas = Gps2Direction::where('dname', $request->dname)
                    //->limit(1000)
                    ->get();
            
            return view("test/showgps2directiondata", [
                "dnames"=>$dnames,
                "gpsdatas"=>$gpsdatas
            ]);
        }
        
        return view("test/showgps2directiondata", [
            "dnames"=>$dnames
        ]);         
    }
    
    public function deleteData(Request $request){
        if($request->dname == "" ){
            return "名称不能为空!";            
        }        
        
        DB::delete("delete from gps2direction where dname='" . $request->dname . "'");
        
        return redirect("/showgps2directiondata");       
    }    
}
