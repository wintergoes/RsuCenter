@extends('layouts.home')

@section('content')

<script language="javascript" type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<script>
function submitData(){
    if($('#resourcename').val() === ''){
        alert('升级包名称不能为空！');
        $('#resourcename').focus();
        return;
    }

    if($('#hardwareversion').val() === '' || $('#softwareversion').val() === '' || $('#updatefolder').val() === ''){
        alert('信息输入不完整，请检查！');
        return;
    }

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    }); 

    $.ajax({
        type: "POST",
        url: "addhwupdateressave?resourcename=" + $('#resourcename').val() + "&hardwareversion=" + $('#hardwareversion').val()
            + "&softwareversion=" + $('#softwareversion').val() + "&updatefolder=" + $('#updatefolder').val() 
            + "&devicetype=" + $('#devicetype').val() + "&avaliable=" + $('#avaliable').prop("checked"),
        dataType: "json",
        success: function (data) {
            if(data.retcode === 1){
                alert("添加成功！");
                //window.location.href = "hwupdateres";
            } else {
                alert(data.retmsg);
            } 
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("添加失败！" + errorThrown);
        }
    });
}

</script>

@if(isset($updateres))
<h5 class="card-title">升级包管理 > 编辑升级包</h5>
@else
<h5 class="card-title">升级包管理 > 新增升级包</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($updateres))
    <form class="form-horizontal" id="form1" method="post" action="/editusersave">
        <input type="hidden" name="userid" value="{{$updateres->id}}" />
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addusersave">
    @endif
        {{ csrf_field() }}
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>
        
        <div class="row mb-3">
            <label for="devicetype" class="col-sm-2 col-form-label">设备类型</label>
            <div class="col-sm-6">
                <select name="devicetype" id="devicetype" class="form-select"  style="width: 100px">
                @if(isset($updateres))
                    <option class="form-control" value="1" {{$updateres->devicetype == 1 ? "selected" : ""}}>OBU</option>
                    <option class="form-control" value="2" {{$updateres->devicetype == 2 ? "selected" : ""}}>RSU</option>
                @else
                    <option class="form-control" value="1">OBU</option>
                    <option class="form-control" value="2">RSU</option>
                @endif
                </select>
            </div>
        </div>           

        <div class="row mb-3">
            <label for="resourcename" class="col-sm-2 col-form-label">升级包名称</label>
            <div class="col-sm-6">
                @if(isset($updateres))
                <input type="text" class="form-control" id="resourcename" name="resourcename" readonly value="{{$updateres->resource_name}}">
                @else
                <input type="text" class="form-control" id="resourcename" name="resourcename" placeholder="">
                @endif
            </div>
        </div>        
        
        <div class="row mb-3">
            <label for="hardwareversion" class="col-sm-2 col-form-label">硬件版本适配</label>
            <div class="col-sm-6">
                @if(isset($updateres))               
                <input type="text" class="form-control" id="hardwareversion" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'')" name="hardwareversion" readonly value="{{$updateres->resource_hardversion}}">
                @else
                <input type="text" class="form-control" id="hardwareversion" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'')" name="hardwareversion" placeholder="">
                @endif
            </div>
        </div>
   
        <div class="row mb-3">
            <label for="softwareversion" class="col-sm-2 col-form-label">软件版本适配</label>
            <div class="col-sm-6">
                @if(isset($updateres))
                <input type="text" class="form-control" id="softwareversion" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'')" name="softwareversion" readonly value="{{$updateres->resource_softversion}}">
                @else
                <input type="text" class="form-control" id="softwareversion" onkeyup="this.value=this.value.replace(/[^0-9\.]/g,'')" name="softwareversion" placeholder="">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="updatefolder" class="col-sm-2 col-form-label">升级文件目录</label>
            <div class="col-sm-6">
                @if(isset($updateres))
                <input type="text" class="form-control" id="updatefolder" name="updatefolder" readonly value="{{$updateres->resource_content}}">
                @else
                <input type="text" class="form-control" id="updatefolder" name="updatefolder" placeholder="" value="{{$hwupdate_root}}">
                @endif
            </div>
        </div>
        
     

        <div class="row mb-3">
            <label for="avaliable" class="col-sm-2 col-form-label">是否可用</label>
            <div class="col-sm-6 form-check form-switch" >
                @if(isset($updateres))
                <input type="checkbox" class="form-check-input" id="avaliable" name="avaliable" {{$updateres->Is_use == 1 ? "checked='true'" : ""}}>
                @else
                <input type="checkbox" class="form-check-input" id="avaliable" checked="true" name="avaliable" placeholder="">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">保存修改</button>
            </div>
        </div>
    </form>

    <div>
</div>

@endsection