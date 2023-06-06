@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<script src="js/zlzl.js"></script>
<script src="js/hikvision.js"></script>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-center" style="width: 90%;">
                        <p class="mb-0">
                            今日车流量（红岛南收费站出口）
                        </p>
                        <h4 class="my-1 text-info" id="vehflow">
                            0辆
                        </h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle text-white ms-auto">
                        <i class="bx bxs-radio">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-center" style="width: 90%;">
                        <p class="mb-0 ">
                            今日雷视识别事件
                        </p>
                        <h4 class="my-1 text-info" id="aidcount">
                            0个
                        </h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle  text-white ms-auto">
                        <i class="bx bxs-devices">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-center" style="width: 90%;">
                        <p class="mb-0 ">
                            交通事件发布累计
                        </p>
                        <h4 class="my-1 text-info" id="warncount">
                            0个
                        </h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle  text-white ms-auto">
                        <i class="bx bxs-no-entry">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-center" style="width: 90%;">
                        <p class="mb-0 ">
                            OBU预警次数累计
                        </p>
                        <h4 class="my-1 text-info" id="obuwarningcount">
                            0次
                        </h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle  text-white ms-auto">
                        <i class="bx bxs-time">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-8 border-1">
        <div class="card radius-6  border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <h6 class="mb-0 card-title">
                            <i class="bx bx-map">
                            </i>
                            路段实况图
                        </h6>
                    </div>
                    <div class="d-flex align-items-center ms-auto font-13 gap-2">
                        <span class="border px-1 rounded cursor-pointer">
                            <img src="images/dashboard/radarvision.png" width="15" height="15" style="vertical-align: middle;"></img>
                            雷视一体机
                        </span>                        
                        <span class="border px-1 rounded cursor-pointer">
                            <img src="images/dashboard/rsu_device.png" height="15" style="vertical-align: middle;"></img>
                            RSU
                        </span>
                        <span class="border px-1 rounded cursor-pointer">
                            <img src="images/obu_vehicle.png" width="10" style="vertical-align: middle;"></img>
                            OBU
                        </span>
                        <span class="border px-1 rounded cursor-pointer">
                            <img src="images/alertstart.png" width="15" height="15" style="vertical-align: middle;"></img>
                            交通事件
                        </span>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-horizontal-rounded font-22 text-option">
                            </i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="dashboard" target="_blank">
                                    智能云控平台
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="bdmap_container" style="width: 100%; height: 630px">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 ">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body" style="height: 710px;">
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <h6 class="mb-0">
                            <i class="bx bx-video-plus">
                            </i>
                            雷视交通事件检测
                        </h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-horizontal-rounded font-22 text-option">
                            </i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="aidevents" target="_blank">
                                    更多
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                    <table id="tblAidEvents" class="table table-borderless table-hover" style="width: 100%;">
                        <tr></tr>
                    </table>
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
var point = new BMapGL.Point(120.34039259920492,36.17936380347912);  // 创建点坐标  
map.centerAndZoom(point, 16);                 // 初始化地图，设置中心点坐标和地图级别 
map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    
var rsuIcon = new BMapGL.Icon("/images/dashboard/rsu_device.png", new BMapGL.Size(24, 24));
var rsuErrorIcon = new BMapGL.Icon("/images/dashboard/rsu_device_error.png", new BMapGL.Size(24, 24));
var obuIcon = new BMapGL.Icon("/images/obu_vehicle.png", new BMapGL.Size(15, 31));
var radarIcon = new BMapGL.Icon("/images/dashboard/radarvision.png", new BMapGL.Size(24, 24));
var alertStartIcon = new BMapGL.Icon("/images/alertstart.png", new BMapGL.Size(24, 24));
var alertStopIcon = new BMapGL.Icon("/images/alertstop.png", new BMapGL.Size(24, 24));
    
