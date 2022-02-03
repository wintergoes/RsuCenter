<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use DB;
use Auth;
use Cache;

require_once "../app/const.php";


class UserController extends Controller
{   
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        
        $users = User::orderBy('created_at', 'asc')
                ->select('users.id',  'users.username')
                ->where("users.username", "<>", "admin");
        
        
        $users = $users->get();
  

        return view('/basicdata/users', [
            'users' => $users
        ]);
    }
    
    
    public function addUser(Request $request){

        
        return view('/basicdata/adduser',[
        ]);
    }

    
    public function addUserSave(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users,username'
        ]);
        
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt('A625KZxh');
        $user->save();
        
        return view('/other/simplemessage', [
            'simplemessage'=>"新建用户成功，默认登录密码为A625KZxh，请用户登录后修改密码！",
            'backurl1'=>'/users',
            'backtext1'=>'点击返回用户列表'
        ]);
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
