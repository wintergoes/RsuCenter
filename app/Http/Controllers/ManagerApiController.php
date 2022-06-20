<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UploadFile;
use App\RoadCoordinate;
use App\Road;

require_once '../app/Constant.php';

class ManagerApiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    function getObuNewVideo(Request $request){
        if($request->obuid == ""){
            return "缺少参数！";
        }
        
        $updfiles = UploadFile::where("obuid", $request->obuid)
                ->where("filetype", upd_file_obu_video)
                ->where("medialen", ">", 3000) //只要大于3秒的视频
                ->orderBy("id", "desc")
                ->limit(1)
                ->get();
        
        if(count($updfiles) == 0){
            return "";
        }
        
        return redirect(upload_folder_short . "obuvideos/" . $request->obuid . "/" . $updfiles[0]->filename);
    }
    
    // 根据传入的坐标判断是否在某条路上
    function getRoadsByCoord(Request $request){
        if($request->lat == "" || $request->lng == ""){
            $arr = array("retcode"=>ret_error, "retmsg"=>"缺少参数！");
            return json_encode($arr);
        }
        
        $roadcoords = RoadCoordinate::where("roadcoordinates.minlat", "<", $request->lat)
                ->where("roadcoordinates.maxlat", ">", $request->lat)
                ->where("roadcoordinates.minlng", "<", $request->lng)
                ->where("roadcoordinates.maxlng", ">", $request->lng)               
                ->select("r.roadname", "roadcoordinates.lanetype", "roadcoordinates.laneno")
                ->leftjoin("roads as r", "roadcoordinates.roadid", "=", "r.id")
                ->distinct()
                ->get();
        
        $arr = array("retcode"=>ret_success, "roads"=>$roadcoords, "extrainfo"=>$request->extrainfo);
        return json_encode($arr);
    }
}
