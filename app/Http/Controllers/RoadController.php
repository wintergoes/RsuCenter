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
            return view('/other/simplemessage', [
                'simplemessage'=>"路段名称已存在！",
            ]);
        }
        
        $road = new Road();
        $road->roadname = $request->roadname;
        $road->remark = $request->remark;
        $road->save();
        
        return redirect("/roads");
    }

    function editRoad(Request $request){
        if($request->roadid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $roads = Road::where("id", $request->roadid)
                ->get();
        if(count($roads) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"数据不存在！",
            ]);
        }
        
        return view("/road/addroad", [
            "road"=>$roads[0]
        ]);
    }

    function editRoadSave(Request $request){
        if($request->roadid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        $roads = Road::where("id", $request->roadid)
                ->get();
        if(count($roads) == 0){
            return view('/other/simplemessage', [
                'simplemessage'=>"数据不存在！",
            ]);
        } 
        
        $road = $roads[0];
        $road->roadname = $request->roadname;
        $road->remark = $request->remark;
        $road->save();
        
        return redirect("/roads");        
    }

    function deleteRoad(Request $request){
        if($request->roadid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        DB::delete("delete from roads where id=" . $request->roadid);
        DB::delete("delete from roadcoordinates where roadid=" . $request->roadid);
        DB::delete("delete from roadlinks where roadid=" . $request->roadid);
        DB::delete("delete from mapareas where roadid=" . $request->roadid);
        DB::delete("delete from roadlinks where linkroadid=" . $request->roadid);
        
        return redirect("/roads");
    }
    
    function unpublishRoad(Request $request){
        if($request->roadid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        DB::update("update roads set published=0 where id=" . $request->roadid);
        
        return "取消发布成功！";       
    }
    
    function publishRoad(Request $request){
        if($request->roadid == ""){
            return view('/other/simplemessage', [
                'simplemessage'=>"缺少参数！",
            ]);
        }
        
        DB::update("update roads set published=1 where id=" . $request->roadid);
        
        return "发布成功！";
    }    
}
