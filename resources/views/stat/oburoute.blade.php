@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>
<script src="http://code.bdstatic.com/npm/mapvgl@1.0.0-beta.141/dist/mapvgl.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<script type="text/javascript" src="//api.map.baidu.com/library/TrackAnimation/src/TrackAnimation_min.js"></script>


	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<h5 class="card-title">车辆运行轨迹</h5>
<hr>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }}
            <table style="font-size: 12px; text-align: center; margin-bottom: 10px;" >
                <tr>
                    <td class="search_td">&nbsp;&nbsp;设备编号&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="obudevice" id="obudevice" onchange="showValidDates()" class="form-select"  style="width: 300px">
                            <option class="form-control" value="-1" >不限</option>
                            @foreach($obus as $obu)
                            <option class="form-control" value="{{$obu->id}}" {{$searchobu == $obu->id ? "selected" : ""}}>{{$obu->plateno == "" ? "未关联车牌" : $obu->plateno}} - {{$obu->obuid}}</option>
                            @endforeach
                        </select>
                    </td>  
                </tr>
            </table>
            
            <table style="font-size: 12px; text-align: center;" >
                <tr>
                    <td class="search_td">&nbsp;&nbsp;查询日期&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <input name="fromdate_hd" type="hidden" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="8" value="{{$searchfromdate}}"/>
                        <select name="fromdate" id="fromdate" class="form-select" style="width: 160px">
                            @foreach($validdates as $validdate)
                            <option class="form-control" value="{{$validdate->vdate}}" {{$searchfromdate == $validdate->vdate ? "selected" : ""}}>{{$validdate->vdate}}</option>
                            @endforeach
                        </select>                        
                    </td>
<!--                    
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;坐标类型&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="locationtype" id="locationtype" class="form-select" style="width: 100px">
                            
                            <option class="form-control" value="-1" {{$searchlocationtype == -1 ? "selected" : ""}}>不限</option>
                            <option class="form-control" value="0" {{$searchlocationtype == 0 ? "selected" : ""}}>GPS</option>
                            <option class="form-control" value="1" {{$searchlocationtype == 1 ? "selected" : ""}}>RTK</option>
                        </select>                        
                    </td>-->
                    
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;时间&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <input name="fromtime" class="form-control" onClick="WdatePicker({el:this,dateFmt:'HH:mm'})" autocomplete="off" size="8" value="{{$searchfromtime}}"/>
                    </td>   
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <input name="totime" class="form-control" onClick="WdatePicker({el:this,dateFmt:'HH:mm'})" autocomplete="off" size="8" value="{{$searchtotime}}"/>
                    </td>                  
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                </tr>
            </table>
        </form>
</div>

<div class="row">
    
    <div class="col-12 col-lg-12 ">
        <div class="card radius-6 border-1">
            <div class="card-body">
                <table style="width: 100%;"> 
                    <tr>
                        <td>
                            <div id="bdmap_container" style="width: 100%; height: 660px"></div>       
                        </td>
                    </tr>
                </table>
                             
            </div>
        </div>
    </div>

</div>


<script>
var map = new BMapGL.Map("bdmap_container", {
   coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                 // 指定完成后API将以指定的坐标类型处理您传入的坐标
});          // 创建地图实例 
@if(count($routes) > 0)
var latlng = coordtransform.wgs84togcj02({{$routes[0]->lng}}, {{$routes[0]->lat}});
latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);
var endlatlng = coordtransform.wgs84togcj02({{$routes[count($routes)-1]->lng}}, {{$routes[count($routes)-1]->lat}});
endlatlng = coordtransform.gcj02tobd09(endlatlng[0], endlatlng[1]);
var centerlng = (latlng[0] + endlatlng[0]) / 2;
var centerlat = (latlng[1] + endlatlng[1]) / 2;
var point = new BMapGL.Point(centerlng, centerlat);  // 创建点坐标  
@else
showAlert();                     
var point = new BMapGL.Point({{$default_lng}}, {{$default_lat}});  // 创建点坐标      
@endif
map.centerAndZoom(point, 14);                 // 初始化地图，设置中心点坐标和地图级别 
map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放


