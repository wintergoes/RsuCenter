<!DOCTYPE html>
<html class="color-header headercolor1">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
        <script src="assets/js/jquery.min.js"></script>
        
        <link href="assets/plugins/highchart_10_0_0/css/highcharts.css" rel="stylesheet" />
        
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
        <script src="js/zlzl.js"></script>
        <script src="js/hikvision.js"></script>
        
        <script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>   
        
	<!-- highcharts js -->
	<script src="assets/plugins/highchart_10_0_0/highcharts.js"></script>
	<script src="assets/plugins/highchart_10_0_0/highcharts-more.js"></script>
	<script src="assets/plugins/highchart_10_0_0/modules/variable-pie.js"></script>
	<script src="assets/plugins/highchart_10_0_0/modules/solid-gauge.js"></script>
	<script src="assets/plugins/highchart_10_0_0/highcharts-3d.js"></script>
	<script src="assets/plugins/highchart_10_0_0/modules/cylinder.js"></script>
	<script src="assets/plugins/highchart_10_0_0/modules/funnel3d.js"></script>
	<script src="assets/plugins/highchart_10_0_0/modules/exporting.js"></script>
	<script src="assets/plugins/highchart_10_0_0/modules/export-data.js"></script>
	<script src="assets/plugins/highchart_10_0_0/modules/accessibility.js"></script>
        <script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script> 
        
        <script type="text/javascript" src="js/coordtransform.js"></script>
        <script src="js/obubdmapstyle.js"></script>
	<title>车路协同V2X智能云控平台</title>
        
    <style type="text/css">
        html,body {
            height: 100%;
            width:100%;
            color: white;
            font-size: 20px;
        }
        
        .item_container{
            padding: 20px;
            font-size: 20px;
        }
        
        .item_title_suffix{
            margin-left: 10px;
        }
        
        .item_subtitle{
            width: 100%;
            height: 36px;
            padding-top: 5px;
            background: url('images/dashboard/subtitle_background.png') no-repeat; 
            background-size:100% 100%;
            text-align: center;
            font-size: 16px;
        }
        
        .item_sub_div{
            padding: 8px;
            width: 50%;
            height: 90%;
            float: left;
        }
        
        table{
            text-align: center;
            font-size: 10px;
            width: 100%;
            margin-top: 6px;
        }
        
        thead{
            font-size: 10px;
            height: 30px;
            background-color: #0E3E5D;
        }
        
        tr{
           height: 36px; 
        }
        
        .tr_realtime_vehicle{
            /*background-color: #0B2F49;*/
            font-weight: lighter;  
            height: 30px;
        } 
        
        .tr_realtime_count_stat_row{
            /*background-color: #0B2F49;*/
            margin-left: 6dp;
            text-align: left;
            font-weight: lighter;  
            height: 40px;
        }         
        
        .tr_content{
            background-color: #0B2F49;
            font-weight: lighter;  
        }
        
        .forecast_tbl{
            background-color: transparent;
            font-size: 15px;
            margin: 12px 10px;
            /*height: 60px;*/
            width: 700px;
            position: absolute;
            right: 0px;
        }
        
        .forecast_tbl tbody{
            background-color: transparent;
        }
        
        .forecast_tbl tbody td{
            width: 80px;
/*            padding-left: 6px;
            padding-right: 6px;*/
        }        
        
        .forecast_tbl img{
            width: 30px;;
            height: 22px;
        }

        .stat_button{
            float: left;
            margin-left: 6px;
            width: 50px;
            text-align: center;
            padding-top: 6px;
            height: 30px;
            font-size: 12px;
            background: url('images/dashboard/stat_button_normal.png') no-repeat;
            background-size: 100% 100%;
        }
        
        .stat_button_active{
            float: left;
            margin-left: 6px;
            width: 50px;
            text-align: center;
            padding-top: 6px;
            height: 30px;
            font-size: 12px;
            background: url('images/dashboard/stat_button_selected.png') no-repeat;
            background-size: 100% 100%;            
        }
        
        #dashboard_title {
            width: 100%; 
            height: 98px; 
            z-index: 2; 
            position: absolute;
            font-size: 36px; 
            color: white; 
            /*text-align: center;*/ 
            background: url('images/dashboard/obu_title_background.png') repeat-x center; 
    
            padding-left: 10px;
            padding-top: 6px;
        }
        
        .video_text {
            text-align: center;
            margin-top: 6px;
        }
        
        .BMap_bubble_pop{
            border: 0px;
            background-color: rgba(0, 0, 0, 0);
            color: #ffffff;
        }
        
        .summary_stat_title_td{
            vertical-align: bottom;
        }
        
        .summary_stat_value_td{
            vertical-align: top;
            font-size: 30px;
            font-family: "Verdana";
            font-weight: bold;
        }
        
        #tbl_vehicles{
            text-align: left;
            font-size: 15px;
        }
        
        .td_right{
            text-align: right;
        }
        
        .obu_vehicle_title{
            font-size: 15px;
            font-weight: bold;
            font-color: #000000;
        }
        
        .left_nav_menu_item{
            font-size: 12px;
            text-align: center;
            padding: 6px;
            width: 30px;
            background-image: url('images/dashboard/left_nav_menu_item_bkg.png');
        }
        
        
        .route_data_td {
            text-align: left;
        }
    </style>        
</head>

<script>
function showHistoryRoute(){
    document.getElementById("left_nav_history_route").style.display = '';
}

function hideHistoryRoute(){
    document.getElementById("left_nav_history_route").style.display = 'none';
}
</script>

