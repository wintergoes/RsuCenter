@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addroadcoordinate?roadid={{$roadid}}"><button type="button" class="btn btn-outline-success px-2 radius-6">新增路段</button></a>
    </div>
</div>

@if (isset($coordinates) &&  count($coordinates) > 0)
<table class="table mb-0 table-borderless " style="width: 100%;">
    <tr>
        <td valign="top">
            <div style=" overflow-y:auto; overflow-x:auto;  height:700px;">
            @foreach($coordinates as $coord)
            <div style="cursor: pointer;" onclick="showInfoWindow({{$gps->lat1}});">{{$gps->angle}}</div>
            @endforeach
            </div>
        </td>
        <td valign="top">
        <div id="bdmap_container" style="width: 1000px; height: 1000px">    
        </td>
    </tr>
</table>
@else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">路段坐标列表为空！</div>
        </div>
        </div>
@endif
<script>
var map = new BMapGL.Map("bdmap_container", {
   coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                 // 指定完成后API将以指定的坐标类型处理您传入的坐标
});          // 创建地图实例  
var point = new BMapGL.Point(116.296286, 39.984241);  // 创建点坐标  
map.centerAndZoom(point, 13);                 // 初始化地图，设置中心点坐标和地图级别 
map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

var rsuIcon = new BMapGL.Icon("/images/circle_white_border.png", new BMapGL.Size(16, 16));

//坐标转换完之后的回调函数
translateCallback = function (data){
  if(data.status === 0) {
    for (var i = 0; i < data.points.length; i++) {
        addPoint(data.points[i].lat, data.points[i].lng);
    }
  }
}


function addPoint(lat, lng){
    let pt = new BMapGL.Point(lng, lat);
    var marker = new BMapGL.Marker(pt, {
        icon: rsuIcon
    });
    
    // 将标注添加到地图
    map.addOverlay(marker);    
}
</script>    
@endsection