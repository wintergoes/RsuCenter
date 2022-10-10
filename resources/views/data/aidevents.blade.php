@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>  
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/hikvision.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<h5 class="card-title">雷视事件检测查询</h5>
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
                    <td class="search_td">&nbsp;&nbsp;事件：&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="aidevent" id="aidevent" class="form-select" ></select>                        
                    </td>                    
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
        @if (count($aidevents) > 0)
        <div class="col-sm-auto">
        <table class="table mb-0 table-hover table-bordered text-center" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >雷视</th>
                        <th >车牌号</th>
                        <th >车道号</th>
                        <th >事件名称</th>
                        <th >车牌颜色</th>
                        <th >车辆类型</th>
                        <th >车身颜色</th>
                        <th >速度</th>
                        <th >坐标</th>
                        <th >图片抓拍</th>
                        <th >检测时间</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach($aidevents as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->devicecode}}</td>
                        <td>{{$event->plate}}</td>
                        <td>{{$event->laneno}}</td>
                        <td>{{$commonctrl->hkEvent2Str($event->aidevent)}}</td>
                        <td>{{$commonctrl->hkVehcolor2Str($event->platecolor)}}</td>
                        <td>{{$commonctrl->hkVehType2Str($event->vehtype)}}</td>
                        <td>{{$commonctrl->hkVehcolor2Str($event->vehcolor)}}</td>
                        <td>{{$event->vehspeed}}</td>
                        @if($event->longitude == 0 || $event->latitude == 0)
                        <td>未设置</td>
                        @else
                        <td><button type="button" class="btn btn-transparent" style="padding: 0px; margin: 0px;" data-bs-toggle="modal" onclick="showAidPosition('{{$event->plate}} {{$commonctrl->hkEvent2Str($event->aidevent)}}', {{$event->longitude}}, {{$event->latitude}})" data-bs-target="#exampleWarningModal">查看</button></td>
                        @endif
                        <td><a href="aiddetail?aidid={{$event->id}}">{{$event->detectionpicnumber}}</a></td>
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
        
            <div class="modal fade" id="exampleWarningModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" >
                            <div class="modal-content bg-light" >
                                <div class="card radius-6 border-1 border-grey111111">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 card-title" id="map_title">
                                                    <i class="bx bx-map">
                                                    </i>
                                                    
                                                </h6>
                                            </div> 
                                        </div>
                                        <div class="col-sm-12" id="bdmap_container" style="height: 600px;"></div>    
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>        
    </div>
</div>

@if (count($aidevents) > 0)
<div class="card mt-3" id="pagelinks_container">
    <div class="card-body">
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $aidevents->appends([ "fromdate"=>$searchfromdate,
                "todate"=>$searchtodate, "licenseplate"=>$searchlicenseplate, "vehicletype"=>$searchvehtype,
            "aidevent"=>$searchaidevent])->links() }}  
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
var obuIcon = new BMapGL.Icon("/images/aidalert.png", new BMapGL.Size(15, 31));  

function showAidPosition(dcode, lng, lat){
    if(lng === 0 || lat === 0){
        alert("未设置坐标！");
        return ;
    }
    
    var latlng = coordtransform.wgs84togcj02(lng, lat);
    latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
    var pt = new BMapGL.Point(latlng[0], latlng[1]);    
    
    var map = new BMapGL.Map("bdmap_container", {
       coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                     // 指定完成后API将以指定的坐标类型处理您传入的坐标
    });          // 创建地图实例  
    var point = new BMapGL.Point(pt.lat, pt.lng);  // 创建点坐标  
    map.centerAndZoom(point, 15); 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
      
    map.addEventListener("tilesloaded",function(){
        $("#map_title").text(dcode + " 位置信息");
        map.clearOverlays();
       
        var marker = new BMapGL.Marker(pt, {
            icon: obuIcon,
            offset: new BMapGL.Size(0, 0)
        });
        map.addOverlay(marker);

        var label = new BMapGL.Label(dcode, {       // 创建文本标注
            position: pt,                          // 设置标注的地理位置
            offset: new BMapGL.Size(-30, -40)           // 设置标注的偏移量
        })    

        marker.setLabel(label); 
        map.setCenter(pt);        
    });

}
</script>

<script>
fillQuickDateSelector("quickdateselector", "fromdate", "todate");
fillVehTypeSelect("vehicletype", "{{$searchvehtype}}");
fillAidEventSelect("aidevent", "{{$searchaidevent}}");
</script>
@endsection