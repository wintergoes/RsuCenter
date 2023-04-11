@extends('layouts.home')

@section('content')
<script type="text/javascript" src="http://api.tianditu.gov.cn/api?v=3.0&tk=41a827605c36598489f9ddee196c176c"></script>

<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<h5 class="card-title">Connect Rsm数据回放</h5>
<hr>

<div class="row mb-0">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }} 
            <table style="font-size: 12px; text-align: center; margin-bottom: 6px; width: 100%;" >    
                 <tr> 
                    <td class="search_td">
                        <textarea id="rsmjson" rows="5" wrap="off" style="width: 100%;"></textarea>
                    </td>
                </tr>                
            </table>
            
            <table style="font-size: 12px; text-align: center; margin-bottom: 6px; width: 100%;" >    
                 <tr> 
                     <td>回放标题：<input type="text" value=""> </td>
                     <td><input type="checkbox"  id="chkincludetime" checked="true">第一列为时间</td>
                    <td>回放时间间隔：<input type="number" step="100"  id="playbackinterval" value="500" />毫秒</td>
                    <td><span id="playbackprogress"></span><input type="button" id="btnpause" onclick="pausePlayback();" value="暂停"/></td>
                    <td>
                        <input type="button" onclick="clearRsm();"  value="清除"/>
                        <input type="button" onclick="startPlayBack();"  value="显示"/>
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
    var connectIcon = new TIcon("/images/route_start.png", new TSize(8, 8))

var connoverlay;
function showConnect(str){
    var connectjson = eval("(" + str + ")");
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
    havecenterandzoom = true;
}

var rsmoverlays = [];
var rsmHashMap = new HashMap();
function showRsm(str){
//    alert($("#rsmjson").val());
    var rsmjson = eval("(" + str + ")");
    for(var i = 0; i < (rsmjson.value.participants.length); i++){
//        alert(rsmjson.value.participants[i].lat + ", " + rsmjson.value.participants[i].lng);
        var part = rsmjson.value.participants[i];
        var searchol = rsmHashMap.get(part.ptcId);
        if(searchol){
            searchol.setLngLat(new TLngLat(part.lng / 10, part.lat / 10));
            console.log(part.ptcId + " exist");
        } else{
            var ol = addPoint(part.lat / 10, part.lng / 10, "plate: " +
                part.plateno + "\nptcId: " + part.ptcId + "\n__lat: " + part.lat + "\n__lng: " + part.lng, false, rsmIcon);
            rsmoverlays.push(ol);        
            rsmHashMap.put(part.ptcId, ol);
            console.log(part.ptcId + " is not exist");
        }
    }
}

var datalines ;
var playbackindex = 0;
var playbackinterval = 500;
var includetimecol = false;
var playpaused = false;
var havecenterandzoom = false;
function startPlayBack(){
    var jsons = $("#rsmjson").val();
    datalines = jsons.split("\n");
    clearRsm();
    rsmHashMap.clear();
    havecenterandzoom = false;
    includetimecol = document.getElementById("chkincludetime").checked;
    playbackinterval = $("#playbackinterval").val();
    playbackindex = 0;
    setTimeout("realPlayBack()", 100);
}

function pausePlayback(){
    if(playpaused === true){
        playpaused = false;
        setTimeout("realPlayBack()", 100);
        $("#btnpause").val("暂停");
    } else {
        playpaused = true;
        $("#btnpause").val("继续");
    }
}

function realPlayBack(){
//    alert(datalines[playbackindex]);
    linestrAll = datalines[playbackindex];
    
    var linestr = "";
    if(includetimecol){
        var tmpary = linestrAll.split(",");
        if(tmpary.length < 2){
            alert("数据错误，长度小于2，请检查数据。");
            return;
        }
        
        for(var i = 1; i < tmpary.length; i++){
            linestr = linestr + tmpary[i];
            
            if(i < tmpary.length - 1){
                linestr = linestr + ", ";
            }
        }
        console.log("linestr: " + linestr);
        $("#playbackprogress").text("正在回放 " + playbackindex + " / " + datalines.length + "__时间：" + tmpary[0]);
    } else {
        linestr = linestrAll;
        $("#playbackprogress").text("正在回放 " + playbackindex + " / " + datalines.length);
    }

    if(linestr.indexOf("connect") !== -1){
        showConnect(linestr);
    } 
    
    if(linestr.indexOf("rsm") !== -1){
        showRsm(linestr);
    }     
    
    playbackindex++;
    if(playbackindex < datalines.length && playpaused === false){
        setTimeout("realPlayBack()", playbackinterval);
    }
}

function clearRsm(){
    for(var i = 0; i < rsmoverlays.length; i++){
        map.removeOverLay(rsmoverlays[i]);
    }
    rsmoverlays.length = 0;
}

function addPoint(lat, lng, title, centerandzoom, pticon){
    if(centerandzoom || havecenterandzoom === false){
        map.centerAndZoom(new TLngLat(lng, lat), 18);
        havecenterandzoom = true;
    }
    var marker = new TMarker(new TLngLat(lng, lat));
    marker.setTitle(title);
    marker.setIcon(pticon);
    map.addOverLay(marker);
    return marker;
}
</script>    
@endsection