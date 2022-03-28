@extends('layouts.home')

@section('content')

<script language="javascript" type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<script>
function submitData(){
    if($('#groupname').val() === ''){
        alert('登录用户名不能为空！');
        $('#groupname').focus();
        return;
    }

    $('#form1').submit();
}

</script>

@if(isset($user))
<h5 class="card-title">用户组管理 > 编辑用户组</h5>
@else
<h5 class="card-title">用户组管理 > 新增用户组</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($usergroup))
    <form class="form-horizontal" id="form1" method="post" action="/editusergroupsave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addusergroupsave">
    @endif
        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="groupname" class="col-sm-2 col-form-label">用户组名称</label>
            <div class="col-sm-6">
                @if(isset($usergroup))
                <input type="hidden" name="groupid" value="{{$usergroup->id}}" />
                <input type="text" class="form-control" id="groupname" name="groupname" value="{{$usergroup->groupname}}">
                @else
                <input type="text" class="form-control" id="groupname" name="groupname" placeholder="请输入用户名">
                @endif
            </div>
        </div>


        <div class="row mb-3">
            <label  class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-5" onclick="submitData();">保存修改</button>
            </div>
        </div>
    </form>

    </<div>
</div>

@endsection