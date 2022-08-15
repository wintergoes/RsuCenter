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
            <table style="font-size: 12px; text-align: center;" >
                <tr>
                    <td class="search_td">&nbsp;&nbsp;设备编号&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="obudevice" id="obudevice" onchange="showValidDates()" class="form-select"  style="width: 200px">
                            @foreach($obus as $obu)
                            <option class="form-control" value="{{$obu->id}}" {{$searchobu == $obu->id ? "selected" : ""}}>{{$obu->obuid}}</option>
                            @endforeach
                        </select>
                    </td>                    
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;日期&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <input name="fromdate1111" type="hidden" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="8" value="{{$searchfromdate}}"/>
                        <select name="fromdate" id="fromdate" class="form-select" style="width: 200px">
                            @foreach($validdates as $validdate)
                            <option class="form-control" value="{{$validdate->vdate}}" {{$searchfromdate == $validdate->vdate ? "selected" : ""}}>{{$validdate->vdate}}</option>
                            @endforeach
                        </select>                        
                    </td>
                    
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
                <div id="bdmap_container" style="width: 100%; height: 660px">
                </div>                    
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
var point = new BMapGL.Point(latlng[0], latlng[1]);  // 创建点坐标  
@else
showAlert();                     
var point = new BMapGL.Point({{$default_lng}}, {{$default_lat}});  // 创建点坐标      
@endif
map.centerAndZoom(point, 16);                 // 初始化地图，设置中心点坐标和地图级别 
map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放


var routeStartIcon = new BMapGL.Icon("/images/route_start.png", new BMapGL.Size(32, 32));
var routeEndIcon = new BMapGL.Icon("/images/route_end.png", new BMapGL.Size(32, 32));

<?php $pcounter = 0 ?>

var points = [];
var rbdata = [];
@foreach($routes as $route)
var latlng = coordtransform.wgs84togcj02({{$route->lng}}, {{$route->lat}});
latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);
points.push(new BMapGL.Point(latlng[0], latlng[1]));
var rbdataitem = [];
rbdataitem.push(latlng[0]);
rbdataitem.push(latlng[1]);
rbdata.push(rbdataitem);
<?php 
if($pcounter == 0){
?>
                var makerstart = new BMapGL.Marker(new BMapGL.Point(latlng[0], latlng[1]), {
                    icon: routeStartIcon
                });
                map.addOverlay(makerstart);
<?php
}

if($pcounter == count($routes) - 1){
?>
                var makerend = new BMapGL.Marker(new BMapGL.Point(latlng[0], latlng[1]), {
                    icon: routeEndIcon
                });
                map.addOverlay(makerend);   
<?php
}
$pcounter++; 

?>
@endforeach

var view = new mapvgl.View({
    map: map
});
var lineLayer = new mapvgl.LineRainbowLayer({
    style: 'road', // road, arrow, normal
    width: 6,
    color: ['#0a0']
});
view.addLayer(lineLayer);
var rbdata = [{
        geometry:{
            type: 'LineString',
            coordinates: rbdata
        }
}];
lineLayer.setData(rbdata);

@if(count($routes) > 0)
//var polyline = new BMapGL.Polyline(points, {strokeColor:"blue", strokeWeight:5, strokeOpacity:1});
//map.addOverlay(polyline);
@endif

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