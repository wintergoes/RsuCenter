@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>

<script>
function submitData(){
    if($('#devicecode').val() === ''){
        alert('预警名称不能为空！');
        $('#devicecode').focus();
        return;
    }  

    $('#form1').submit();
}


</script>

@if(isset($device))
<h5 class="card-title">道路管理 > 编辑路段</h5>
@else
<h5 class="card-title">道路管理 > 新增路段</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($device))
    <form class="form-horizontal" id="form1" method="post" action="/editroadcoordinatesave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addroadcoordinatesave">
    @endif
        {{ csrf_field() }}
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="latlng1" class="col-sm-2 col-form-label">坐标1</label>
            <div class="col-sm-6">
                @if(isset($coord))
                <input type="text" class="form-control" id="latlng1" name="latlng1" onchange="showRoadOnMap();" value="{{$coord->lat1}},{{$coord->lng1}}">
                @else
                <input type="text" class="form-control" id="latlng1" name="latlng1" onchange="showRoadOnMap();" value="" placeholder="">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="latlng2" class="col-sm-2 col-form-label">坐标2</label>
            <div class="col-sm-6">
                @if(isset($coord))
                <input type="text" class="form-control" id="latlng2" name="latlng2" onchange="showRoadOnMap();" value="{{$coord->lat2}},{{$coord->lng2}}">
                @else
                <input type="text" class="form-control" id="latlng2" name="latlng2" onchange="showRoadOnMap();" value="" placeholder="">
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="latlng3" class="col-sm-2 col-form-label">坐标3</label>
            <div class="col-sm-6">
                @if(isset($coord))
                <input type="text" class="form-control" id="latlng3" name="latlng3" onchange="showRoadOnMap();" value="{{$coord->lat3}},{{$coord->lng3}}">
                @else
                <input type="text" class="form-control" id="latlng3" name="latlng3" onchange="showRoadOnMap();" value="" placeholder="">
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="latlng4" class="col-sm-2 col-form-label">坐标4</label>
            <div class="col-sm-6">
                @if(isset($coord))
                <input type="text" class="form-control" id="latlng4" name="latlng4" onchange="showRoadOnMap();" value="{{$coord->lat4}},{{$coord->lng4}}">
                @else
                <input type="text" class="form-control" id="latlng4" name="latlng4" onchange="showRoadOnMap();" value="" placeholder="">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">保存修改</button>
            </div>
        </div>
        
        <div class="row mb-3" style="height: 500px;" id="bdmap_row">
            <div class="col-sm-12" id="bdmap_container">
            </div>           
        </div>
    </form>
    <div>
</div>

    
<script>
    var map = new BMapGL.Map("bdmap_container", {
       coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                     // 指定完成后API将以指定的坐标类型处理您传入的坐标
    });          // 创建地图实例  
    var point = new BMapGL.Point(120.315719,36.179238);  // 创建点坐标  
    map.centerAndZoom(point, 18);                 // 初始化地图，设置中心点坐标和地图级别 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    
function showRoadOnMap(){
//    alert($("#latlng1").val());
//    alert($("#latlng2").val());
//    alert($("#latlng3").val());
//    alert($("#latlng4").val());
    if($("#latlng1").val() === '' ||
            $("#latlng2").val() === '' ||
            $("#latlng3").val() === '' ||
            $("#latlng4").val() === ''){       
        return;
    }
    
//    alert("add");
    var latlng1 = $("#latlng1").val().split(",");
    var latlng2 = $("#latlng2").val().split(",");
    var latlng3 = $("#latlng3").val().split(",");
    var latlng4 = $("#latlng4").val().split(",");
    
    var latlng1 = gcj02tobd09(latlng1[1], latlng1[0]);
    var latlng2 = gcj02tobd09(latlng2[1], latlng2[0]);
    var latlng3 = gcj02tobd09(latlng3[1], latlng3[0]);
    var latlng4 = gcj02tobd09(latlng4[1], latlng4[0]);
    
    var point = new BMapGL.Point(latlng1[0], latlng1[1]);  // 创建点坐标  
    map.centerAndZoom(point, 18);                 // 初始化地图，设置中心点坐标和地图级别 
    var polygon = new BMapGL.Polygon([
            new BMapGL.Point(latlng1[0], latlng1[1]),
            new BMapGL.Point(latlng2[0], latlng2[1]),
            new BMapGL.Point(latlng3[0], latlng3[1]),
            new BMapGL.Point(latlng4[0], latlng4[1])
        ], {strokeColor:"red", strokeWeight:2, strokeOpacity:0.5});
    map.clearOverlays();
    map.addOverlay(polygon);    
} 



