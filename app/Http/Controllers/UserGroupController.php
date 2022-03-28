<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserGroup;

use DB;

class UserGroupController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    function index(Request $request){
        $usergroups = UserGroup::orderBy("id", "desc")
                ->get();
        
        return view("/basicdata/usergroups", [
           "usergroups"=>$usergroups, 
        ]);
    }
    
    function addUserGroup(Request $request){
        return view("/basicdata/addusergroup");
    }
    
    function addUserGroupSave(Request $request){
        $groupname = $request->groupname;
        if($groupname == ""){
            return "缺少参数！";
        }
        
        $groups = UserGroup::where("groupname", $groupname)
                ->select("id")
                ->get();
        
        if(count($groups) > 0){
            return "用户组名称已存在！";
        }
        
        $newgroup = new UserGroup();
        $newgroup->groupname = $groupname;
        $newgroup->save();
        
        return redirect("/usergroups");
    }
    
    function editUserGroup(Request $request){
        $groupid = $request->groupid;
        if($groupid == ""){
            return "缺少参数！";
        }
        
        $usergroups = UserGroup::where("id", $groupid)
                ->get();
        
        if(count($usergroups) == 0){
            return "用户组不存在！";
        }
        
        return view("/basicdata/addusergroup", [
            "usergroup"=>$usergroups[0]
        ]);
    }
    
    function editUserGroupSave(Request $request){
        $groupname = $request->groupname;
        $groupid = $request->groupid;
        if($groupname == "" || $groupid == ""){
            return "缺少参数！";
        }
        
        $checkgroups = UserGroup::where("groupname", $groupname)
                ->where("id", "<>", $groupid)
                ->select("id")
                ->get();
        
        if(count($checkgroups) > 0){
            return "用户组名称已存在！";
        }
        
        $groups = UserGroup::where("id", "=", $groupid)
                ->get();
        
        if(count($groups) == 0){
            return "用户组不存在！";
        }
        
        $groups[0]->groupname = $groupname;
        $groups[0]->save();
        
        return redirect("/usergroups");        
    }
    
    function deleteUserGroup(Request $request){
        $groupid = $request->groupid;
        if($groupid == ""){
            return "缺少参数！";
        }        
        
        DB::delete("delete from usergroups where id=" . $groupid);
        return redirect("usergroups");
    }     
}
