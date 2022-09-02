@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
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
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
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
        <div class="col-sm-auto">
        <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >UUID</th>                        
                        <th >车牌号</th>
                        <th >车道号</th>
                        <th >置信度</th>
                        <th >PlateType</th>
                        <th >PlateColor</th>
                        <th >VehType</th>
                        <th >VehType1</th>
                        <th >速度</th>
                        <th >车辆品牌</th>
                        <th >车辆子品牌</th>
                        <th >检测时间</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach($anprevents as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->vehuuid}}</td>
                        <td>{{$event->licenseplate}}</td>
                        <td>{{$event->lineno}}</td>
                        <td>{{$event->confidencelevel}}</td>
                        <td>{{$event->platetype}}</td>
                        <td>{{$event->platecolor}}</td>
                        <td>{{$commonctrl->hkVehType2Str($event->vehicleType)}}</td>
                        <td>{{$event->vehtype1}}</td>
                        <td>{{$event->vehspeed}}</td>
                        <td>{{$event->vehlogoname}}</td>
                        <td>{{$event->vehsublogoname}}</td>
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
<div class="card" id="pagelinks_container">
    <div class="card-body">
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $anprevents->appends([ "fromdate"=>$searchfromdate,
                "todate"=>$searchtodate])->links() }}  
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
</script>
@endsection