//定义一些常量
var x_PI = 3.14159265358979324 * 3000.0 / 180.0;
var PI = 3.1415926535897932384626;
var a = 6378245.0;
var ee = 0.00669342162296594323;
/**
 * 百度坐标系 (BD-09) 与 火星坐标系 (GCJ-02)的转换
 * 即 百度 转 谷歌、高德
 */
function bd09togcj02(bd_lon, bd_lat) {
  var x_pi = 3.14159265358979324 * 3000.0 / 180.0;
  var x = bd_lon - 0.0065;
  var y = bd_lat - 0.006;
  var z = Math.sqrt(x * x + y * y) - 0.00002 * Math.sin(y * x_pi);
  var theta = Math.atan2(y, x) - 0.000003 * Math.cos(x * x_pi);
  var gg_lng = z * Math.cos(theta);
  var gg_lat = z * Math.sin(theta);
  return [gg_lng, gg_lat]
}
/**
 * 火星坐标系 (GCJ-02) 与百度坐标系 (BD-09) 的转换
 * 即谷歌、高德 转 百度
 */
function gcj02tobd09(lng, lat) {
  var z = Math.sqrt(lng * lng + lat * lat) + 0.00002 * Math.sin(lat * x_PI);
  var theta = Math.atan2(lat, lng) + 0.000003 * Math.cos(lng * x_PI);
  var bd_lng = z * Math.cos(theta) + 0.0065;
  var bd_lat = z * Math.sin(theta) + 0.006;
  return [bd_lng, bd_lat]
}
/**
 * WGS84转GCj02
 */
function wgs84togcj02(lng, lat) {
  if (out_of_china(lng, lat)) {
    return [lng, lat]
  }
  else {
    var dlat = transformlat(lng - 105.0, lat - 35.0);
    var dlng = transformlng(lng - 105.0, lat - 35.0);
    var radlat = lat / 180.0 * PI;
    var magic = Math.sin(radlat);
    magic = 1 - ee * magic * magic;
    var sqrtmagic = Math.sqrt(magic);
    dlat = (dlat * 180.0) / ((a * (1 - ee)) / (magic * sqrtmagic) * PI);
    dlng = (dlng * 180.0) / (a / sqrtmagic * Math.cos(radlat) * PI);
    var mglat = lat + dlat;
    var mglng = lng + dlng;
    return [mglng, mglat]
  }
}
/**
 * GCJ02 转换为 WGS84
 */
function gcj02towgs84(lng, lat) {
  if (out_of_china(lng, lat)) {
    return [lng, lat]
  }
  else {
    var dlat = transformlat(lng - 105.0, lat - 35.0);
    var dlng = transformlng(lng - 105.0, lat - 35.0);
    var radlat = lat / 180.0 * PI;
    var magic = Math.sin(radlat);
    magic = 1 - ee * magic * magic;
    var sqrtmagic = Math.sqrt(magic);
    dlat = (dlat * 180.0) / ((a * (1 - ee)) / (magic * sqrtmagic) * PI);
    dlng = (dlng * 180.0) / (a / sqrtmagic * Math.cos(radlat) * PI);
    mglat = lat + dlat;
    mglng = lng + dlng;
    return [lng * 2 - mglng, lat * 2 - mglat]
  }
}
function transformlat(lng, lat) {
  var ret = -100.0 + 2.0 * lng + 3.0 * lat + 0.2 * lat * lat + 0.1 * lng * lat + 0.2 * Math.sqrt(Math.abs(lng));
  ret += (20.0 * Math.sin(6.0 * lng * PI) + 20.0 * Math.sin(2.0 * lng * PI)) * 2.0 / 3.0;
  ret += (20.0 * Math.sin(lat * PI) + 40.0 * Math.sin(lat / 3.0 * PI)) * 2.0 / 3.0;
  ret += (160.0 * Math.sin(lat / 12.0 * PI) + 320 * Math.sin(lat * PI / 30.0)) * 2.0 / 3.0;
  return ret
}
function transformlng(lng, lat) {
  var ret = 300.0 + lng + 2.0 * lat + 0.1 * lng * lng + 0.1 * lng * lat + 0.1 * Math.sqrt(Math.abs(lng));
  ret += (20.0 * Math.sin(6.0 * lng * PI) + 20.0 * Math.sin(2.0 * lng * PI)) * 2.0 / 3.0;
  ret += (20.0 * Math.sin(lng * PI) + 40.0 * Math.sin(lng / 3.0 * PI)) * 2.0 / 3.0;
  ret += (150.0 * Math.sin(lng / 12.0 * PI) + 300.0 * Math.sin(lng / 30.0 * PI)) * 2.0 / 3.0;
  return ret
}
/**
 * 判断是否在国内，不在国内则不做偏移
 */
function out_of_china(lng, lat) {
  return (lng < 72.004 || lng > 137.8347) || ((lat < 0.8293 || lat > 55.8271) || false);
}

</script>    
@endsection