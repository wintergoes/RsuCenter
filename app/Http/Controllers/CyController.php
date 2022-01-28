<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cy;
use App\Cyupdate;
use DB;

class CyController extends Controller
{
    function index(){
        $cys = Cy::orderBy('id', 'desc')
                ->paginate(10);
        
        return view('/cy/cylist', [
            'cys' => $cys
        ]);
    }
    
    function addcy(){
        $fromurl = "/cylist";
        
        return view('/cy/addcy', [
            'fromurl' => $fromurl
        ]);
    }
    
    function addcySave(Request $request){
        $cys = Cy::where('name', $request->cyname)
                ->get();
        
        if(count($cys) > 0){
            return "该成语已存在!";
        }else{
            $cy = new Cy();
            $cy->name = $request->cyname;
            $cy->content = $request->cycontent;
            $cy->derivation = $request->cyderivation;
            $cy->spell = $request->cyspell;
            $cy->spellshort = $request->cyspellshort;
            $cy->updated = 1;
            $cy->save();
            return redirect('/cylist');
        }     
    }
    
    function editcy(Request $request){
        $fromurl = "/cylist";
        if($request->has("fromurl")){
            $fromurl = $request->fromurl;
        }        
        
        $cys = Cy::where('id', $request->id)
                ->get();
        
        if(count($cys) > 0){
            $cy = $cys[0];
            
            return view('/cy/addcy', [
                'cy' => $cy,
                'fromurl' => $fromurl
            ]);
        }else{
            return redirect('/cylist');
        }
    }
    
    function editcySave(Request $request){
        $fromurl = "/cylist";
        if($request->has("fromurl")){
            $fromurl = $request->fromurl;
        }
        
        $cys = Cy::where('id', $request->cyid)
                ->get();
        
        if(count($cys) > 0){
            $cy = $cys[0];
            $cy->name = $request->cyname;
            $cy->content = $request->cycontent;
            $cy->derivation = $request->cyderivation;
            $cy->spell = $request->cyspell;
            $cy->spellshort = $request->cyspellshort;
            $cy->updated = 1;
            if($request->cydeleted == "on"){
                $cy->deleted = 1;
            }else{
                $cy->deleted = 0;
            }
            $cy->save();
        }

        return redirect($fromurl);        
    }
    
    function deleteCy(Request $request){
        $fromurl = "/cylist";
        if($request->has("fromurl")){
            $fromurl = $request->fromurl;
        }        
        
        DB::delete("delete from cy where id=" . $request->id);
        
        return redirect($fromurl);
    }
    
    function createCyUpdate(){
        $cys = Cy::where('updated', 1)
                ->get();
        
        return view('/cy/createcyupdate', [
           'cys' => $cys 
        ]);
    }
    
    function createCyUpdateSave(Request $request){
        $updatedir = "update/cy/";
        if(!is_dir($updatedir)){
            echo "文件夹qrcode不存在, 正在创建...<br/>";            
            if(mkdir($updatedir, 0777, true)){
                echo " 创建成功...<br/>";            
            }else{
                echo  " 创建失败...<br/>";            
            }
        }
        
        $cys = Cy::where('updated', 1)
                ->get();
        
        $cyupdate = new Cyupdate();
        $cyupdate->versionno = $request->versionno;
        $cyupdate->updatecount = count($cys);
        $cyupdate->save();

        $arr = array("retcode" => 1, "versionno" => $request->versionno, "count" => count($cys),
            "cydata" => json_encode($cys));      
        
        $filename = "cy" . $request->versionno . ".json";
        $jsonstr = json_encode($arr);
        file_put_contents($updatedir . $filename, $jsonstr);
        
        DB::update('update cy set updated=0');
        
        return "生成成功, 共" . count($cys) . "条数据!";
    }
}
