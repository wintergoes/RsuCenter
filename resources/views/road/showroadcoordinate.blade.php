@extends('layouts.home')

@section('content')
<script type="text/javascript" src="http://api.tianditu.gov.cn/api?v=3.0&tk=41a827605c36598489f9ddee196c176c"></script>

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
        <a href="exportroadcoordinate?roadid={{$road->id}}"><button type="button" class="btn btn-outline-success px-2 radius-6">导出坐标</button></a>
    </div>
</div>

<div class="row mb-0">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }} 
            <input type="hidden" class="form-control" id="roadid" name="roadid" value="{{$searchroadid}}" placeholder="">
            <table style="font-size: 12px; text-align: center; margin-bottom: 6px;" >
                <tr> 
                    <td class="search_td">车辆类型&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="lanetype" class="form-select"  >
                            <option class="form-control" value="0" >全车道</option>
                            <option class="form-control" value="1" >具体车道</option>
                        </select>
                    </td> 
                    
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;车道号&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <input type="text" class="form-control" id="laneno" name="laneno" placeholder="">
                    </td>
                    
                    <td class="search_td">&nbsp;&nbsp;显示id&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="showid" class="form-select"  >
                            <option class="form-control" value="0" {{$searchshowid == "0" ? "selected" : ""}}>否</option>
                            <option class="form-control" value="1" {{$searchshowid == "1" ? "selected" : ""}} >是</option>
                        </select>
                    </td>
                    <td class="search_td">&nbsp;&nbsp;显示角度&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="showangle" class="form-select"  >
                            <option class="form-control" value="0" {{$searchshowangle == "0" ? "selected" : ""}}>否</option>
                            <option class="form-control" value="1" {{$searchshowangle == "1" ? "selected" : ""}}>是</option>
                        </select>
                    </td>                    
                    
                    <td class="search_td"><button type="submit" class="btn btn-outline-secondary px-1 radius-6">显示坐标</button></td>
                </tr>                  
            </table>
            
            <table style="font-size: 12px; text-align: center; margin-bottom: 6px;" >
                <tr>
                    @foreach($sectionnos as $secno)
                    <input type="checkbox" name="secnos[]" id="secno{{$secno->secno}}" value="{{$secno->secno}}"
                           {{is_array($searchsecno) && in_array($secno->secno, $searchsecno) !== false ? "checked" : ""}}>{{$secno->secno}}
                    @endforeach
                </tr>                  
            </table>
            
            <table style="font-size: 12px; text-align: center;" >                             
                <tr>                   
                    <td class="search_td">
                        <input type="text" class="form-control" id="inputcoord" placeholder="经度,纬度">
                    </td> 
                    <td class="search_td">
                        <select id="inputcoord_sys" class="form-control">
                            <option value="0">WGS84</option>
                            <option value="1">BD0911</option>
                        </select>
                    </td> 
                    <td class="search_td">&nbsp;&nbsp;<button type="button" onclick="showInputCoord();" class="btn btn-outline-secondary px-1 radius-6">定位点</button></td>
                    
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript: selectLngLatMode=1;">拾取坐标</a></td>
                    <td class="search_td">
                        <input type="text" class="form-control" id="outputcoord" placeholder="">
                    </td>
                    <td class="search_td">
                        <select id="getcoord_sys" class="form-control">
                            <option value="0">WGS84</option>
                            <option value="1" selected>BD0911</option>
                        </select>
                    </td>
                    
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地图类型{{$searchshowid}}</td>
                    <td class="search_td">
                        <select id="bdmap_type" class="form-control" onchange="onBdmapChange(this);">
                            <option value="0">街道地图</option>
                            <option value="1">卫星地图</option>
                        </select>
                    </td> 
                    
                    <td class="search_td"><button type="button" onclick="addRoadSectionOnMap();" class="btn btn-outline-secondary px-1 radius-6">初始标记</button></td>
                    <td class="search_td"><button type="button" onclick="moveRoadMarkers();" class="btn btn-outline-secondary px-1 radius-6">移动标记</button></td>
                    <td class="search_td"><button type="button" onclick="saveMapCoords();" class="btn btn-outline-secondary px-1 radius-6">保存坐标点</button></td>
                </tr>
            </table>
        </form>
</div>

<table class="table mb-0 table-borderless " style="width: 100%;">
    <tr>
        <td valign="top">
        <div id="bdmap_container" style="width: 100%; height: 1000px; min-width: 600px;">    
        </td>
    </tr>