<body style="width: 100%; height: 100%">
<div id='dashboard_left' style="position:relative;width: 100%; height: 100%; ">
    <div id="bdmap_container" style="width: 100%; height: 100% ;position: absolute;">dmg</div>
    <div id="left_nav_menu" style="position: absolute; z-index: 130; top: 100px;">
        <div class="left_nav_menu_item"  style="cursor: pointer;" onclick="showHistoryRoute();">历史轨迹</div>
    </div>
    <div id="left_nav_history_route" style="position: absolute; z-index: 131; left:6px; top: 80px; width: 300px; height: 88%;
         background: #eeeeee; color: #000000; font-size: 16px; padding: 15px; display: none; border: 3px solid #cccccc; border-radius: 6px;">
        <div style="margin-bottom: 20px;">
            <table>
                <tr>
                    <td style="font-size: 23px; text-align: left;">历史轨迹查询</td>
                    <td style=" cursor: pointer;" onclick="hideHistoryRoute();">X</td>
                </tr>
            </table>
        </div>
        <table style="text-align: left;">
            <tr>
                <td>选择车辆</td>
                <td>
                    <select class="form-control">
                        <option>鲁B12345</option>
                        <option>鲁B12345</option>
                        <option>鲁B12345</option>
                        <option>鲁B12345</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>开始日期</td>
                <td><input name="fromdate" id="fromdate" class="form-control" value="2023-08-01" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="9" /></td>
            </tr>
            <tr>
                <td>结束日期</td>
                <td><input name="todate" id="fromdate" class="form-control" value="2023-08-01" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="9" /></td>
            </tr> 
            <tr>
                <td></td>
                <td style="text-align: right;"><button type="button" class="btn btn-outline-primary px-2" value="" >查询</button></td>
            </tr>             
        </table>
        
        
        
        <div style="display: v; margin-top: 10px;" id="route_data">
            <table>
                <tr>
                    <td class="route_data_td">开始：2023-07-01 10:00:33</td>
                    <td rowspan="2"><a href="#" onclick="replayRoute();">轨迹回放</a></td>
                </tr>
                <tr>
                    <td class="route_data_td">结束：2023-07-01 10:00:33</td>
                </tr>
                
                <tr>
                    <td class="route_data_td">开始：2023-07-02 10:00:33</td>
                    <td rowspan="2"><a href="#" onclick="replayRoute();">轨迹回放</a></td>
                </tr>
                <tr>
                    <td class="route_data_td">结束：2023-07-02 10:00:33</td>
                </tr>

                <tr>
                    <td class="route_data_td">开始：2023-07-03 10:00:33</td>
                    <td rowspan="2"><a href="#" onclick="replayRoute();">轨迹回放</a></td>
                </tr>
                <tr>
                    <td class="route_data_td">结束：2023-07-03 10:00:33</td>
                </tr>

                <tr>
                    <td class="route_data_td">开始：2023-07-04 10:00:33</td>
                    <td rowspan="2"><a href="#" onclick="replayRoute();">轨迹回放</a></td>
                </tr>
                <tr>
                    <td class="route_data_td">结束：2023-07-04 10:00:33</td>
                </tr>

                <tr>
                    <td class="route_data_td">开始：2023-07-05 10:00:33</td>
                    <td rowspan="2"><a href="#" onclick="replayRoute();">轨迹回放</a></td>
                </tr>
                <tr>
                    <td class="route_data_td">结束：2023-07-05 10:00:33</td>
                </tr>                
            </table>
        </div>
    </div>
    <div id="dashboard_title" style="z-index: 100;">
        <div style="float: left;"><img src="images/dashboard/obu_dashboard_title.png"></div>
        <div>
                             <table class="forecast_tbl">
                                 <tr>
                                     <td style="width: 120px;"><span id='datespan'></span></td>   
                                     <td><span id='weekday'>星期四</span> <img width="32" height="32" id="weathericon" src="images/dashboard/sunshine.png"></td>
                                     <td><img src="images/dashboard/wendu.png"/><br><span id="forecast_temperature">温度 -</span></td>
                                     <td><img src="images/dashboard/shidu.png"/><br><span id="forecast_humidity">湿度 -</span></td>
                                     <td><img src="images/dashboard/fengli.png"/><br><span id="forecast_windpower">风力 -</span></td>
                                     <td><img src="images/dashboard/fengxiang.png"/><br><span id="forecast_winddirection">风向 -</span></td>
                                 </tr>                    
                             </table>
            </div>
    </div>
<!--    <div id="mask_layer" style="width: 100%; height: 100%;  position: absolute; opacity: 0.5; background: url('images/dashboard/background.png') repeat">
        <img style="width: 100%; height: 100%; object-fit: fill;" src="images/dashboard/background.png"/>
    </div>-->

    <div style='z-index: 10; position: absolute; left: 0px; bottom: 0px; '>

    </div>
</div>
    
            <div class="modal fade" id="obuVehicleInfoModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" >
                            <div class="modal-content bg-light" >
                                <div class="card radius-6 border-1 border-grey111111">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 card-title" id="map_title">
                                                    <i class="bx bx-info-circle">
                                                    </i>
                                                    OBU00001 - 鲁B12345
                                                </h6>
                                            </div> 
                                        </div>
                                        <div class="col-sm-12" id="" style="height: 360px;">
                                            <table style="color: black; text-align: left;">
                                                <tr>
                                                    <td class="obu_vehicle_title">实时视频</td>
                                                    <td width="50px"></td>
                                                    <td class="obu_vehicle_title">车辆状态</td>
                                                </tr>                                                
                                                <tr>
                                                    <td width="300px">
                                                        <video muted="muted"  id='obu_video_000' width="500px" loop="loop">
                                                            <source src="video_230705194050.3gp" type="video/mp4" >
                                                        </video>                                                        
                                                    </td>
                                                    <td ></td>
                                                    <td style="text-align: left;  vertical-align: top;">
                                                        <table>
                                                            <tr>
                                                                <td style="text-align: left;">实时车速：</td>
                                                                <td>36km/h</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: left;">平均车速：</td>
                                                                <td>30km/h</td>
                                                            </tr>   
                                                            <tr>
                                                                <td style="text-align: left;">打卡时间：</td>
                                                                <td>10:23:00</td>
                                                            </tr>   
                                                            <tr>
                                                                <td style="text-align: left;">运行时长：</td>
                                                                <td>1h30min</td>
                                                            </tr>                                                               
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>    
    
<script>
var radarVideoMap = new HashMap();
</script>
    

<script>
var map = new BMapGL.Map("bdmap_container", {
   coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                 // 指定完成后API将以指定的坐标类型处理您传入的坐标
});          // 创建地图实例  
var point = new BMapGL.Point({{$default_lng}}, {{$default_lat}});  // 创建点坐标  
map.centerAndZoom(point, {{$default_zoom}});                 // 初始化地图，设置中心点坐标和地图级别 
map.setMinZoom(6);
map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
//map.setMapType(BMAP_EARTH_MAP);      // 设置地图类型为地球模式

map.setMapStyleV2({     
  styleJson: stylejson
});
    
var rsuIcon = new BMapGL.Icon("/images/dashboard/rsu_device.png", new BMapGL.Size(24, 24));
var rsuErrorIcon = new BMapGL.Icon("/images/dashboard/rsu_device_error.png", new BMapGL.Size(24, 24));
var obuIcon = new BMapGL.Icon("/images/circle_white_border.png", new BMapGL.Size(18, 18));
var radarIcon = new BMapGL.Icon("/images/dashboard/radarvision.png", new BMapGL.Size(24, 24));
var radarRightIcon = new BMapGL.Icon("/images/dashboard/radarvision_right.png", new BMapGL.Size(24, 24));
var alertStartIcon = new BMapGL.Icon("/images/obu_alertstart.png", new BMapGL.Size(24, 24));
var alertStopIcon = new BMapGL.Icon("/images/alertstop.png", new BMapGL.Size(24, 24));
var maxspeedIcon = new BMapGL.Icon("/images/dashboard/maxspeed.png", new BMapGL.Size(32, 32));

var rsumarkers = [];
var obumarkers = [];
var warningmarkers = []
var rotatemarkers = []
var radarmarkers = [];
var radarLabels = [];
var radarDeviceMap = new HashMap();
    
