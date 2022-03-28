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

<h5 class="card-title">资料管理 > 修改密码</h5>
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">
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
            <div class="row mb-3">
                <label for="oldpass" class="col-sm-2 col-form-label">旧密码</label>

                <div class="col-sm-6">
                    <input type="password" name="oldpass" id="oldpass" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="newpass" class="col-sm-2 col-form-label">新密码</label>
                <div class="col-sm-6">
                    <input type="password" name="newpass" id="newpass" class="form-control">
                </div>
            </div>


            <div class="row mb-3">
                <label for="confirmpass" class="col-sm-2 col-form-label">确认密码</label>
                <div class="col-sm-6">
                    <input type="password" name="confirmpass" id="confirmpass" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6" style="text-align: right;">
                    <button type="button" class="btn btn-outline-primary px-2" onclick="submitdata();">
                        <i class="bx bx-save"></i> 保存</button>

                    <button type="button" class="btn btn-outline-primary px-2" onclick="history.back(-1);">
                        <i class="bx bx-x"></i> 取消</button>
                </div>
            </div>
        </form>

        </div>
    </div>

@endsection