</table>

<script>
    //初始化地图对象
    var map=new TMap("bdmap_container");
    //设置显示地图的中心点和级别
    map.centerAndZoom(new TLngLat(116.296286, 39.984241), 18);
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

    var rsuIcon = new TIcon("/images/circle_white_border.png", new TSize(8, 8));
    @if(count($coords) > 0)
    @foreach($coords as $coord)
    addRoadRect({{$coord->lng1}}, {{$coord->lat1}}, {{$coord->lng2}}, {{$coord->lat2}}, 
            {{$coord->lng3}}, {{$coord->lat3}}, {{$coord->lng4}}, {{$coord->lat4}}, 
            {{$coord->id}}, {{sprintf("%.1f", $coord->angle)}}, {{$coord->lng}}, {{$coord->lat}},
            {{$coord->maxlng}}, {{$coord->maxlat}}, {{$coord->minlng}}, {{$coord->minlat}}, {{$coord->roadsectionno}}, map);
    @endforeach
    @endif
    
var selectLngLatMode = 0;    
function addRoadRect(lng1, lat1, lng2, lat2, lng3, lat3, lng4, lat4, id, angle, lng, lat,
    maxlng, maxlat, minlng, minlat, roadsectionno, map){
        var point = new TLngLat(lng1, lat1);  // 创建点坐标  
        var content = "";
        @if($searchshowid == 1)
            content = id + ", " + roadsectionno;
        @endif
        
        @if($searchshowangle == 1)
            content = angle;
        @endif
        
        if(content !== ""){
            var config = {
                text: content,
                offset: new TPixel(0, 0),
                position: point
            }
            var label = new TLabel(config);
            label.setFontSize(3);
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
//                var tmplog = "";
//                for(var i = 0; i < newPoints.length; i++){
//                    var newlatlng = coordtransform.bd09togcj02(newPoints[i].getLng(), newPoints[i].getLat());
//                    newlatlng = coordtransform.gcj02towgs84(newlatlng[0], newlatlng[1]);
//                    newlng1 = newlatlng[0]; newlat1 = newlatlng[1];
//                    tmplog = tmplog + newPoints[i].getLat() + "," + newPoints[i].getLng() + "\n=======" + newlat1 + ", " + newlng1 + "\n";
//                }
//                alert(tmplog);

                $.ajaxSetup({ 
                    headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
                }); 

//                var newlatlng = coordtransform.bd09togcj02(newPoints[0].getLng(), newPoints[0].getLat());
//                newlatlng = coordtransform.gcj02towgs84(newlatlng[0], newlatlng[1]);
//                newlng1 = newlatlng[0]; newlat1 = newlatlng[1]; 

//                newlatlng = coordtransform.bd09togcj02(newPoints[1].getLng(), newPoints[1].getLat());
//                newlatlng = coordtransform.gcj02towgs84(newlatlng[0], newlatlng[1]);
//                newlng2 = newlatlng[0]; newlat2 = newlatlng[1];             

//                newlatlng = coordtransform.bd09togcj02(newPoints[2].getLng(), newPoints[2].getLat());
//                newlatlng = coordtransform.gcj02towgs84(newlatlng[0], newlatlng[1]);
//                newlng3 = newlatlng[0]; newlat3 = newlatlng[1];             

//                newlatlng = coordtransform.bd09togcj02(newPoints[3].getLng(), newPoints[3].getLat());
//                newlatlng = coordtransform.gcj02towgs84(newlatlng[0], newlatlng[1]);
//                newlng4 = newlatlng[0]; newlat4 = newlatlng[1]; 
                
                newlat1 = newPoints[0].getLat(); newlng1 = newPoints[0].getLng();
                newlat2 = newPoints[1].getLat(); newlng2 = newPoints[1].getLng();
                newlat3 = newPoints[2].getLat(); newlng3 = newPoints[2].getLng();
                newlat4 = newPoints[3].getLat(); newlng4 = newPoints[3].getLng();
                

                $.ajax({
                    type: "GET",
                    url: "updateroadcoordinate?p1lat=" + newlat1 + "&p1lng=" + newlng1 +
                            "&p2lat=" + newlat2 + "&p2lng=" + newlng2 +
                            "&p3lat=" + newlat3 + "&p3lng=" + newlng3 +
                            "&p4lat=" + newlat4 + "&p4lng=" + newlng4 +
                            "&coordid=" + id,
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
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });     
    
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