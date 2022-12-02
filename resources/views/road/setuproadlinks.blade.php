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

<h5 class="card-title">路段管理 > RoadLink设置</h5>

<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    <form class="form-horizontal" id="form1" method="post" action="/setuproadlinksave">

        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">单点设置（设置上一个点和下一个点的id值）</label>      
        </div>        
        
        <div class="row mb-3">
            <label for="pointlast" class="col-sm-2 col-form-label">上一点</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="pointlast" name="pointlast" placeholder="">
            </div>
            
            <label for="pointnext" class="col-sm-2 col-form-label">下一点</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="pointnext" name="pointnext" placeholder="">
            </div>          
        </div>
        
        <div class="row mb-3">
            <label class="col-sm-8 col-form-label"><hr></label>      
        </div> 
        
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">连续点设置（每个id的下一个id为它的加1）</label>      
        </div>        
        <div class="row mb-3">
            <label for="multistart" class="col-sm-2 col-form-label">开始点</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="multistart" name="multistart" placeholder="">
            </div>
            
            <label for="multiend" class="col-sm-2 col-form-label">结束点</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="multiend" name="multiend" placeholder="">
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