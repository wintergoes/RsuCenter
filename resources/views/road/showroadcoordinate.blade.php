@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>


<table class="table mb-0 table-borderless " style="width: 100%;">
    <tr>

        <td valign="top">
            <div style=" overflow-y:auto; overflow-x:auto;  height:700px;">

            </div>
        </td>
        <td valign="top">
        <div id="bdmap_container" style="width: 1000px; height: 1000px">    
        </td>
    </tr>
</table>

<script>
var map = new BMapGL.Map("bdmap_container", {
   coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                 // 指定完成后API将以指定的坐标类型处理您传入的坐标
});          // 创建地图实例  
var point = new BMapGL.Point(116.296286, 39.984241);  // 创建点坐标  
map.centerAndZoom(point, 13);                 // 初始化地图，设置中心点坐标和地图级别 
map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

var rsuIcon = new BMapGL.Icon("/images/circle_white_border.png", new BMapGL.Size(16, 16));

@foreach($coords as $coord)
        var point = new BMapGL.Point({{$coord->lng1}}, {{$coord->lat1}});  // 创建点坐标  
        map.centerAndZoom(point, 18);                 // 初始化地图，设置中心点坐标和地图级别           
        var polygon = new BMapGL.Polygon([
                new BMapGL.Point({{$coord->lng1}}, {{$coord->lat1}}),
                new BMapGL.Point({{$coord->lng2}}, {{$coord->lat2}}),
                new BMapGL.Point({{$coord->lng3}}, {{$coord->lat3}}),
                new BMapGL.Point({{$coord->lng4}}, {{$coord->lat4}})
            ], {strokeColor:"red", strokeWeight:2, strokeOpacity:0.5});   
        map.addOverlay(polygon);
        
        var content = '{{sprintf("%.1f", $coord->angle)}}, {{sprintf("%.1f", $coord->angle1)}}';
        var label = new BMapGL.Label(content, {       // 创建文本标注
            position: point,                          // 设置标注的地理位置
            offset: new BMapGL.Size(0, 0)           // 设置标注的偏移量
        })  
        map.addOverlay(label);    
        
        var pt = new BMapGL.Point({{$coord->lng}}, {{$coord->lat}});
        var marker = new BMapGL.Marker(pt, {
            icon: rsuIcon
        });

        // 将标注添加到地图
        map.addOverlay(marker);        
        
//        var polygonmax = new BMapGL.Polygon([
//                new BMapGL.Point({{$coord->maxlng}}, {{$coord->maxlat}}),
//                new BMapGL.Point({{$coord->minlng}}, {{$coord->maxlat}}),
//                new BMapGL.Point({{$coord->minlng}}, {{$coord->minlat}}),
//                new BMapGL.Point({{$coord->maxlng}}, {{$coord->minlat}})
//            ], {strokeColor:"blue", strokeWeight:2, strokeOpacity:0.5});
//        map.addOverlay(polygonmax);
        
//    addPoint({{$coord->lat1}}, {{$coord->lng1}});
//    addPoint({{$coord->lat2}}, {{$coord->lng2}});
//    addPoint({{$coord->lat3}}, {{$coord->lng3}});
//    addPoint({{$coord->lat4}}, {{$coord->lng4}});
@endforeach

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

function showInfoWindow(lat, lng, satnum, direction, distance, speed){
                let pt = new BMapGL.Point(lng, lat);   
    var pts = [];
    pts.push(pt);
    setTimeout(function(){
        var convertor = new BMapGL.Convertor();
        convertor.translate(pts, COORDINATES_WGS84, COORDINATES_BD09, infoWindowtranslateCallback)
    }, 10);   
    
    infoWindowtranslateCallback = function (data){
        if(data.status === 0 && data.points.length > 0) {
            var opts = {
                width: 200,
                height: 60,
                title: '点位信息'
            };
            var infoText = "卫星数：" + satnum + 
                    "  方向: " + direction +
                    "<br/>距离: " + distance + 
                    "  速度: " + speed;
            let infoWindow = new BMapGL.InfoWindow(infoText, opts);                  
            map.openInfoWindow(infoWindow, data.points[0]); // 开启信息窗口
        }
    }    
}
</script>    
@endsection