function updateBdMapSummary(){
    $.ajax({
        type: "GET",
        url: "dashboardbdmapsummary",
        dataType: "json",
        success: function (data) {
            setTimeout('updateBdMapSummary()', 60000); 
            while(rsumarkers.length > 0){
                tmpRsuMaker = rsumarkers.pop();
                map.removeOverlay(tmpRsuMaker);
            } 
            
            while(obumarkers.length > 0){
                tmpObuMaker = obumarkers.pop();
                map.removeOverlay(tmpObuMaker);
            }            
            
            while(warningmarkers.length > 0){
                tmpWarnMaker = warningmarkers.pop();
                map.removeOverlay(tmpWarnMaker);
            }

            while(radarLabels.length > 0){
                tmpRadarLabel = radarLabels.pop();
                tmpRadarLabel.setContent("");
                map.removeOverlay(tmpRadarLabel);
            }
            
            while(radarmarkers.length > 0){
                tmpradar = radarmarkers.pop();
                map.removeOverlay(tmpradar);
            }
            
            //map.clearOverlays();
            for(var i = 0; i < data.rsudevices.length; i++){
                rsuobj = data.rsudevices[i];
                
                var rsulatlng = coordtransform.wgs84togcj02(rsuobj.rsulng, rsuobj.rsulat - 0.0006);
                rsulatlng = coordtransform.gcj02tobd09(rsulatlng[0], rsulatlng[1]);                 
                let pt = new BMapGL.Point(rsulatlng[0], rsulatlng[1]);
                var marker = new BMapGL.Marker(pt, {
                    icon: rsuIcon,
                    offset: new BMapGL.Size(0, -10)
                });
                
                if(rsuobj.score < 80){
                    var label = new BMapGL.Label(rsuobj.devicecode , {       // 创建文本标注
                        position: pt,                          // 设置标注的地理位置
                        offset: new BMapGL.Size(-40, 0)           // 设置标注的偏移量
                    })    
                    label.setStyle({border: "1px solid rgb(75 139 88)", backgroundColor: "#aa000000", borderRadius: "3px", padding: "6px"});
                    marker.setLabel(label); 
                    marker.setIcon(rsuErrorIcon);
                } else {
                    var label = new BMapGL.Label(rsuobj.devicecode, {       // 创建文本标注
                        position: pt,                          // 设置标注的地理位置
                        offset: new BMapGL.Size(-40, 0)           // 设置标注的偏移量
                    })    
                    label.setStyle({border: "1px solid rgb(75 139 88)", backgroundColor: "#aa000000", borderRadius: "3px", padding: "6px"});
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
                
                var radarYoffset = -10;
                var radarXoffset = 0;
                var labelYoffset = -110;
                if(radarobj.devicecode === 'LS00115' || radarobj.devicecode === 'LS00112'){
                    radarXoffset = 30;
                }
                var marker = radarDeviceMap.get(radarobj.id);
                if(marker === null){
                    if(radarobj.devicecode === 'LS00112' || radarobj.devicecode === 'LS00115'){
                        marker = new BMapGL.Marker(pt, {
                            icon: radarRightIcon,
                            offset: new BMapGL.Size(radarXoffset, radarYoffset)
                        });                         
                    } else {
                        marker = new BMapGL.Marker(pt, {
                            icon: radarIcon,
                            offset: new BMapGL.Size(radarXoffset, radarYoffset)
                        }); 
                    }
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
                label.setStyle({border: "1px solid rgb(75 139 88)", backgroundColor: "#aa000000", borderRadius: "3px", padding: "6px"});
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
                
                marker.addEventListener('click', function () {
                    
                });                
                // 将标注添加到地图
                map.addOverlay(marker);
            }              
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            setTimeout('updateBdMapSummary()', 60000);    
        }
    });
}


function rotateMarker(){
    for(var i = 0; i < warningmarkers.length; i++){
        warningmarkers[i].setRotation(warningmarkers[i].getRotation() + 15);
    }
    
    for(var i = 0; i < rotatemarkers.length; i++){
        rotatemarkers[i].setRotation(rotatemarkers[i].getRotation() + 15);
    }    
    
    setTimeout("rotateMarker()", 200);
}
rotateMarker();
</script>


<!--事件统计-->
<script>

$(window).on('resize',function(){
    resizePage();
    //alert(window.innerWidth);
});

function resizePage(){
    $("#dashboard_left").width(window.innerWidth);
}

resizePage();
</script>

<script>
function getWeekDay() { 
    var myDate= new Date(); 
    var str = ''; 
     
    var Week = ['日','一','二','三','四','五','六']; 
    str += ' 星期' + Week[myDate.getDay()]; 
    
    $('#weekday').text(str);
} 

function showDate() { 
    var myDate= new Date(); 
    //var str = myDate.toLocaleDateString(); 
    
    year = myDate.getFullYear(), //获取完整的年份(4位)
    month = myDate.getMonth() + 1, //获取当前月份(0-11,0代表1月)
    strDate = myDate.getDate() // 获取当前日(1-31)
    if (month >= 1 && month <= 9) month = '0' + month // 如果月份是个位数，在前面补0
    if (strDate >= 0 && strDate <= 9) strDate = '0' + strDate // 如果日是个位数，在前面补0
 
    let currentdate = `${year} 年 ${month} 月 ${strDate} 日`    
    
    $('#datespan').text(currentdate);
}

function hideBd(){
    var el = [],
    _el = document.getElementsByClassName('anchorBL');
    for (var i=0; i<_el.length; i++ ) {
        _el[i].style.display = "none";
    }    
}

var coords = [];
var coordindex = 0;
var carIcon = new BMapGL.Icon("/images/caricon_white.png", new BMapGL.Size(16, 16));
var humanIcon = new BMapGL.Icon("/images/human_icon.png", new BMapGL.Size(24, 24));
var carmaker;
function showTestVehs(){
    if(coords.length === 0){
        $.getJSON("dashboardtestlatlng",function(data){
            coords = data["coords"];            
            setTimeout("showTestVehs()", 1000);
        });
        return;
    }
    
//    alert(coords[coordindex]["lng"] + "  " + coords[coordindex]["lat"]);
    var latlng = coordtransform.wgs84togcj02(coords[coordindex]["lng"], coords[coordindex]["lat"]);
    latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
    var pt = new BMapGL.Point(latlng[0], latlng[1]);
    //$("#test").html(pt.lat + "   " + pt.lng);

    if(carmaker){
        map.removeOverlay(carmaker);
        //carmaker.setTitle("car" + coordindex);
        //carmaker.setPosition(pt);
    } 
    carmaker = new BMapGL.Marker(pt, {
        icon: carIcon
    });

    // 将标注添加到地图
    map.addOverlay(carmaker); 
    
    coordindex = coordindex + 5;
    if(coordindex + 1 <= coords.length - 1){
        var radian = Math.atan2(coords[coordindex+1]["lng"] - coords[coordindex]["lng"], coords[coordindex+1]["lat"] - coords[coordindex]["lat"]);
        var angle = 180 / Math.PI * radian;
        carmaker.setRotation(angle);
    }
    //alert(coordindex);
    
    if(coordindex > coords.length - 1){
        coordindex = 0;
    }
    
    setTimeout("showTestVehs()", 1000);
}

function Vehicle(uuid, plateno, targetid, targettype, speed, laneno, lng, lat, detecttime, positiony, id, radarcode){
    this.uuid = uuid;
    this.plateno = plateno;
    this.targetid = targetid;
    this.targettype = targettype;
    this.speed = speed;
    this.laneno = laneno;
    this.lat = lat;
    this.lng = lng;
    this.detecttime = detecttime;
    this.positiony = positiony;
    this.dbid = id;
    this.radarcode = radarcode;
    
    this.setMarker = function(marker){
        this.marker = marker;
    }
    
    this.updateData = function(uuid, plateno, targetid, targettype, speed, laneno, lng, lat, detecttime, positiony, id){
        this.uuid = uuid;
        this.plateno = plateno;
        this.targetid = targetid;
        this.targettype = targettype;
        this.speed = speed;
        this.laneno = laneno;
        this.lat = lat;
        this.lng = lng;
        this.detecttime = detecttime;
        this.positiony = positiony;
        this.dbid = id;        
    }
}

function RadarMacObj(macaddr){
    this.macaddr = macaddr;
    this.borderColor = " rgb(255 255 255) ";
    
    this.setBorderColor = function(bcolor){
        this.borderColor = bcolor;
    } 
}

//var vehmarkers = [];
var vehMap = new HashMap();
var radarMacMap = new HashMap();
var borderColors = ['#6aa3fa', '#f2ae49', '#ac83e3', '#71ca88', '#ef7d65', '#62cffa', '#f1cc47', '#b359df', '#d9d7d8', '#70e7cb'];
function showVehicles(){   
    $.getJSON("realtimevehicles.html?t=" + Math.round(new Date()),function(data){
        for(var i = 0; i < data["vehicles"].length; i++){
            var radarMac = radarMacMap.get(data["vehicles"][i]["macaddr"]);
            if(radarMac === null){
                radarMac = new RadarMacObj(data["vehicles"][i]["macaddr"]);
                radarMacMap.put(data["vehicles"][i]["macaddr"], radarMac);
                
                if(radarMacMap.size() <= borderColors.length){
                    radarMac.setBorderColor(borderColors[radarMacMap.size() - 1]);
//                    radarMac.setBorderColor(" rgb(255 255 255)");
                } else {
                    radarMac.setBorderColor(" rgb(255 255 255)");
                }
            }
            
            var vehuuid = data["vehicles"][i]["uuid"];
            var vehrotation = data["vehicles"][i]["vehrotation"];
            //alert(vehuuid);
            var veh = vehMap.get(vehuuid);
            //alert(veh);
            if(veh === null){
                //alert("a");
                var veh = new Vehicle(data["vehicles"][i]["uuid"], data["vehicles"][i]["plateno"], data["vehicles"][i]["targetid"], 
                    data["vehicles"][i]["targettype"], data["vehicles"][i]["speed"], data["vehicles"][i]["laneno"],
                    data["vehicles"][i]["longitude"], data["vehicles"][i]["latitude"], data["vehicles"][i]["detecttime"],
                    data["vehicles"][i]["positiony"], data["vehicles"][i]["id"], data["vehicles"][i]["devicecode"]);                 
                
                vehMap.put(vehuuid, veh);
                //alert(veh.lng + "  " + veh.lat);
                var latlng = coordtransform.wgs84togcj02(veh.lng, veh.lat);
                latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
                var pt = new BMapGL.Point(latlng[0], latlng[1]); 
                //$("#test").html(data["vehicles"][i]["longitude"] + "  "  + data["vehicles"][i]["latitude"]);

                var icon ;
                if(veh.targettype === "vehicle"){
                    mkicon = carIcon;
                } else {
                    mkicon = humanIcon;
                }
                var carmaker = new BMapGL.Marker(pt, {
                    icon: mkicon
                });  
                carmaker.setRotation(vehrotation);
                carmaker.setTitle(veh.targetid);
                veh.setMarker(carmaker);
                
                var labeltext = "";
                
                if(getQueryVariable("showpositiony") === "1"){    
                    labeltext = "positionY: " + veh.positiony;                    
                } 

                if(getQueryVariable("showvehiclelabel") === "1"){
                    labeltext = veh.plateno + " id: " + veh.targetid
                        + " speed:" + veh.speed + " lane: " + veh.laneno 
                        + " lat:" + veh.lat + " lng: " + veh.lng + " positionY: " + veh.positiony
                        + " id: " + veh.dbid;
                }

                if(getQueryVariable("showpositiony") === "1" || getQueryVariable("showvehiclelabel") === "1") {
                    var label = new BMapGL.Label(labeltext, {       // 创建文本标注
                        position: pt,                          // 设置标注的地理位置
                        offset: new BMapGL.Size(-60, -60)           // 设置标注的偏移量
                    })    
                    label.setStyle({border: "1px solid " + radarMac.borderColor, backgroundColor: "#aa000000", borderRadius: "3px", padding: "6px"});
                    carmaker.setLabel(label);                    
                }

                map.addOverlay(carmaker); 
//                vehmarkers.push(carmaker); 
            } else {
                //alert(veh.lng + "  " + veh.lat);
                veh.updateData(data["vehicles"][i]["uuid"], data["vehicles"][i]["plateno"], data["vehicles"][i]["targetid"], 
                    data["vehicles"][i]["targettype"], data["vehicles"][i]["speed"], data["vehicles"][i]["laneno"],
                    data["vehicles"][i]["longitude"], data["vehicles"][i]["latitude"], data["vehicles"][i]["detecttime"],
                    data["vehicles"][i]["positiony"], data["vehicles"][i]["id"]);
                
                var latlng = coordtransform.wgs84togcj02(veh.lng, veh.lat);
                latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
                var pt = new BMapGL.Point(latlng[0], latlng[1]);
                
                if(getQueryVariable("showvehiclelabel") === "1"){
                    var labeltext = veh.plateno + " id: " + veh.targetid
                        + " speed:" + veh.speed + " lane: " + veh.laneno 
                        + " lat:" + veh.lat + " lng: " + veh.lng + ", positionY: " + veh.positiony
                        + " id: " + veh.dbid;
                    veh.marker.getLabel().setContent(labeltext);
                }
                
                if(getQueryVariable("showpositiony") === "1"){
                    var labeltext = "positionY: " + veh.positiony;
                    veh.marker.getLabel().setContent(labeltext);                    
                }
                
                veh.marker.setPosition(pt);
                veh.marker.setTitle(data["vehicles"][i]["targetid"]);
                veh.marker.setRotation(vehrotation);
            }
        }
        
        var nowdate = new Date();
        for(var i = vehMap.values().length - 1; i >= 0 ; i--){
            if(vehMap.values()[i].radarcode === "LS00110"){
//               console.log(vehMap.values()[i].uuid + "," + vehMap.values()[i].detecttime + ", " + nowdate);
            }
            
            var timecha = nowdate.getTime() - new Date(vehMap.values()[i].detecttime).getTime();
            if(timecha > 3  * 1000){
                map.removeOverlay(vehMap.values()[i].marker);
                vehMap.remove(vehMap.values()[i].uuid);
            }
            $("#test").html(nowdate);
        }
        setTimeout("showVehicles()", 500);
    }).fail( function(d,textStatus,error) {
        setTimeout("showVehicles()", 500);
        console.error("getJSON Failed,status: " + textStatus + ",error: "+error)
    }); 
}

function updateForecast(){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "GET",
        url: "dashboardforecast",
        dataType: "json",
        success: function (data) {
            if(data.forecast.weathercode !== ""){
                $('#weathericon').attr("src", "images/fushutianqi/" + data.forecast.weathercode + ".png");
            }
            $('#forecast_temperature').html("<span title = '" + data.forecast.created_at + "'>温度 " + data.forecast.temperature + "°C</span>"); 
            $('#forecast_humidity').text("湿度 " + data.forecast.humidity + "%");  
            $('#forecast_windpower').text("风力 " + data.forecast.windpower + "级");  
            $('#forecast_winddirection').text("风向 " + data.forecast.winddirection);  
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            
        }
    });    
}

