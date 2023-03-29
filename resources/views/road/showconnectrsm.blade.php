@extends('layouts.home')

@section('content')
<script type="text/javascript" src="http://api.tianditu.gov.cn/api?v=3.0&tk=41a827605c36598489f9ddee196c176c"></script>

<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<h5 class="card-title">Connect Rsm调试</h5>
<hr>

<div class="row mb-0">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }} 
            <table style="font-size: 12px; text-align: center; margin-bottom: 6px; width: 100%;" >
                <tr> 
                    <td>Connect:</td>
                    <td class="search_td">
                        <textarea id="connectjson" rows="5" style="width: 100%;"></textarea>
                    </td>
                    <td><input type="button" onclick="showConnect();" value="显示"/></td>;
                </tr>        
                
                 <tr> 
                    <td>Rsm:</td>
                    <td class="search_td">
                        <textarea id="rsmjson" rows="5" style="width: 100%;"></textarea>
                    </td>
                    <td>
                        <input type="button" onclick="clearRsm();" value="清除"/>
                        <input type="button" onclick="showRsm();" value="显示"/>
                    </td>
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
    
    var rsmIcon = new TIcon("/images/circle_white_border.png", new TSize(8, 8));
    var connectIcon = new TIcon("/images/route_start.png", new TSize(32, 32))

var connoverlay;
function showConnect(){
    var connectjson = eval("(" + $("#connectjson").val() + ")");
//    alert(connectjson.value.nmea1);
    var nmea1ary = connectjson.value.nmea1.split(",");
    var lng = nmea1ary[3];
    var lat = nmea1ary[2];
    map.centerAndZoom(new TLngLat(lng, lat), 18);
    if(connoverlay){
        map.removeOverLay(connoverlay);
    }
    connoverlay = new TMarker(new TLngLat(lng, lat));
    connoverlay.setIcon(connectIcon);
    overlay = map.addOverLay(connoverlay);
}

var rsmoverlays = [];
function showRsm(){
//    alert($("#rsmjson").val());
    var rsmjson = eval("(" + $("#rsmjson").val() + ")");
    for(var i = 0; i < (rsmjson.value.participants.length); i++){
//        alert(rsmjson.value.participants[i].lat + ", " + rsmjson.value.participants[i].lng);
        var part = rsmjson.value.participants[i];
        var ol = addPoint(part.lat / 10, part.lng / 10, "plate: " +
            part.plateno + "\nptcId: " + part.ptcId + "\n__lat: " + part.lat + "\n__lng: " + part.lng);
        rsmoverlays.push(ol);
    }
}

function clearRsm(){
    for(var i = 0; i < rsmoverlays.length; i++){
        map.removeOverLay(rsmoverlays[i]);
    }
    rsmoverlays.length = 0;
}

function addPoint(lat, lng, title){
    map.centerAndZoom(new TLngLat(lng, lat), 18);
    var marker = new TMarker(new TLngLat(lng, lat));
    marker.setTitle(title);
    map.addOverLay(marker);
    return marker;
}
</script>    
@endsection