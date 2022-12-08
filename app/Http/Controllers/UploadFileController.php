<?php

namespace App\Http\Controllers;

use App\ObuDevice;
use App\UploadFile;

use DB;
use Auth;

require_once '../app/Constant.php';

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
 
    function obuVideos(Request $request){
        $searchfromdate = "";
        if($request->has("fromdate")){
            $searchfromdate = $request->fromdate;
        }

        if($searchfromdate == ""){
            $searchfromdate = date('Y-m-d',time()) . " 00:00:00";
        }

        $searchtodate = "";
        if($request->has("todate")){
            $searchtodate = $request->todate ;
        }
        
        $searchobu = "";
        if($request->has("obudevice")){
            $searchobu = $request->obudevice;
        }
        
        $obuvideos = UploadFile::orderBy("uploadfiles.id", "desc")
                ->where("uploadfiles.filetype", upd_file_obu_video)
                ->select("o.id as obuid", "o.obuid as obucode", "uploadfiles.filename")
                ->leftjoin("obudevices as o", "o.id", "=", "uploadfiles.obuid");
        
        if($searchobu != ""){
            $obuvideos = $obuvideos->where("uploadfiles.obuid", $searchobu);
        }
        
        if($searchfromdate != ""){
            $obuvideos = $obuvideos->where("uploadfiles.created_at", ">", $searchfromdate);
        }
        
        if($searchtodate != ""){
            $obuvideos = $obuvideos->where("uploadfiles.created_at", "<", $searchtodate);
        }
        
        $obuvideos = $obuvideos->paginate(16);
        
        $obus = ObuDevice::orderBy("id", "desc")
                ->select("id", "obuid")
                ->get();
        
        return view("/other/obuvideos", [
            "obuvideos"=>$obuvideos,
            "obus"=>$obus,
            "searchfromdate"=>$searchfromdate,
            "searchtodate"=>$searchtodate,
            "searchobu"=>$searchobu
        ]);
    }
}
