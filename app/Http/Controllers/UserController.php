<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\UserGroup;

use DB;
use Auth;
use Cache;

require_once "../app/const.php";


class UserController extends Controller
{   
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        
        $users = User::orderBy('users.created_at', 'asc')
                ->select('users.id',  'users.username', 'users.realname', 'users.mobile', 'users.created_at',
                        'ug.groupname')
                ->where("users.username", "<>", "admin")
                ->leftjoin("usergroups as ug", "users.usergroup", "=", "ug.id");
        
        $users = $users->get();
  
        return view('/basicdata/users', [
            'users' => $users
        ]);
    }
    
    
    public function addUser(Request $request){
        $usergroups  = UserGroup::orderBy("id", "desc")
                ->select("id", "groupname")
                ->get();
        
        return view('/basicdata/adduser',[
            "usergroups"=>$usergroups
        ]);
    }

    
    public function addUserSave(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users,username'
        ]);
        
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt('A625KZxh');
        $user->usergroup = $request->usergroup;
        $user->realname = $request->realname;
        $user->mobile = $request->mobile;
        $user->save();
        
        return view('/other/simplemessage', [
            'simplemessage'=>"新建用户成功，默认登录密码为A625KZxh，请用户登录后修改密码！",
            'backurl1'=>'/users',
            'backtext1'=>'点击返回用户列表'
        ]);
    }
    
   public function editUser(Request $request){
       $userid = $request->userid;
       
       if($userid == ""){
           return "缺少参数！";
       }
       
       $users = User::where("id", $userid)
               ->get();
       
       if(count($users) == 0){
           return "用户不存在！";
       }
       
        $usergroups  = UserGroup::orderBy("id", "desc")
                ->select("id", "groupname")
                ->get();
        
        return view('/basicdata/adduser',[
            "usergroups"=>$usergroups,
            "user"=>$users[0]
        ]);
    }

    
    public function editUserSave(Request $request){
       $userid = $request->userid;
       
       if($userid == ""){
           return "缺少参数！";
       }
       
       $users = User::where("id", $userid)
               ->get();
       
       if(count($users) == 0){
           return "用户不存在！";
       }
        
        $user = $users[0];
        $user->usergroup = $request->usergroup;
        $user->realname = $request->realname;
        $user->mobile = $request->mobile;
        $user->save();
        
        return redirect("/users");
    }    
    
    public function deleteUser(Request $request){
        User::where('id', $request->userid)->delete();
        
        return redirect('/users');
    }
    
    public function resetPassword(Request $request){
        $message = "";
        if($request->has("message")){
            $message = $request->message;
        }
        
        return view('/basicdata/resetpass', [
            "message" => $message
        ]);
    }

    public function resetPassSave(Request $request){
        if(Auth::once(['username' => $request->user()->username, 'password' => $request->oldpass])){
            $request->user()->password = bcrypt($request->newpass);
            $request->user()->save();
            return "密码修改成功! <a href='/'>点击返回首页</a>";
        }else{
            return "旧密码错误!";
        }
    }
    
}
