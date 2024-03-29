@extends('layouts.home')

@section('content')
<script type="text/javascript" src="http://api.tianditu.gov.cn/api?v=3.0&tk=41a827605c36598489f9ddee196c176c"></script>

<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<h5 class="card-title">其他固定区域维护</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addmapfixedarea"><button type="button" class="btn btn-outline-success px-2 radius-6">新增其他区域</button></a>
    </div>
</div>

<div class="row mb-0">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }} 
        </form>
</div>

<table class="table mb-0 table-borderless " style="width: 100%;">
    <tr>
        <td>
            @if (count($fixedareas) > 0)        
            <div class="col-sm-auto">           
                <table class="table mb-0 table-hover table-bordered" >
                    <thead>
                        <tr role="row">
                            <th>ID</th>
                            <th>类型</th>
                            <th>名称</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fixedareas as $area)
                        <tr>
                            <td>{{$area->id}}</td>
                            
                            @if($area->areatype == 1)
                            <td>陆地</td>
                            @elseif($area->areatype == 2)
                            <td>海洋</td>
                            @else
                            <td>未设置</td>
                            @endif
                            
                            
                            <td>{{$area->areaname}}</td>
                            <td>
                                 <div class="dropdown">
                                    <button class="btn btn-light border-dark border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                        <li><a class="dropdown-item" href="editmapfixedarea?areaid={{$area->id}}">编辑</a></li>
                                        <li><a class="dropdown-item" onclick="return confirm('确定删除这个区域吗？');" href="deletemapfixedarea?areaid={{$area->id}}">删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach                            
                    </tbody>
                </table>
            </div>
            @endif               
        </td>
        <td valign="top">
        <div id="bdmap_container" style="width: 100%; height: 1000px; min-width: 600px;">    
        </td>
    </tr>
</table>

<script>
    var latlng = coordtransform.bd09togcj02({{$default_lng}}, {{$default_lat}});
    latlng = coordtransform.gcj02towgs84(latlng[0], latlng[1])    
    
    //初始化地图对象
    var map=new TMap("bdmap_container");
    //设置显示地图的中心点和级别
    map.centerAndZoom(new TLngLat(latlng[0], latlng[1]), 14);
     //允许鼠标滚轮缩放地图
    map.enableHandleMouseScroll();
    map.setMapType(TMAP_SATELLITE_MAP);

    var polygons = new Map();
    var bdlabels = new Map();
    var bdmakers = new Map();

    var tmplng;
    var tmplat;
    var getcoordMarker;
    TEvent.addListener(map, "click", function(p){
        if(selectLngLatMode === 0){
            return;
        }
        
        var lnglat = map.fromContainerPixelToLngLat(p);

        tmplng = lnglat.getLng();//经度
        tmplat = lnglat.getLat();//维度
;
        var pt = new TLngLat(tmplng, tmplat);
        map.removeOverLay(getcoordMarker);
        getcoordMarker = new TMarker(pt);
        // 将标注添加到地图
        map.addOverLay(getcoordMarker); 
    
        document.getElementById('outputcoord').value = tmplng.toFixed(6) + "," + tmplat.toFixed(6);     
        
        selectLngLatMode = 0;
    });

    
