<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ToolsController extends Controller
{
    function dataPlayback(Request $request){
        return view("/tools/dataplayback");
    }
}