//const canvas = document.querySelector('#radar_canvas');
//const ctx = canvas.getContext('2d');
function drawCircle() {
    var canvasw = canvas.style.width;
    var canvash = canvas.style.height;
    
    $.getJSON("dashboardradarvision",function(data){
        var widthstr = data["radar"]["lanewidth"];
        var widths = widthstr.split(",");
        lanewidth = 0;
        for(var i = 0; i < widths.length; i++){
            lanewidth = lanewidth + parseFloat(widths[i]);
        }
        lanewidth = lanewidth * 2;
        
        canvasHUnit = lanewidth / canvash ;
    });
}
//drawCircle();
function  getNowTime() {
    var date = new Date();
    this.year = date.getFullYear();
    this.month = date.getMonth() + 1;
    this.date = date.getDate();
    this.hour = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
    this.minute = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
    this.second = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
    this.milliSeconds = date.getMilliseconds();
    var currentTime = this.year+'-'+this.month + '-' + this.date + ' ' + this.hour + ':' + this.minute + ':' + this.second + '.' + this.milliSeconds;
    return currentTime;
};

var obulatlngs = "36.154899,120.364523;36.154899,120.364523;36.1549,120.364523;36.154899,120.364523;36.1549,120.364523;36.1549,120.364522;36.154899,120.364523;36.154899,120.364523;36.154899,120.364523;36.154899,120.364523;36.154899,120.364523;36.154899,120.364523;36.154899,120.364522;36.154899,120.364522;36.154899,120.364521;36.154899,120.364521;36.154899,120.364521;36.154899,120.364521;36.154899,120.364521;36.154899,120.36452;36.154899,120.36452;36.1549,120.36452;36.1549,120.36452;36.1549,120.36452;36.1549,120.36452;36.154899,120.364519;36.1549,120.36452;36.1549,120.364519;36.154898,120.364525;36.154897,120.364527;36.154893,120.364544;36.154892,120.364551;36.154896,120.364562;36.154907,120.364586;36.154922,120.364591;36.154929,120.364598;36.154948,120.364592;36.154961,120.364594;36.154975,120.364575;36.154988,120.364552;36.155001,120.364539;36.155015,120.364514;36.155027,120.364498;36.155059,120.364455;36.155077,120.36443;36.155104,120.364394;36.15513,120.364352;36.155148,120.364325;36.155169,120.364289;36.155192,120.364253;36.155229,120.364201;36.155258,120.364161;36.15529,120.364117;36.155327,120.364065;36.155364,120.364012;36.155395,120.363967;36.155434,120.36391;36.155467,120.363862;36.155508,120.363803;36.155552,120.363744;36.155594,120.363683;36.155634,120.363631;36.15567,120.363581;36.155718,120.363513;36.155763,120.363448;36.155809,120.363386;36.155865,120.363311;36.155908,120.363252;36.155955,120.363188;36.156,120.363127;36.15605,120.363062;36.156096,120.363;36.156157,120.362918;36.156215,120.36284;36.156276,120.362757;36.156335,120.362677;36.156397,120.36259;36.156461,120.362502;36.156522,120.362417;36.156586,120.362323;36.156649,120.362235;36.156717,120.362141;36.156786,120.362046;36.156842,120.36197;36.156912,120.361875;36.156979,120.361782;36.157039,120.361702;36.157096,120.361623;36.157155,120.361541;36.157225,120.361445;36.157298,120.361347;36.157356,120.361263;36.157415,120.361181;36.157476,120.361096;36.157547,120.360996;36.157609,120.36091;36.157681,120.360809;36.157755,120.360708;36.157828,120.360607;36.15789,120.360519;36.157966,120.360416;36.15804,120.360312;36.158103,120.360225;36.158178,120.36012;36.158254,120.360014;36.15833,120.359908;36.158407,120.359799;36.15847,120.359707;36.158547,120.3596;36.158613,120.359513;36.158678,120.359424;36.158757,120.359316;36.158822,120.359226;36.158901,120.359117;36.158967,120.359026;36.159047,120.358915;36.159113,120.358824;36.15919,120.358711;36.159269,120.3586;36.159348,120.358489;36.159416,120.358396;36.159496,120.358285;36.159565,120.358192;36.159645,120.358081;36.159726,120.357968;36.159807,120.357853;36.159875,120.357759;36.159942,120.357665;36.160023,120.357551;36.160096,120.357458;36.160178,120.357344;36.160253,120.357247;36.160322,120.357152;36.160406,120.357036;36.160476,120.35694;36.160562,120.356824;36.160631,120.356724;36.160702,120.356625;36.160788,120.356503;36.160859,120.356404;36.160916,120.356321;36.161016,120.35618;36.16109,120.356075;36.161176,120.355952;36.161253,120.35585;36.161327,120.355747;36.161417,120.355622;36.161508,120.355495;36.161598,120.35537;36.16169,120.355243;36.161766,120.355138;36.161857,120.355007;36.161948,120.35488;36.16204,120.354747;36.162131,120.354616;36.162223,120.354488;36.162321,120.354358;36.162414,120.354229;36.162493,120.35412;36.162571,120.354012;36.162665,120.353882;36.162742,120.353774;36.162835,120.353643;36.162913,120.353533;36.16299,120.353424;36.163083,120.353294;36.163176,120.353163;36.16327,120.353033;36.163348,120.352924;36.163443,120.352795;36.163537,120.352666;36.163631,120.352536;36.163709,120.352429;36.163802,120.352298;36.163893,120.352169;36.163971,120.35206;36.164066,120.351937;36.164139,120.351831;36.164232,120.351702;36.164324,120.351571;36.164416,120.351441;36.164508,120.35131;36.164601,120.35118;36.164679,120.351072;36.164771,120.350945;36.164848,120.350838;36.164939,120.350712;36.165016,120.350605;36.165089,120.350501;36.165179,120.350374;36.165267,120.350247;36.165355,120.350121;36.165444,120.349994;36.165516,120.349888;36.165604,120.34976;36.165688,120.349633;36.165775,120.349506;36.16584,120.349397;36.165925,120.349272;36.165993,120.349164;36.166067,120.349025;36.166148,120.348895;36.166225,120.348765;36.166305,120.348635;36.166368,120.348525;36.166432,120.348417;36.166506,120.348288;36.166582,120.348159;36.166658,120.34803;36.166717,120.347923;36.166791,120.347794;36.166848,120.347687;36.16692,120.347558;36.166989,120.347427;36.167047,120.347322;36.167117,120.347193;36.167176,120.347086;36.167235,120.346979;36.167302,120.346849;36.167371,120.34672;36.167423,120.346607;36.167491,120.346476;36.167549,120.346364;36.167605,120.346253;36.167677,120.346119;36.167746,120.345984;36.167815,120.34585;36.167884,120.345714;36.167941,120.345602;36.168008,120.345465;36.168072,120.345327;36.168138,120.34519;36.168187,120.345075;36.16824,120.344961;36.168287,120.344849;36.168347,120.344713;36.168404,120.344578;36.168453,120.344465;36.168495,120.344351;36.168542,120.344238;36.168595,120.344105;36.168642,120.343992;36.168695,120.343859;36.168737,120.343746;36.168781,120.343634;36.168822,120.343519;36.168865,120.343406;36.168913,120.343267;36.168963,120.343131;36.169002,120.343018;36.169051,120.342882;36.169089,120.342768;36.169129,120.342655;36.169173,120.342519;36.169217,120.342383;36.169255,120.342269;36.169291,120.342157;36.169336,120.342021;36.169372,120.341909;36.169416,120.341773;36.16945,120.341661;36.169486,120.341549;36.169526,120.341415;36.169561,120.341302;36.169598,120.341168;36.169634,120.341033;36.169666,120.34092;36.169695,120.340806;36.169732,120.340672;36.169764,120.340538;36.169801,120.340404;36.16983,120.3403;36.169866,120.340167;36.169895,120.340058;36.169928,120.339928;36.169962,120.339797;36.169989,120.339688;36.170017,120.33958;36.170046,120.33945;36.170077,120.339321;36.170098,120.339214;36.170128,120.339085;36.170153,120.338959;36.170176,120.338854;36.170204,120.338727;36.170228,120.338602;36.17025,120.338496;36.17027,120.338392;36.170295,120.338266;36.170315,120.338163;36.17034,120.338038;36.17036,120.337936;36.170381,120.337814;36.170401,120.33771;36.170416,120.337602;36.170436,120.337498;36.170457,120.337377;36.170478,120.337252;36.170499,120.337126;36.170517,120.337022;36.170536,120.336896;36.170553,120.336792;36.170569,120.336684;36.17059,120.336556;36.170611,120.336428;36.170631,120.336298;36.170652,120.336169;36.170672,120.336036;36.170689,120.335928;36.170709,120.335793;36.170726,120.335681;36.170742,120.335571;36.170763,120.335434;36.17078,120.335323;36.170803,120.335187;36.170821,120.335074;36.170842,120.334935;36.170863,120.334799;36.170881,120.33468;36.170904,120.334538;36.170925,120.334398;36.170948,120.334255;36.170966,120.334137;36.170988,120.33399;36.171011,120.333847;36.171044,120.333671;36.171064,120.333543;36.171088,120.333394;36.171111,120.333234;36.171134,120.333082;36.171158,120.332914;36.171182,120.332749;36.171202,120.332615;36.171224,120.332479;36.171244,120.332345;36.171268,120.332206;36.171289,120.332069;36.171316,120.331901;36.171337,120.331763;36.171363,120.331594;36.171389,120.331427;36.171414,120.331256;36.171431,120.331144;36.171458,120.33094;36.171487,120.330774;36.171508,120.330635;36.171536,120.330472;36.171553,120.330361;36.171579,120.330198;36.171605,120.330032;36.17163,120.32987;36.171651,120.329734;36.171677,120.329569;36.1717,120.329404;36.171721,120.329267;36.171747,120.329104;36.171768,120.328967;36.171794,120.328806;36.171815,120.328671;36.171841,120.328508;36.171866,120.328347;36.171891,120.328185;36.171916,120.328025;36.171937,120.327891;36.171955,120.327758;36.17198,120.327597;36.172004,120.327438;36.172024,120.327304;36.172048,120.327144;36.172068,120.327011;36.172088,120.326877;36.172117,120.326691;36.172141,120.326531;36.172166,120.326373;36.172191,120.326214;36.172212,120.326081;36.172234,120.325922;36.172254,120.325789;36.172275,120.325629;36.172298,120.325469;36.172317,120.325308;36.17233,120.325175;36.172349,120.325014;36.172364,120.324882;36.172382,120.324722;36.172396,120.324589;36.172411,120.324456;36.172424,120.324326;36.172442,120.324167;36.172453,120.324034;36.172469,120.323875;36.172477,120.323743;36.172488,120.323586;36.172501,120.323427;36.172509,120.323299;36.17252,120.323141;36.172531,120.322985;36.172543,120.322828;36.172549,120.322725;36.172559,120.322544;36.172568,120.322388;36.172573,120.322258;36.172581,120.322103;36.172584,120.321974;36.172591,120.321819;36.172595,120.321693;36.172601,120.32154;36.172604,120.321415;36.172603,120.321268;36.172606,120.321141;36.172609,120.32099;36.172612,120.32084;36.172615,120.320694;36.172617,120.32057;36.172619,120.320427;36.17262,120.320305;36.172619,120.320159;36.172619,120.32004;36.172619,120.319895;36.172618,120.319759;36.172617,120.319618;36.172619,120.319521;36.172619,120.319388;36.172627,120.31931;36.172631,120.319228;36.172634,120.319126;36.172636,120.319089;36.172638,120.319023;36.172637,120.31901;36.172638,120.318954;36.172635,120.318964;36.172635,120.318936;36.172636,120.318964;36.172638,120.318972;36.172638,120.318971;36.172638,120.318967;36.172638,120.318967;36.172638,120.31897;36.172638,120.318969;36.172638,120.318971;36.172638,120.318971;36.172638,120.318971;36.172638,120.318971;36.172638,120.31897;36.172638,120.31897;36.172638,120.31897;36.172638,120.31897;36.172638,120.318972;36.172638,120.318971;36.172637,120.318971;36.172637,120.318971;36.172637,120.318971;36.172637,120.318971;36.172637,120.318971;36.172636,120.318971;36.172636,120.318971;36.172636,120.318971;36.172636,120.318971;36.172637,120.318971;36.172637,120.318971;36.172636,120.318972;36.172636,120.318971;36.172637,120.318972;36.172637,120.318972;36.172637,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318972;36.172636,120.318973;36.172636,120.318972;36.172636,120.318973;36.172636,120.318973;36.172636,120.318973;36.172636,120.318973;36.172636,120.318972;36.172635,120.318972;36.172635,120.318972;36.172635,120.318972;36.172635,120.318972;36.172636,120.318972;36.172635,120.318972;36.172635,120.318973;36.172635,120.318972;36.172635,120.318972;36.172635,120.318972;36.172635,120.318972;36.172635,120.318972;36.172635,120.318972;36.172635,120.318972;36.172635,120.318972;36.172635,120.318971;36.172635,120.318969;36.172634,120.318948;36.172634,120.318939;36.172631,120.318898;36.17263,120.318876;36.172623,120.318821;36.172617,120.318767;36.172613,120.31873;36.172605,120.318665;36.172599,120.318612;36.17259,120.318538;36.172584,120.318487;36.172577,120.318407;36.172573,120.318326;36.172568,120.31825;36.172569,120.318163;36.172565,120.318063;36.172561,120.317976;36.172557,120.317885;36.17255,120.317792;36.172546,120.317712;36.172535,120.31758;36.172527,120.317481;36.17252,120.317372;36.172512,120.317273;36.172504,120.31716;36.172492,120.317037;36.172484,120.31694;36.172472,120.316793;36.172462,120.316686;36.172454,120.316583;36.172443,120.316476;36.172431,120.316351;36.172421,120.316243;36.172409,120.316117;36.172401,120.315987;36.172391,120.315883;36.172381,120.315796;36.172372,120.315691;36.172362,120.315574;36.172358,120.315504;36.172349,120.3154;36.17235,120.315353;36.172345,120.31528;36.172342,120.315253;36.172337,120.315184;36.172336,120.315174;36.172333,120.315125;36.172329,120.315136;36.172326,120.315111;36.172327,120.315135;36.172329,120.315149;36.172328,120.315148;36.17233,120.31515;36.17233,120.315149;36.17233,120.315149;36.17233,120.315149;36.17233,120.315149;36.172331,120.315149;36.172331,120.315149;36.172331,120.315149;36.172331,120.315149;36.172331,120.315148;36.172331,120.315149;36.172332,120.315149;36.172331,120.315148;36.172331,120.315148;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315151;36.172327,120.315152;36.172327,120.315151;36.172327,120.315152;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315151;36.172327,120.315152;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172326,120.315151;36.172326,120.315151;36.172327,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315151;36.172327,120.315152;36.172326,120.315152;36.172327,120.315151;36.172327,120.315151;36.172327,120.31515;36.172325,120.315134;36.172324,120.315126;36.172319,120.315094;36.172318,120.31508;36.172314,120.315064;36.172312,120.315046;36.172309,120.315024;36.172306,120.315003;36.172299,120.314952;36.172294,120.314909;36.172289,120.31487;36.172283,120.31482;36.172277,120.314774;36.172268,120.31471;36.172262,120.314665;36.17225,120.314597;36.172243,120.314549;36.172232,120.314473;36.172222,120.314401;36.172212,120.314335;36.172204,120.314275;36.172195,120.314217;36.172184,120.314145;36.172173,120.314074;36.172163,120.314006;36.172154,120.313945;36.172141,120.313862;36.172131,120.313792;36.172119,120.313713;36.172109,120.313639;36.172097,120.313557;36.172083,120.313466;36.17207,120.313381;36.172055,120.313292;36.172043,120.313216;36.17203,120.313128;36.172018,120.313052;36.172005,120.312962;36.171991,120.312871;36.171979,120.312796;36.171969,120.312722;36.171958,120.312647;36.171947,120.312575;36.171933,120.312487;36.17192,120.312401;36.171909,120.31233;36.171897,120.312257;36.171885,120.312173;36.171872,120.312087;36.171862,120.312019;36.171849,120.311935;36.171837,120.311854;36.171826,120.311785;36.171816,120.311703;36.171804,120.311624;36.171792,120.311543;36.171782,120.311469;36.17177,120.311391;36.171762,120.31133;36.171752,120.311266;36.171741,120.311198;36.171733,120.311146;36.171724,120.311088;36.171719,120.311041;36.17171,120.310977;36.171702,120.310932;36.171692,120.310872;36.171686,120.310815;36.171678,120.310756;36.171669,120.310702;36.171661,120.31065;36.171652,120.310594;36.171644,120.310546;36.171636,120.310493;36.171632,120.310468;36.171631,120.310456;36.171627,120.310432;36.171627,120.310436;36.171624,120.310419;36.171629,120.310442;36.17163,120.310448;36.17163,120.310448;36.17163,120.310448;36.17163,120.310448;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310448;36.17163,120.310448;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310448;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310447;36.17163,120.310443;36.171629,120.310441;36.171624,120.310415;36.171622,120.310404;36.171617,120.310365;36.17161,120.310325;36.171605,120.310296;36.171598,120.310253;36.171592,120.310219;36.171585,120.310175;36.171578,120.310135;36.171572,120.3101;36.171561,120.310045;36.171553,120.310006;36.171537,120.309942;36.171526,120.309897;36.171506,120.309816;36.171494,120.309765;36.171477,120.309682;36.171464,120.309595;36.17145,120.309519;36.171439,120.309423;36.171427,120.30934;36.171416,120.309238;36.171404,120.309155;36.171391,120.309062;36.171377,120.308973;36.171362,120.308875;36.171343,120.308766;36.171327,120.308663;36.171306,120.308534;36.171292,120.308438;36.171276,120.308329;36.171266,120.308213;36.171252,120.308101;36.171241,120.307976;36.171229,120.307852;36.171216,120.307732;36.171204,120.307602;36.171193,120.307499;36.17118,120.307367;36.171167,120.307235;36.171156,120.307127;36.171144,120.307014;36.171133,120.306905;36.171119,120.306768;36.171108,120.306657;36.171093,120.30652;36.171079,120.306385;36.171066,120.306268;36.171052,120.306131;36.17104,120.305991;36.171028,120.305874;36.171015,120.305735;36.171,120.305593;36.170986,120.305453;36.170977,120.305332;36.170965,120.305191;36.170958,120.305043;36.170955,120.304896;36.170949,120.304776;36.170954,120.304652;36.170951,120.304506;36.17096,120.304356;36.170961,120.304208;36.170977,120.304059;36.170996,120.303909;36.171008,120.30376;36.17103,120.303636;36.171046,120.303487;36.17107,120.303364;36.171087,120.30324;36.171123,120.303093;36.171145,120.30297;36.171182,120.30285;36.171209,120.302727;36.171252,120.302583;36.171291,120.302465;36.171331,120.30232;36.171371,120.302203;36.171414,120.302059;36.171461,120.301943;36.171508,120.301802;36.171566,120.301667;36.171609,120.301551;36.171674,120.301422;36.171729,120.301316;36.171788,120.301183;36.171848,120.301083;36.171901,120.300976;36.171976,120.300859;36.172033,120.300756;36.172098,120.300663;36.172169,120.300543;36.172234,120.300455;36.172307,120.300339;36.172389,120.300236;36.172459,120.300152;36.172537,120.300044;36.172622,120.299948;36.172689,120.299863;36.172763,120.299787;36.172846,120.299688;36.172934,120.299604;36.173005,120.299525;36.173081,120.299458;36.17317,120.299377;36.173258,120.299291;36.17335,120.29922;36.173425,120.299153;36.173505,120.299098;36.173596,120.299023;36.173692,120.29896;36.173769,120.298901;36.173866,120.298849;36.173939,120.298809;36.17403,120.29875;36.174094,120.298717;36.17418,120.298666;36.17423,120.298643;36.174307,120.298599;36.174366,120.298574;36.174424,120.298543;36.174468,120.298524;36.174512,120.298511;36.174565,120.298488;36.174578,120.298485;36.174618,120.298469;36.17462,120.298469;36.174644,120.29846;36.174635,120.298462;36.174652,120.298455;36.17464,120.29846;36.17463,120.298464;36.17463,120.298464;36.17463,120.298465;36.17463,120.298464;36.17463,120.298465;36.17463,120.298464;36.17463,120.298465;36.174629,120.298465;36.17463,120.298464;36.17463,120.298464;36.17463,120.298464;36.17463,120.298464;36.17463,120.298464;36.17463,120.298464;36.17463,120.298464;36.17463,120.298465;36.17463,120.298464;36.17463,120.298465;36.17463,120.298464;36.174637,120.298461;36.174648,120.298456;36.174656,120.298453;36.174678,120.298441;36.174693,120.298433;36.174725,120.298415;36.174749,120.298403;36.174799,120.298379;36.174853,120.298356;36.174897,120.298337;36.174954,120.298316;36.174997,120.298298;36.175069,120.298273;36.175119,120.298254;36.175187,120.298232;36.175254,120.298209;36.175344,120.298181;36.175406,120.298159;36.175499,120.298132;36.175578,120.29811;36.175664,120.298084;36.175763,120.298056;36.175855,120.298029;36.175944,120.298005;36.17604,120.297977;36.176145,120.297946;36.176236,120.297923;36.176338,120.297894;36.176429,120.29787;36.176517,120.297846;36.176591,120.297827;36.176715,120.297794;36.176828,120.297766;36.176918,120.297742;36.177016,120.297721;36.177071,120.297708;36.177321,120.297646;36.177438,120.297621;36.177558,120.297594;36.177655,120.297571;36.177778,120.297543";
var obulatlngAry = obulatlngs.split(";");