var selectLngLatMode = 0;    
function addRoadRect(lng1, lat1, lng2, lat2, lng3, lat3, lng4, lat4, id, angle, lng, lat,
    maxlng, maxlat, minlng, minlat, areaname, map){
        var point = new TLngLat(lng1, lat1);  // 创建点坐标  
        var content = areaname;

        if(content !== ""){
            var config = {
                text: content,
                offset: new TPixel(0, 0),
                position: point
            }
            var label = new TLabel(config)  
            map.addOverLay(label);  
            bdlabels.set(id, label);

            TEvent.addListener(label, "click", function(p){  
                showInfoWindow(bdlng1, bdlat1, lng1, lat1, id);
            });  
        }
        
        var pt = new TLngLat(lng, lat);
        var marker = new TMarker(pt, {
            icon: rsuIcon
        });
        marker.setZindex(0);
        // 将标注添加到地图
        map.addOverLay(marker);
        bdmakers.set(id, marker);        
        
        var latlng = coordtransform.wgs84togcj02(lng1, lat1);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1])
        var bdlng1 = latlng[0]; var bdlat1 = latlng[1];
        
        latlng = coordtransform.wgs84togcj02(lng2, lat2);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1])
        var bdlng2 = latlng[0]; var bdlat2 = latlng[1];
        
        latlng = coordtransform.wgs84togcj02(lng3, lat3);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1])
        var bdlng3 = latlng[0]; var bdlat3 = latlng[1];
        
        latlng = coordtransform.wgs84togcj02(lng4, lat4);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1])
        var bdlng4 = latlng[0]; var bdlat4 = latlng[1];
        
        map.centerAndZoom(point, 21);                 // 初始化地图，设置中心点坐标和地图级别  
        var points = [];
        points.push(new TLngLat(lng1, lat1));
        points.push(new TLngLat(lng2, lat2));
        points.push(new TLngLat(lng3, lat3));
        points.push(new TLngLat(lng4, lat4));
        var polygon = new TPolygon(points, {strokeColor:"blue", strokeWeight:1, strokeOpacity:1, fillOpacity:0.5});
        
        polygon.onChange(function(p){
                polygon.disableEdit();
                newPoints = polygon.getLngLats();
                if(newPoints.length !== 4){
                    alert("数据错误，数据顶点不等于四个。");
                    return;
                }
                
                $.ajaxSetup({ 
                    headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
                }); 

                newlat1 = newPoints[0].getLat(); newlng1 = newPoints[0].getLng();
                newlat2 = newPoints[1].getLat(); newlng2 = newPoints[1].getLng();
                newlat3 = newPoints[2].getLat(); newlng3 = newPoints[2].getLng();
                newlat4 = newPoints[3].getLat(); newlng4 = newPoints[3].getLng();
                
                $.ajax({
                    type: "GET",
                    url: "updateroadarea?p1lat=" + newlat1 + "&p1lng=" + newlng1 +
                            "&p2lat=" + newlat2 + "&p2lng=" + newlng2 +
                            "&p3lat=" + newlat3 + "&p3lng=" + newlng3 +
                            "&p4lat=" + newlat4 + "&p4lng=" + newlng4 +
                            "&areaid=" + id,
                    dataType: "json",
                    success: function (data) {
                        if(data.retcode === 1){
                            alert("更新区域成功！");
                        } else {
                            alert("更新区域失败！(" + data.retcode + ")");
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("更新区域失败！");
                    }
                });
        });
        
        TEvent.addListener(polygon, "click", function(p){
            if(polygon.isEditable()){
                            
            } else {
                polygon.enableEdit();
            }
        });
        
        map.addOverLay(polygon);
        polygons.set(id, polygon);
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

function showInfoWindow(bdlng, bdlat, lng, lat, id){
//    var pt = new TLngLat(lng, lat);   
//    var opts = {
//        width: 200,
//        height: 80,
//        title: '坐标信息'
//    };
//    var infoText = lng.toFixed(6) + "," + lat.toFixed(6) + "<br/>" +
//            "<a target='_blank' href='editroadcoordinate?coordid=" + id + "'>编辑坐标</a><br/>" + 
//            "<a  onclick='deleteOverlay(" + id + ");'>删除坐标</a>"; // 
//    let infoWindow = new TInfoWindow(infoText, opts);                  
//    map.openInfoWindow(infoWindow, pt); // 开启信息窗口    
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


var p1Icon = new TIcon("/images/icon_p1.png", new TSize(22, 28));
var p2Icon = new TIcon("/images/icon_p2.png", new TSize(26, 26));
var p3Icon = new TIcon("/images/icon_p3.png", new TSize(26, 26));
var p4Icon = new TIcon("/images/icon_p4.png", new TSize(26, 26));

var p5Icon = new TIcon("/images/icon_p5.png", new TSize(22, 28));
var p6Icon = new TIcon("/images/icon_p6.png", new TSize(26, 26));
var p1Marker, p2Marker, p3Marker, p4Marker;
var p5p6Line;
var p1234Line ;
function addRoadSectionOnMap(){
    var pt1 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00003);
    p1Marker = new TMarker(pt1, {
        icon: p1Icon
    });
    p1Marker.enableDragging();
    // 将标注添加到地图
    map.addOverLay(p1Marker);   

    var pt2 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00006);
    p2Marker = new TMarker(pt2, {
        icon: p2Icon
    });
    p2Marker.enableDragging();
    // 将标注添加到地图
    map.addOverLay(p2Marker);         

    var pt3 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00009);
    p3Marker = new TMarker(pt3, {
        icon: p3Icon
    });
    p3Marker.enableDragging();
    // 将标注添加到地图
    map.addOverLay(p3Marker);         

    var pt4 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00012);
    p4Marker = new TMarker(pt4, {
        icon: p4Icon
    });
    p4Marker.enableDragging();
    // 将标注添加到地图
    map.addOverLay(p4Marker);     
    
    var pt5 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00015);
    p5Marker = new TMarker(pt5, {
        icon: p5Icon
    });
    p5Marker.enableDragging();
    // 将标注添加到地图
    map.addOverLay(p5Marker); 
    
    var pt6 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00004);
    p6Marker = new TMarker(pt6, {
        icon: p6Icon
    });
    p6Marker.enableDragging();
    // 将标注添加到地图
    map.addOverLay(p6Marker);
    
    p5p6Points = [pt6, pt5];
    p5p6Line = new TPolyline(p5p6Points, {strokeColor:"blue", strokeWeight:3, strokeOpacity:0.8});
    map.addOverLay(p5p6Line);
    
    TEvent.addListener(p1Marker, "dragend", function(p){
       drawP1234Line(); 
    });
    
    TEvent.addListener(p2Marker, "dragend", function(p){
       drawP1234Line(); 
    });
    
    TEvent.addListener(p3Marker, "dragend", function(p){
       drawP1234Line(); 
    });
    
    TEvent.addListener(p4Marker, "dragend", function(p){
       drawP1234Line(); 
    });    
    
    TEvent.addListener(p5Marker, "dragend", function(p){
        p5p6Points = [new TLngLat(p6Marker.getLngLat().getLng(), p6Marker.getLngLat().getLat()), 
                        new TLngLat(p5Marker.getLngLat().getLng(), p5Marker.getLngLat().getLat())];
        p5p6Line.setLngLats(p5p6Points);            
    });
    
    TEvent.addListener(p6Marker, "dragend", function(p){
        p5p6Points = [new TLngLat(p6Marker.getLngLat().getLng(), p6Marker.getLngLat().getLat()), 
                        new TLngLat(p5Marker.getLngLat().getLng(), p5Marker.getLngLat().getLat())];
        p5p6Line.setLngLats(p5p6Points);            
    });    
}

