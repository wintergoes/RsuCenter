<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    function eventSource2Str($src){
        switch ($src){
            case 1:
                return "交警";
            case 2:
                return "政府";
            case 3:
                return "气象部门";
            case 4:
                return "互联网";
            case 5:
                return "本地检测";
            default:
                return "未知";
        }
    }
}
