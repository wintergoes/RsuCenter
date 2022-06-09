<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoadCoordinate;

class RoadCoordinateController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $coordinates = RoadCoordinate::orderBy("id", "desc")
                ->paginate(50);
        
        return view("/road/roadcoordinates", [
           "coordinates"=>$coordinates 
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
