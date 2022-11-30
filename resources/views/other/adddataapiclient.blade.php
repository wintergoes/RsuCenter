@extends('layouts.home')

@section('content')

@if(isset($pclient))
<h5>Api客户端信息修改</h5>
@else
<h5>新增Api客户</h5>
@endif
<hr>

<script language="javascript">
function submitData(){    
    if($('#clientname').val() === ""){
        alert('Api客户名称不能为空!');
        return;
    }
    
    if($('#clientkey').val() === ""){
        alert('Api客户Key不能为空!');
        return;
    }    

    $('#form1').submit();
}


</script>

    <!-- Display Validation Errors -->
    @include('common.errors')
    

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($apiclient))
    <form class="form-horizontal" id="form1" method="post" action="/editdataapiclientsave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/adddataapiclientsave">
    @endif
        {{ csrf_field() }}
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="clientname" class="col-sm-2 col-form-label">Api客户名称</label>
            <div class="col-sm-6">
                @if(isset($apiclient))
                <input type="hidden" name="clientid" value="{{$apiclient->id}}" />
                <input type="text" class="form-control" id="clientname" name="clientname" value="{{$apiclient->clientname}}">
                @else
                <input type="text" class="form-control" id="clientname" name="clientname" placeholder="">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="clientkey" class="col-sm-2 col-form-label">Api客户Key</label>
            <div class="col-sm-6">
                @if(isset($apiclient))
                <input type="text" class="form-control" id="clientkey" name="clientkey" readonly="readonly" value="{{$apiclient->clientkey}}">
                @else
                <input type="text" class="form-control" id="clientkey" name="clientkey" readonly="readonly" value="{{$newkey}}" placeholder="">
                @endif
            </div>
        </div>          

        <div class="row mb-3">
            <label for="clientremark" class="col-sm-2 col-form-label">Api客户备注</label>
            <div class="col-sm-6">
                @if(isset($apiclient))
                <input type="text" class="form-control" id="clientremark" name="clientremark" value="{{$apiclient->clientremark}}">
                @else
                <input type="text" class="form-control" id="clientremark" name="clientremark" placeholder="">
                @endif
            </div>
        </div>      
        
        <div class="row mb-3">
            <label for="clientisvalid" class="col-sm-2 col-form-label">状态</label>
            <div class="col-sm-2">
                <select name="clientisvalid" class="form-select">
                    <option class="form-control" value="1" {{isset($apiclient) && $apiclient->clientisvalid == 1 ? "selected" : ""}}>有效</option>
                    <option class="form-control" value="0" {{isset($apiclient) && $apiclient->clientisvalid == 0 ? "selected" : ""}}>无效</option>
                </select>
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