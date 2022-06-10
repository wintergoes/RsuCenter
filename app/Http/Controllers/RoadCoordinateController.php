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
        
        $coordinates = RoadCoordinate::orderBy("id", "desc")
                ->where("roadid", $request->roadid)
                ->paginate(50);
        
        return view("/road/roadcoordinates", [
           "coordinates"=>$coordinates,
            "roadid"=>$request->roadid
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
}
