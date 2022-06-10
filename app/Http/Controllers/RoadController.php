<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Road;
use App\RoadLink;
use App\RoadCoordinate;

use DB;

class RoadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    function index(Request $request){
        $roads = Road::orderBy("id", "desc")
                ->get();
        
        return view("/road/roads", [
            "roads"=>$roads
        ]);
    }
    
    function addRoad(Request $request){
        return view("/road/addroad");
    }

    function addRoadSave(Request $request){
        $roadcheck = Road::where("roadname", $request->roadname)
                ->select("id")
                ->get();
        
        if(count($roadcheck) >0 ){
            return "路段名称已存在！";
        }
        
        $road = new Road();
        $road->roadname = $request->roadname;
        $road->remark = $request->remark;
        $road->save();
        
        return redirect("/roads");
    }

    function editRoad(Request $request){
        return "loading...";
    }

    function editRoadSave(Request $request){
        return "loading...";
    }

    function deleteRoad(Request $request){
        if($request->roadid == ""){
            return "缺少参数！";
        }
        
        DB::delete("delete from roads where id=" . $request->roadid);
        return redirect("/roads");
    }
}
