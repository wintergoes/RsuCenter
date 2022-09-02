@extends('layouts.home')

@section('content')

<script language="javascript" type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<script>
function submitData(){
    if($('#roadname').val() === ''){
        alert('路段名称不能为空！');
        $('#roadname').focus();
        return;
    }

    $('#form1').submit();
}

</script>

@if(isset($road))
<h5 class="card-title">路段管理 > 编辑路段</h5>
@else
<h5 class="card-title">路段管理 > 新增路段</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($road))
    <form class="form-horizontal" id="form1" method="post" action="/editroadsave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addroadsave">
    @endif
        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="roadname" class="col-sm-2 col-form-label">路段名称</label>
            <div class="col-sm-6">
                @if(isset($road))
                <input type="hidden" name="roadid" value="{{$road->id}}" />
                <input type="text" class="form-control" id="roadname" name="roadname" value="{{$road->roadname}}">
                @else
                <input type="text" class="form-control" id="roadname" name="roadname" placeholder="请输入路段名称">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="remark" class="col-sm-2 col-form-label">备注</label>
            <div class="col-sm-6">
                @if(isset($road))
                <input type="text" class="form-control" id="remark" name="remark" value="{{$road->remark}}">
                @else
                <input type="text" class="form-control" id="remark" name="remark" placeholder="请输入备注">
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

    <div>
</div>

@endsection