var routeStartIcon = new BMapGL.Icon("/images/route_start.png", new BMapGL.Size(32, 32));
var routeEndIcon = new BMapGL.Icon("/images/route_end.png", new BMapGL.Size(32, 32));
var obuIcon = new BMapGL.Icon("/images/circle_white_border.png", new BMapGL.Size(8, 8));
var routeErrorIcon = new BMapGL.Icon("/images/route_error.png", new BMapGL.Size(8, 8));
var routeErrorLargeSpeedIcon = new BMapGL.Icon("/images/route_error_largespeed.png", new BMapGL.Size(8, 8));

<?php $pcounter = 0 ?>

var points = [];
var rbdata = [];

var view = new mapvgl.View({
    map: map
});
var lineLayer = new mapvgl.LineRainbowLayer({
    style: 'road', // road, arrow, normal
    width: 6,
    color: ['#0a0']
});
view.addLayer(lineLayer);
var rbdatas = [{
        geometry:{
            type: 'LineString',
            coordinates: rbdata
        }
}];

<?php
$routecounter = 0;
?>
@foreach($routes as $route)

<?php 
if($routecounter == 0){
?>
    var latlngStart = coordtransform.wgs84togcj02({{$route->lng}}, {{$route->lat}});
    latlngStart = coordtransform.gcj02tobd09(latlngStart[0], latlngStart[1]);
    var makerstart = new BMapGL.Marker(new BMapGL.Point(latlngStart[0], latlngStart[1]), {
        icon: routeStartIcon
    });
    map.addOverlay(makerstart);
<?php
}

if($routecounter == count($routes) - 1){
?>
    var latlngEnd = coordtransform.wgs84togcj02({{$route->lng}}, {{$route->lat}});
    latlngEnd = coordtransform.gcj02tobd09(latlngEnd[0], latlngEnd[1]);    
    var makerend = new BMapGL.Marker(new BMapGL.Point(latlngEnd[0], latlngEnd[1]), {
        icon: routeEndIcon
    });
    map.addOverlay(makerend);   
<?php
}
?>

<?php
//if(($routecounter % 10 != 0) && $route->locationtype == 1){
//    $routecounter++;
//    continue;
//}
?>
addObuIcon({{$route->lng}}, {{$route->lat}}, {{$route->flag}});
<?php
$routecounter++;
?>
@endforeach

function addObuIcon(lng, lat, routeflag){
    var latlng = coordtransform.wgs84togcj02(lng, lat);
    latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);

    var pt = new BMapGL.Point(latlng[0], latlng[1]);
    var marker = new BMapGL.Marker(pt, {
        icon: obuIcon
    });
    if(routeflag === 2){
        marker.setIcon(routeErrorIcon);
    }

    if(routeflag === 3){
        marker.setIcon(routeErrorLargeSpeedIcon);
    }
    // 将标注添加到地图
    map.addOverlay(marker);     
}

function showAlert(){
    Lobibox.notify('warning', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        icon: 'bx bx-check-circle',
        delayIndicator: false,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: '没有符合条件的车辆运行轨迹。'
    });
}

function showValidDates(){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "getroutevaliddates?obuid=" + $("#obudevice").val(),
        dataType: "json",
        success: function (data) {
            if(data.retcode === 1){
                $("#fromdate").empty();
                
                if(data.vdates.length === 0){
                    Lobibox.notify('warning', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        icon: 'bx bx-check-circle',
                        delayIndicator: false,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: '该车辆没有任何运行轨迹。'
                    });
                    return;
                }
                
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    size: 'mini',
                    rounded: true,
                    icon: 'bx bx-check-circle',
                    delayIndicator: false,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: '请选择相应的日期和时间查看车辆的运行轨迹。'
                });                
                
                for(var i = 0; i < data.vdates.length; i++){
                    var optstr = "<option value='" + data.vdates[i].vdate + "'";
                    optstr += ">" + data.vdates[i].vdate + "</option>";
                    $("#fromdate").append(optstr);
                }
                
            }            
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            
        }
    });
}
</script>

@endsection