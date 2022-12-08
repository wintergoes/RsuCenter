<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoadPositionController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }    
 
}
