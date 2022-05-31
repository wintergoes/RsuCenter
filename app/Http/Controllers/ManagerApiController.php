<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UploadFile;

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
                ->where("medialen", ">", 3000) //只要大于5秒的视频
                ->orderBy("id", "desc")
                ->limit(1)
                ->get();
        
        if(count($updfiles) == 0){
            return "";
        }
        
        return redirect(upload_folder_short . "obuvideos/" . $request->obuid . "/" . $updfiles[0]->filename);
    }
}
