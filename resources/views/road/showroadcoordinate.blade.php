@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<h5 class="card-title">路段坐标维护 [{{$road->roadname}}]</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addroadcoordinate?roadid={{$road->id}}"><button type="button" class="btn btn-outline-success px-2 radius-6">新增坐标</button></a>
        <a href="importroadcoordinate?roadid={{$road->id}}"><button type="button" class="btn btn-outline-success px-2 radius-6">导入坐标</button></a>
    </div>
</div>

<table class="table mb-0 table-borderless " style="width: 100%;">
    <tr>
        <td valign="top">
        <div id="bdmap_container" style="width: 100%; height: 1000px; min-width: 600px;">    
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
var polygons = new Map();
var bdlabels = new Map();
var bdmakers = new Map();

var rsuIcon = new BMapGL.Icon("/images/circle_white_border.png", new BMapGL.Size(16, 16));
@if(count($coords) > 0)
@foreach($coords as $coord)
    addRoadRect({{$coord->lng1}}, {{$coord->lat1}}, {{$coord->lng2}}, {{$coord->lat2}}, 
        {{$coord->lng3}}, {{$coord->lat3}}, {{$coord->lng4}}, {{$coord->lat4}}, 
        {{$coord->id}}, {{sprintf("%.1f", $coord->angle)}}, {{$coord->lng}}, {{$coord->lat}},
        {{$coord->maxlng}}, {{$coord->maxlat}}, {{$coord->minlng}}, {{$coord->minlat}});
@endforeach
@endif


function addRoadRect(lng1, lat1, lng2, lat2, lng3, lat3, lng4, lat4, id, angle, lng, lat,
    maxlng, maxlat, minlng, minlat){
        var latlng = coordtransform.wgs84togcj02(lng1, lat1);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1])
        lng1 = latlng[0]; lat1 = latlng[1];
        
        latlng = coordtransform.wgs84togcj02(lng2, lat2);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1])
        lng2 = latlng[0]; lat2 = latlng[1];
        
        latlng = coordtransform.wgs84togcj02(lng3, lat3);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1])
        lng3 = latlng[0]; lat3 = latlng[1];
        
        latlng = coordtransform.wgs84togcj02(lng4, lat4);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1])
        lng4 = latlng[0]; lat4 = latlng[1];
        
        var point = new BMapGL.Point(lng1, lat1);  // 创建点坐标  
        map.centerAndZoom(point, 18);                 // 初始化地图，设置中心点坐标和地图级别           
        var polygon = new BMapGL.Polygon([
                new BMapGL.Point(lng1, lat1),
                new BMapGL.Point(lng2, lat2),
                new BMapGL.Point(lng3, lat3),
                new BMapGL.Point(lng4, lat4)
            ], {strokeColor:"red", strokeWeight:2, strokeOpacity:0.5});            
        map.addOverlay(polygon);
        polygons.set(id, polygon);
        
        var content = angle;
        var label = new BMapGL.Label(content, {       // 创建文本标注
            position: point,                          // 设置标注的地理位置
            offset: new BMapGL.Size(0, 0)           // 设置标注的偏移量
        })  
        map.addOverlay(label);  
        label.setStyle({                              // 设置label的样式
            color: '#1b8e30',
            fontSize: '10px',
            padding: '3px',
            border: '1px solid #1E90FF'
        })
        bdlabels.set(id, label);
        
        label.addEventListener("click", function(){  
            showInfoWindow(lng1, lat1, id);
        });        
        
        latlng = coordtransform.wgs84togcj02(lng, lat);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);
        var pt = new BMapGL.Point(latlng[0], latlng[1]);
        var marker = new BMapGL.Marker(pt, {
            icon: rsuIcon
        });
        // 将标注添加到地图
        map.addOverlay(marker);  
        bdmakers.set(id, marker);
        
//        var polygonmax = new BMapGL.Polygon([
//                new BMapGL.Point(maxlng, maxlat),
//                new BMapGL.Point(minlng, maxlat),
//                new BMapGL.Point(minlng, minlat),
//                new BMapGL.Point(maxlng, minlat)
//            ], {strokeColor:"blue", strokeWeight:2, strokeOpacity:0.5});
//        map.addOverlay(polygonmax);    
}

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

function showInfoWindow(lng, lat, id){
    var pt = new BMapGL.Point(lng, lat);   
    var opts = {
        width: 200,
        height: 60,
        title: '坐标信息'
    };
    var infoText = "<a target='_blank' href='editroadcoordinate?coordid=" + id + "'>编辑坐标</a><br/>" + 
            "<a  onclick='deleteOverlay(" + id + ");'>删除坐标</a>"; // 
    let infoWindow = new BMapGL.InfoWindow(infoText, opts);                  
    map.openInfoWindow(infoWindow, pt); // 开启信息窗口    
}

function deleteOverlay(id){       
    $.ajax({
        type: "GET",
        url: "deleteroadcoordinate?coordid=" + id,
        dataType: "html",
        success: function (data) {   
            map.removeOverlay(polygons.get(id));
            map.removeOverlay(bdlabels.get(id));
            map.removeOverlay(bdmakers.get(id));
            map.closeInfoWindow();
            
            Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        icon: 'bx bx-check-circle',
                        delayIndicator: false,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: '删除成功！'
            });                 
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            Lobibox.notify('error', {
                                    pauseDelayOnHover: true,
                                    size: 'mini',
                                    rounded: true,
                                    icon: 'bx bx-check-circle',
                                    delayIndicator: false,
                                    continueDelayOnInactiveTab: false,
                                    position: 'top right',
                                    msg: '删除失败！'
                            });  
        }
    });  
    
       
}
</script>    
@endsection