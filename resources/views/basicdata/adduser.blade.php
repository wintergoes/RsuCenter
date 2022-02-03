@extends('layouts.home')

@section('content')

<script language="javascript" type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<script>
function submitData(){
    if($('#username').val() === ''){
        alert('登录用户名不能为空！');
        $('#username').focus();
        return;
    }

    $('#form1').submit();
}

</script>

<div class="tpl-content-page-title">
    用户管理
</div>
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-pencil-square-o"></span> 
            @if(isset($user))
            编辑用户
            @else
            添加用户
            @endif
        </div>


    </div>
    <div class="tpl-block ">
        <div class="am-g tpl-amazeui-form">
            <div class="am-u-sm-12 am-u-md-9">

                @if(isset($user))
                <form class="am-form am-form-horizontal" id="form1" method="post" action="/editusersave">
                @else
                <form class="am-form am-form-horizontal" id="form1" method="post" action="/addusersave">
                @endif
                    {{ csrf_field() }}      
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <!-- Display Validation Errors -->
                            @include('common.errors')
                        </div>
                    </div> 
                    
                    <div class="am-form-group">
                        <label for="username" class="am-u-sm-3 am-form-label">登录用户名</label>
                        <div class="am-u-sm-9">
                            @if(isset($user))
                            <input type="hidden" name="userid" value="{{$user->id}}" />
                            <input type="text" id="username" name="username" value="{{$user->username}}">
                            @else
                            <input type="text" id="username" name="username" placeholder="请输入用户名">
                            @endif
                        </div>
                    </div>
                    
                    
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="button" class="am-btn am-btn-primary" onclick="submitData();">保存修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection