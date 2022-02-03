@extends('layouts.home')

@section('content')


<script language="javascript">
function submitdata(){
    if($('#oldpass').val() === ''){
        alert('旧密码不能为空!');
        return;
    }
    
    if($('#newpass').val().length < 6 || $('#newpass').val().length > 16){
        alert('新密码的长度在6-16以内!');
        return;
    }
    
    if($('#newpass').val() !== $('#confirmpass').val()){
        alert('新密码和确认密码不匹配!');
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
            <span class="am-icon-list"></span>　修改密码
        </div>

    </div>
    
    <div class="tpl-block">

        <div class="am-g">
            <div class="am-u-sm-9">
        @include('common.errors')

    <!-- Display Validation Errors -->

    <form action="{{ url('/resetpasssave') }}" id="form1" method="POST" class="am-form am-form-horizontal">
        {{ csrf_field() }}               

        
        @if (isset($message) && $message != "")
        <div class="form-group">
            <label class="col-sm-offset-3 col-sm-6 control-label-required" 
                   style="text-align: left; height: 80px; vertical-align: middle; font-size: 20px;">{{$message}}</label>
        </div>        
        @endif

        <!-- Task Name -->
        <div class="am-form-group">
            <label for="oldpass" class="am-u-sm-3 am-form-label">旧密码</label>

            <div class="am-u-sm-9">
                <input type="password" name="oldpass" id="oldpass" class="form-control">
            </div>
        </div>
        
        <div class="am-form-group">
            <label for="newpass" class="am-u-sm-3 am-form-label">新密码</label>
            <div class="am-u-sm-9">
                <input type="password" name="newpass" id="newpass" class="form-control">
            </div>
        </div>
        
        
        <div class="am-form-group">
            <label for="confirmpass" class="am-u-sm-3 am-form-label">确认密码</label>
            <div class="am-u-sm-9">
                <input type="password" name="confirmpass" id="confirmpass" class="form-control">
            </div>
        </div>
        
        <!-- Add Task Button -->
        <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3" style="text-align: right;">
                <button type="button" class="btn btn-default" onclick="submitdata();">
                    <i class="fa fa-save"></i> 保存</button>
                    
                <button type="button" class="btn btn-default" onclick="history.back(-1);">
                    <i class="fa fa-reply"></i> 取消</button>
            </div>
        </div>
    </form>

            </div>
        </div>
    </div>

@endsection