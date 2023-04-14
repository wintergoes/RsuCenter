<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ToolsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function dataPlayback(Request $request){
        return view("/tools/dataplayback");
    }
}