function drawP1234Line(){
    //alert(p1Marker.getLngLat().getLng() + ", " + p1Marker.getLngLat().getLat());
    var p1234Points = [new TLngLat(p1Marker.getLngLat().getLng(), p1Marker.getLngLat().getLat()), 
                        new TLngLat(p2Marker.getLngLat().getLng(), p2Marker.getLngLat().getLat()),
                        new TLngLat(p3Marker.getLngLat().getLng(), p3Marker.getLngLat().getLat()), 
                        new TLngLat(p4Marker.getLngLat().getLng(), p4Marker.getLngLat().getLat()),
                        new TLngLat(p1Marker.getLngLat().getLng(), p1Marker.getLngLat().getLat())];
    if(p1234Line == null){
        p1234Line = new TPolyline(p1234Points, {strokeColor:"red", strokeWeight:1, strokeOpacity:0.8});
        map.addOverLay(p1234Line);
    } else {
        p1234Line.setLngLats(p1234Points);
    }
}

function saveMapCoords(){
    $.ajax({
        type: "GET",
        url: "addroadsectionmanually?p1lat=" + p1Marker.getLngLat().getLat() + "&p1lng=" + p1Marker.getLngLat().getLng() +
                "&p2lat=" + p2Marker.getLngLat().getLat() + "&p2lng=" + p2Marker.getLngLat().getLng() +
                "&p3lat=" + p3Marker.getLngLat().getLat() + "&p3lng=" + p3Marker.getLngLat().getLng() +
                "&p4lat=" + p4Marker.getLngLat().getLat() + "&p4lng=" + p4Marker.getLngLat().getLng() +
                "&p5lat=" + p5Marker.getLngLat().getLat() + "&p5lng=" + p5Marker.getLngLat().getLng() +
                "&p6lat=" + p6Marker.getLngLat().getLat() + "&p6lng=" + p6Marker.getLngLat().getLng() +
                "&roadid=" + getUrlParam("roadid"),
        dataType: "json",
        success: function (data) {
            if(data.retcode === 1){
                alert("更新坐标成功！");
            } else {
                alert("更新坐标失败！(" + data.retcode + ")");
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("更新坐标失败！");
        }
    });
}

function moveRoadMarkers(){
    p1Marker.setLngLat(new TLngLat(p2Marker.getLngLat().getLng(), p2Marker.getLngLat().getLat()));
    p4Marker.setLngLat(new TLngLat(p3Marker.getLngLat().getLng(), p3Marker.getLngLat().getLat()));
    p6Marker.setLngLat(new TLngLat(p5Marker.getLngLat().getLng(), p5Marker.getLngLat().getLat()));
    
    p2Marker.setLngLat(new TLngLat(p2Marker.getLngLat().getLng(), p2Marker.getLngLat().getLat() - 0.0001));
    p3Marker.setLngLat(new TLngLat(p3Marker.getLngLat().getLng(), p3Marker.getLngLat().getLat() - 0.0001));
    p5Marker.setLngLat(new TLngLat(p5Marker.getLngLat().getLng(), p5Marker.getLngLat().getLat() - 0.0001)); 
}

function showInputCoord(){
    var inputcoord = $("#inputcoord").val();
    var latlng = inputcoord.split(",");
    var point = new BMapGL.Point(latlng[0], latlng[1]);  // 创建点坐标 
    
    //坐标转换完之后的回调函数
    dwTranslateCallback = function (data){
      if(data.status === 0) {
        var pointConvert = new BMapGL.Point(data.points[0].lng, data.points[0].lat);  // 创建点坐标  
        map.centerAndZoom(pointConvert, 18);                 // 初始化地图，设置中心点坐标和地图级别           
        var inputmarker = new BMapGL.Marker(pointConvert, {});
        // 将标注添加到地图
        map.addOverlay(inputmarker)  
      }
    }       
    
    if($("#inputcoord_sys").val() === "0"){
        var points = [];
        points.push(point);
        var convertor = new BMapGL.Convertor();
        convertor.translate(points, COORDINATES_WGS84, COORDINATES_BD09, dwTranslateCallback, 100);    
    } else {
        map.centerAndZoom(point);
        var inputmarker = new BMapGL.Marker(point, {});
        // 将标注添加到地图
        map.addOverlay(inputmarker)        
    }
}

function onBdmapChange(obj){
    if($(obj).val() === "0"){
        map.setMapType(TMAP_NORMAL_MAP);
    } else {
        map.setMapType(TMAP_SATELLITE_MAP);
    }
}


</script>    
@endsection