var rsumarkers = [];
var obumarkers = [];
var warningmarkers = []
var radarmarkers = [];
var radarLabels = [];
var radarDeviceMap = new HashMap();    
          
function updateBdMapSummary(){
    $.ajax({
        type: "GET",
        url: "dashboardbdmapsummary",
        dataType: "json",
        success: function (data) {
//            for(var i = 0; i < rsumarkers.length; i++){
//                map.removeOverlay(rsumarkers[i]);
//            }
            while(rsumarkers.length > 0){
                tmpRsuMaker = rsumarkers.pop();
                map.removeOverlay(tmpRsuMaker);
            } 
            
//            for(var i = 0; i < obumarkers.length; i++){
//                map.removeOverlay(obumarkers[i]);
//            }
            while(obumarkers.length > 0){
                tmpObuMaker = obumarkers.pop();
                map.removeOverlay(tmpObuMaker);
            }            
            
//            for(var i = 0; i < warningmarkers.length; i++){
//                map.removeOverlay(warningmarkers[i]);
//            }
            while(warningmarkers.length > 0){
                tmpWarnMaker = warningmarkers.pop();
                map.removeOverlay(tmpWarnMaker);
            }
            
//            for(var i = 0; i < radarLabels.length; i++){
//                radarLabels[i].setContent("");
//                //map.removeOverlay(radarLabels[i]);
//            }

            while(radarLabels.length > 0){
                tmpRadarLabel = radarLabels.pop();
                tmpRadarLabel.setContent("");
                map.removeOverlay(tmpRadarLabel);
//                map.removeOverlay(tmpradar);
            }
            
//            for(var i = 0; i < radarmarkers.length; i++){
//                map.removeOverlay(radarmarkers[i]);
//            } 
            while(radarmarkers.length > 0){
                tmpradar = radarmarkers.pop();
                map.removeOverlay(tmpradar);
            }
            
            //map.clearOverlays();
            for(var i = 0; i < data.rsudevices.length; i++){
                rsuobj = data.rsudevices[i];
                                
                var rsulatlng = coordtransform.wgs84togcj02(rsuobj.rsulng, rsuobj.rsulat);
                rsulatlng = coordtransform.gcj02tobd09(rsulatlng[0], rsulatlng[1]);   
                let pt = new BMapGL.Point(rsulatlng[0], rsulatlng[1]);
                var marker = new BMapGL.Marker(pt, {
                    icon: rsuIcon,
                    offset: new BMapGL.Size(0, -10)
                });
                
                if(rsuobj.score < 80 && rsuobj.score > 0){
                    var label = new BMapGL.Label(rsuobj.devicecode + " <a href='devices' target='_blank'>" + getRsuScoreStr(rsuobj.score) + "</a>", {       // 创建文本标注
                        position: pt,                          // 设置标注的地理位置
                        offset: new BMapGL.Size(-60, 20)           // 设置标注的偏移量
                    })    
                    label.setStyle({border: "1px solid rgb(230 230 230)", backgroundColor: "#aa000000", borderRadius: "3px", padding: "6px"});
                    marker.setLabel(label); 
                    marker.setIcon(rsuErrorIcon);
                }
                marker.setTitle(rsuobj.devicecode);
                rsumarkers.push(marker);
                
                // 创建信息窗口
                var opts = {
                    width: 200,
                    height: 30,
                    title: 'RSU'
                };
                let infoWindow = new BMapGL.InfoWindow(rsuobj.devicecode, opts);                  
                
                marker.addEventListener('click', function () {
                    map.openInfoWindow(infoWindow, pt); // 开启信息窗口  
                });
                // 将标注添加到地图
                map.addOverlay(marker);
            }
            
            for(var i = 0; i < data.obudevices.length; i++){
                obuobj = data.obudevices[i];
                if (obuobj.obulongtitude === 0 || obuobj.obulatitude === 0){
                    continue;
                }
                var nowdate = new Date();
                var obuposdate = new Date(obuobj.positiontime);
                if (nowdate - obuposdate > 10000){
                    continue;
                }
              
                var latlng = coordtransform.wgs84togcj02(obuobj.obulongtitude, obuobj.obulatitude);
                latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
                var pt = new BMapGL.Point(latlng[0], latlng[1]);
                var marker = new BMapGL.Marker(pt, {
                    icon: obuIcon
                });
                obumarkers.push(marker);
                marker.setRotation(obuobj.obudirection);
                // 将标注添加到地图
                map.addOverlay(marker);                
            }
            
            for(var i = 0; i < data.radars.length; i++){
                radarobj = data.radars[i];
                
                var latlng = coordtransform.wgs84togcj02(radarobj.lng, radarobj.lat);
                latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
                var pt = new BMapGL.Point(latlng[0], latlng[1]); 
                
                var lanestatestr = "";
                var lanestatecolor = "#0fb904"
                if(radarobj.lanestate === "jam"){
                    lanestatestr = "拥挤";
                    lanestatecolor = "#d16363";
                } else if(radarobj.lanestate === "blocking"){
                    lanestatestr = "堵塞";
                    lanestatecolor = "#9947c3";
                } else {
                    lanestatestr = "畅通";
                }
                lanestatestr =  "<font color='" + lanestatecolor + "'>" + lanestatestr + "</font>";  
                var labelstr = "平均车速：" + Math.round(radarobj.avgspeed) + "km/h<br/>"
                            + "车头间距：" + radarobj.spaceheadway + " 米<br/>车头时距：" 
                            + radarobj.timeheadway + " 秒<br/>车道状态：" + lanestatestr;
                
                var radarYoffset = -10;
                var labelYoffset = -110;
                if(radarobj.devicecode === 'LS00114' || radarobj.devicecode === 'LS00111'){
                    radarYoffset = 90;
                    labelYoffset = 100;
                }                
                
                var marker = radarDeviceMap.get(radarobj.id);
                if(marker === null){
                    marker = new BMapGL.Marker(pt, {
                        icon: radarIcon,
                        offset: new BMapGL.Size(0, radarYoffset)
                    });
                    
                    var label = new BMapGL.Label(labelstr, {       // 创建文本标注
                        position: pt,                          // 设置标注的地理位置
                        offset: new BMapGL.Size(-60, labelYoffset)           // 设置标注的偏移量
                    })    
                    label.setStyle({border: "2px dotted #ffffff", backgroundColor: "#aa000000", borderRadius: "3px", padding: "6px", color: "#ef7d65"});
                    label.enableMassClear();
//                    radarLabels.push(label);
                    marker.setLabel(label);                      
                } else {
//                    alert(labelstr);
                    marker.getLabel().setContent(labelstr);
                }
                
                marker.setTitle(radarobj.devicecode);
                radarDeviceMap.put(radarobj.id, marker);
//                radarmarkers.push(marker);
                // 将标注添加到地图
                map.addOverlay(marker);
            }            
            
            for(var i = 0; i < data.warnings.length; i++){
                warnobj = data.warnings[i];
                
                var latlng = coordtransform.wgs84togcj02(warnobj.startlng, warnobj.startlat);
                latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
                let pt = new BMapGL.Point(latlng[0], latlng[1]);
                var marker = new BMapGL.Marker(pt, {
                    icon: alertStartIcon
                });
                warningmarkers.push(marker);
                
                var label = new BMapGL.Label("此处发生 <font color='#d77f43'>" + warnobj.winame + "</font>", {       // 创建文本标注
                    position: pt,                          // 设置标注的地理位置
                    offset: new BMapGL.Size(-60, -60)           // 设置标注的偏移量
                })    
                label.setStyle({border: "1px solid rgb(230 230 230)", backgroundColor: "#aa000000", borderRadius: "3px", padding: "6px"});
                marker.setLabel(label);
                
                // 创建信息窗口
                var opts = {
                    title: ''
                };
                var infoWindow = new BMapGL.InfoWindow("此处发生 <font color='white'>" + warnobj.winame + "</font>", opts);
                infoWindow.addEventListener("open", function(){
                    infowindowobjs = document.getElementsByClassName("BMap_bubble_pop");
                    //alert(infowindowobjs.length);
                    for(var j = 0; j < infowindowobjs.length; j++){
                        infowindowobjs[j].style.backgroundColor  = "#aa000000";
//                        infowindowobjs[j].style.width = "100px";
//                        infowindowobjs[j].style.height = "80px";
                        infowindowobjs[j].style.border = "1px solid #7fb738";
                        
                        imgobjs = infowindowobjs[j].getElementsByTagName("img");
                        for(var k = 0; k < imgobjs.length; k++){
                            imgobjs[k].src = "images/dashboard/iw_tail.png";
                        }
                    }
                    
                    infocontentobjs = document.getElementsByClassName("BMap_bubble_content");
                    for(var j = 0; j < infocontentobjs.length; j++){
                        infocontentobjs[j].style.color = "#ffffff";
                    }                  
                });
                //map.openInfoWindow(infoWindow, pt); // 开启信息窗口  
                marker.addEventListener('click', function () {
                    
                });                
                // 将标注添加到地图
                map.addOverlay(marker);
            }            
            setTimeout('updateBdMapSummary()', 10000);    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            setTimeout('updateBdMapSummary()', 10000);
        }
    });
}
updateBdMapSummary();
</script>