var videohtml = "<table><tr><td>";
videohtml += '<video muted="muted"  id="obu_video_001" width="260px" controls loop="loop" autoplay><source src="video_230705194050.3gp" type="video/mp4" ></video>';
videohtml += "</td><td width='30px'></td><td style='font-size: 15px;text-align: left; vertical-align: top;'>";
videohtml += "<div>鲁B69656 - OBU0010</div><div id='obu1speed'>实时速度： 30km/h</div><div>平均速度：28km/h</div><div>最高速度：40km/h</div><div>打卡时间：10:13:20</div>";
videohtml += "</td></tr></table>"

var optslabel = {
    position: map.getCenter(), // 指定文本标注所在的地理位置
    offset: new BMapGL.Size(-200, -250) // 设置文本偏移量
};
// 创建文本标注对象
var label = new BMapGL.Label(videohtml, optslabel);
// 自定义文本标注样式
label.setStyle({
    color: '#ffffff',
    background: '#3c6ccedd',
    borderRadius: '5px',
    borderColor: '#3c6ccedd',
    padding: '6px',
    fontSize: '16px',
    width: '500px',
    height: '200px',
    lineHeight: '30px',
    fontFamily: '微软雅黑'
});

function refreshAll(){
    setTimeout('refreshAll()', 5000);
    
    hideBd();

    getWeekDay();
    showDate();
    updateForecast();
}
refreshAll();
//showVehicles();
updateBdMapSummary();

