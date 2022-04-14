<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ObuDevice;

class ObuDeviceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $obudevices = ObuDevice::orderBy("id")
                ->get();
        
        return view("/basicdata/obudevices", [
           "obudevices"=>$obudevices 
        ]);
    }
}
