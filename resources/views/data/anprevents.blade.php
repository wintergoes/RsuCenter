@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/hikvision.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<h5 class="card-title">车辆识别查询</h5>
<hr>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }}
            <table style="font-size: 12px; text-align: center;" >
                <tr>                   
                    <td class="search_td">日期 自&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="fromdate" id="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" id="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchtodate}}"/></td>
                    <td class="search_td"><select class="form-select" id="quickdateselector"/></td>
                    <td class="search_td">&nbsp;&nbsp;车牌号：&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="licenseplate" class="form-control" size="10" value="{{$searchlicenseplate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;车辆类型：&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="vehicletype" id="vehicletype" class="form-select" ></select>                        
                    </td>
                    <td class="search_td">雷视设备：&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="radarmac" id="radarmac" class="form-select" >
                            <option value="-1"  {{"-1" == $searchradar ? "selected" : ""}}>不限</option>
                            @foreach ($radars as $radar)
                            <option value="{{$radar->macaddrint}}" {{$radar->macaddrint == $searchradar ? "selected" : ""}}>{{$radar->devicecode}}</option>
                            @endforeach
                        </select>                        
                    </td>                   
                    <td class="search_td"><button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>                    
                </tr>              
            </table>
        </form>
</div>

<?php
$commonctrl = new \App\Http\Controllers\CommonController();
?>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($anprevents) > 0)
        <div class="col-sm-12">
        <table class="table mb-0 table-hover table-bordered text-center">
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >雷视</th>
                        <th >车牌号</th>
                        <th >车道号</th>
                        <th >置信度</th>
                        <th >车牌颜色</th>
                        <th >车辆类型</th>
                        <th >车辆类型1</th>
                        <th >速度</th>
                        <th >车辆品牌</th>
                        <th >车辆子品牌</th>
                        <th >抓拍图片</th>
                        <th >检测时间</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach($anprevents as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->devicecode}}</td>
                        <td>{{$event->licenseplate}}</td>
                        <td>{{$event->lineno}}</td>
                        <td>{{$event->confidencelevel}}</td>
                        <td>{{$commonctrl->hkVehcolor2Str($event->platecolor)}}</td>
                        <td>{{$commonctrl->hkVehType2Str($event->vehicleType)}}</script></td>
                        <td>{{$commonctrl->hkVehType12Str($event->vehtype1)}}</td>
                        <td>{{$event->vehspeed}}</td>
                        <td>{{$event->vehlogoname == "" ? "-" : $event->vehlogoname}}</td>
                        <td>{{$event->vehsublogoname == "" ? "-" : $event->vehsublogoname}}</td>
                        <td><a href="anprdetail?anprid={{$event->id}}" target="_blank">{{$event->vehpicnum}}</a></td>
                        <td>{{$event->eventtime}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>    
        </div>
        @else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">没有符合条件的记录！</div>
        </div>
        </div>
        @endif          
    </div>
</div>

@if (count($anprevents) > 0)
<div class="card mt-3" id="pagelinks_container">
    <div class="card-body">
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $anprevents->appends([ "fromdate"=>$searchfromdate,
                "todate"=>$searchtodate, "licenseplate"=>$searchlicenseplate, "vehicletype"=>$searchvehtype,
            "radarmac"=>$searchradar])->links() }}  
    </div> 
    </nav>
    </div>
</div>

<script>
var objs = document.getElementById("pagelinks").getElementsByTagName("a");
if(objs.length === 0){
    pldiv = document.getElementById("pagelinks_container");
    pldiv.style.visibility = 'hidden';
}
for(var i = 0; i < objs.length; i++){
    objs[i].className = objs[i].className + " page-link";
}

var liobjs = document.getElementById("pagelinks").getElementsByTagName("li");
for(var i = 0; i < liobjs.length; i++){
    liobjs[i].className = liobjs[i].className + " page-item";
}

var spanobjs = document.getElementById("pagelinks").getElementsByTagName("span");
for(var i = 0; i < spanobjs.length; i++){
    spanobjs[i].className = "page-link";
}
//alert(objs[0].innerText);
</script>
@endif

<script>
fillQuickDateSelector("quickdateselector", "fromdate", "todate");
fillVehTypeSelect("vehicletype", "{{$searchvehtype}}");
</script>
@endsection