<script>
function updateAidEvents(){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "GET",
        url: "homeaidevents",
        dataType: "json",
        success: function (data) {
            var tbl = document.getElementById("tblAidEvents");
            var rows = tbl.rows; //获取表格的行数

            for (var i = rows.length - 1; i > 0 ; i--) {
               tbl.deleteRow(i);    
            }

            var maxid = Math.min(17, data["aidevents"].length);
            for(var i=0;i<maxid;i++){
               var tr=tbl.insertRow(i+1);
               tr.className = "tr_content";
                           //添加单元格
               var cell0=tr.insertCell(0);
               cell0.innerHTML = data["aidevents"][i]["plate"];
               var cell1=tr.insertCell(1);
               cell1.innerHTML=hkEvent2Str(data["aidevents"][i]["aidevent"]);
               var cell2=tr.insertCell(2);
               cell2.style.textAlign="right";
               var eventtime = data["aidevents"][i]["eventtime"];
               cell2.innerHTML=eventtime.substr(11, 8); 
            }
            
            setTimeout('updateAidEvents()', 5000);    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            setTimeout('updateAidEvents()', 5000);    
        }
    });    
} 
updateAidEvents();
    
function updateHomeSummary(){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "homedatasummary",
        dataType: "json",
        success: function (data) {
            $('#vehflow').html("<a href='anprevents' target='_blank'><font color='#26d0ff'>" + data[0].vehflowcount + "辆</font></a>");
            $('#aidcount').html("<a href='aidevents' target='_blank'><font color='#26d0ff'>" + data[0].aidcount + "个</font></a>");
            $('#warncount').html("<a href='warninginfo' target='_blank'><font color='#26d0ff'>" + data[0].warncount + "个</font></a>");
            $('#obuwarningcount').html("<a href='warningrecordstat' target='_blank'><font color='#26d0ff'>" + data[0].warnrecordcount + "次</font></a>");
            
            setTimeout('updateHomeSummary()', 5000);    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            setTimeout('updateHomeSummary()', 10000);    
        }
    });
}
updateHomeSummary();
</script>


<script>
//video视频播放完成的事件
function onVideoEnded(obuid) {
    var aud = document.getElementById('video' + obuid);
    aud.src = "getnewobuvideo?obuid=" + obuid;
};    
</script>
@endsection