<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserGroup;

class UserGroupController extends Controller
{
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
        
    }
    
    function editUserGroup(Request $request){
        return view("/basicdata/addusergroup");
    }    
    
    function editUserGroupSave(Request $request){
        
    }
    
    function deleteUserGroup(Request $request){
        
    }     
}
