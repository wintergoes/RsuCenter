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

@if(isset($user))
<h5 class="card-title">用户管理 > 编辑用户</h5>
@else
<h5 class="card-title">用户管理 > 新增用户</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($user))
    <form class="form-horizontal" id="form1" method="post" action="/editusersave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addusersave">
    @endif
        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="username" class="col-sm-2 col-form-label">登录用户名</label>
            <div class="col-sm-6">
                @if(isset($user))
                <input type="hidden" name="userid" value="{{$user->id}}" />
                <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
                @else
                <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
                @endif
            </div>
        </div>


        <div class="row mb-3">
            <label for="username" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-5" onclick="submitData();">保存修改</button>
            </div>
        </div>
    </form>

    </<div>
</div>

@endsection