var obulatlngIndex = 0;
var obumarker ;
var linePoints = [];
var obuRoutePolyline;
var maxSpeedWindow ;
var maxspeedlabel;
var maxspeedMarker;
function showObuRoute(){
    setTimeout('showObuRoute()', 100);
    if(obulatlngIndex >= obulatlngAry.length){
        console.log("obulatlngIndex is too large.");
        return;
    }
    
    if(obulatlngIndex === 0){
        map.addOverlay(label);
    }
    
    var tmpary = obulatlngAry[obulatlngIndex].split(",");    
    var rsulatlng = coordtransform.wgs84togcj02(tmpary[1], tmpary[0] - 0.0001);
    rsulatlng = coordtransform.gcj02tobd09(rsulatlng[0], rsulatlng[1]);    
    var pt = new BMapGL.Point(rsulatlng[0], rsulatlng[1]);
    label.setPosition(pt);  
    linePoints.push(pt);
    label.setOffset(new BMapGL.Size(-200, -250));
    
    if(obulatlngIndex % 20 === 0){
        map.setCenter(pt);
    }
    
    if(!obumarker){
        obumarker = new BMapGL.Marker(pt, {
            icon: obuIcon
        });
        obumarker.setRotation(285);
        // 将标注添加到地图
        map.addOverlay(obumarker);  
    } else {
        obumarker.setPosition(pt);
        if(pt.lng < 120.345){
            obumarker.setRotation(280);
        }
        if(pt.lng < 120.336){
            obumarker.setRotation(275);
        }    
        if(pt.lng < 120.333){
            obumarker.setRotation(270);
        }        
    }
    
    map.removeOverlay(obuRoutePolyline);
    obuRoutePolyline = new BMapGL.Polyline(linePoints, {
        strokeColor: 'blue',
        strokeWeight: 2,
        strokeOpacity: 1
    });
    map.addOverlay(obuRoutePolyline);    
    
    if(obulatlngIndex % 150 === 149){
        if(!maxspeedMarker){
            maxspeedMarker = new BMapGL.Marker(pt, {
                icon: maxspeedIcon,
                offset: new BMapGL.Size(0, 0)
            });
            map.addOverlay(maxspeedMarker);
            rotatemarkers.push(maxspeedMarker);

            var optslabel2 = {
                position: pt, // 指定文本标注所在的地理位置
                offset: new BMapGL.Size(-100, -100) // 设置文本偏移量
            };
        } else {
            maxspeedMarker.setPosition(pt);
        }
        
        if (!maxspeedlabel){
            // 创建文本标注对象
             maxspeedlabel = new BMapGL.Label("最大时速：40km/h<br/>发生时间：10:30:22", optslabel2);
            // 自定义文本标注样式
            maxspeedlabel.setStyle({
                color: '#d2691e',
                borderRadius: '5px',
                borderColor: '#ccc',
                padding: '10px',
                fontSize: '14px',
                width: '180px',
                height: '80px',
                lineHeight: '30px',
                fontFamily: '微软雅黑'
            });
            map.addOverlay(maxspeedlabel);
        } else {
            maxspeedlabel.setPosition(pt);
        }
    }
    
    $("#obu1speed").text("实时速度：" + Math.floor(Math.random() * 10 + 30) + "km/h");
    
    obulatlngIndex++;
}

function  replayRoute(){
    linePoints.length = 0;
    obulatlngIndex = 0;
    showObuRoute();    
    document.getElementById("left_nav_history_route").style.display = 'none';
}

if(getQueryVariable("showObuVehicleTable") === "1"){
    document.getElementById("obuVehicleTable").style.visibility = "visible";
    document.getElementById("obuVehicleTable").style.display = "";    
}

function showObuVehicle(){
//    alert('showObuVehicle');
}


</script>
</body>

</html>