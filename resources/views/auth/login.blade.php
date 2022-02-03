<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Rsu管理后台登录</title>
        <link href="css/login.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery.min.js"></script>
    </head>
    
    <body data-type="index">
        

<script>
function login(){
    if($('#username').val() === ""){
        alert("请输入用户名！");
        $('#username').focus();
        return;
    }
    
    if($('#password').val() === ""){
        alert("请输入密码！");
        $('#password').focus();
        return;
    }    
    
    $("#loginform").submit();
}

function KeyDown()
{
  if (event.keyCode === 13)
  {
    login();
  }
}
</script>


<form class="form-horizontal" id="loginform" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    
    
    
<div class="login">
    <div class="box png">
        <div class="logo png"></div>

        <div class="input">
            <div class="log">
                <div class="name">
                    <label>用户名</label>
                    <input id="username" type="username" class="text" name="username" value="{{ old('username') }}" onkeydown="KeyDown()" required autofocus>

                </div>
                <div class="pwd">
                    <label>密　码</label>
                    
                    <input id="password" type="password" class="text" name="password" required onkeydown="KeyDown()">

                    
                    <input type="button" class="submit" onclick="login();" tabindex="3" value="登录">
                    <div class="check"></div>
                </div>
                <div class="tip" style="color: red;">
                    @include('common.errors')   
                </div>
            </div>
        </div>
	</div>
    <div class="footer"></div>
</div>
</form>

    </body>

</html>