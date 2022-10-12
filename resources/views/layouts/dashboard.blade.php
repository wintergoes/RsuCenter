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
        
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script> 
        
        <script type="text/javascript" src="js/coordtransform.js"></script>
	<title>RSU管理后台</title>
        
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
            background: url('images/dashboard/title_background.png') repeat-x center; 
    
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
    </style>        
</head>

<body style="width: 100%; height: 100%">
<div id='dashboard_left' style="position:relative;width: 100%; height: 100%; ">
    <div id="bdmap_container" style="width: 100%; height: 100% ;position: absolute;">dmg</div>
    <div id="dashboard_title">
        <div style="float: left;"><img src="images/dashboard/dashboard_title.png"></div>
        <div>
                             <table class="forecast_tbl">
                                 <tr>
                                     <td style="width: 120px;"><span id='datespan'></span></td>   
                                     <td><span id='weekday'>星期四</span> <img src="images/dashboard/sunshine.png"></td>
                                     <td><img src="images/dashboard/wendu.png"/><br>温度 30</td>
                                     <td><img src="images/dashboard/shidu.png"/><br>湿度 23hPa</td>
                                     <td><img src="images/dashboard/fengli.png"/><br>风力 62Km/h</td>
                                     <td><img src="images/dashboard/fengxiang.png"/><br>风向 东南</td>
                                 </tr>                    
                             </table>
            </div>
    </div>
    <div id="mask_layer" style="width: 100%; height: 100%;  position: absolute; opacity: 0.5; background: url('images/dashboard/background.png') repeat">
        <!--<img style="width: 100%; height: 100%; object-fit: fill;" src="images/dashboard/background.png"/>-->
    </div>

    <div style='z-index: 10; position: absolute; left: 0px; bottom: 0px; '>
        <table style="margin-bottom: 10px; ">
            <tr>
                <td>
                    <div class="item_container" style="width: 430px; height: 260px; 
                         background: url('images/dashboard/device_background.png') no-repeat;
                             background-size:100% 100%; ">
                        <div >
                            <span>简要统计</span>
                            <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
                        </div>
                        <table height="85%">
                            <tr>
                                <td class="summary_stat_title_td">今日车流量</td>
                                <td class="summary_stat_title_td">今日道路事件</td>
                                <td class="summary_stat_title_td">今日预警次数</td>                     
                            </tr>
                            <tr>
                                <td  class="summary_stat_value_td" style="color: #16F7FB;" id="vehflow">0</td>
                                <td  class="summary_stat_value_td" style="color: #2EA1FF;" id="warncount">0</td>                                           
                                <td  class="summary_stat_value_td" style="color: #2B69F4;" id="warnrecordcount">0</td>
                            </tr>
                            <tr>
                                <td class="summary_stat_title_td">超速驾驶</td>
                                <td class="summary_stat_title_td">低速驾驶</td>
                                <td class="summary_stat_title_td">抛洒物</td>                     
                            </tr>
                            <tr>
                                <td  class="summary_stat_value_td" style="color: #16F7FB;" id="speedcount">0</td>
                                <td  class="summary_stat_value_td" style="color: #2EA1FF;" id="lowspeedcount">0</td>                                           
                                <td  class="summary_stat_value_td" style="color: #2B69F4;" id="abandonedobjectcount">0</td>
                            </tr>                           
                        </table>
                    </div>                                      
                </td>                     
                
                
                <td>
                    <div class="item_container" style="width: 430px; height: 260px; 
                         background: url('images/dashboard/device_background.png') no-repeat;
                             background-size:100% 100%; ">
                        <div >
                            <span>车流量统计</span>
                            <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
                        </div>
                        <table height="90%">
                            <tr>
                                <td>
                        <div style="margin-top: 6px; width: 100%; height: 90%">
                            <canvas id="chart_veh_flow"></canvas>
                        </div>                                    
                                </td>
<!--                                <td>
                        <div style="width: 20%;  right: 1px; margin-top: 30px;">
                            <p class="stat_button_active" id='vehflowtoday' onclick="showVehFlowChartByDay(0);">今日</p>
                            <p class="stat_button" id='vehflow7day' onclick="showVehFlowChartByDay(7);">7天</p>
                            <p class="stat_button" id='vehflow30day' onclick="showVehFlowChartByDay(30);">1个月</p>
                        </div>
                                </td>-->
                            </tr>
                        </table>
                    </div>                                      
                </td>

                <td>
                    <div style='z-index: 10; '>
                        <div class="item_container" style="width: 430px; height: 260px; 
                             background: url('images/dashboard/device_background.png') no-repeat;
                                 background-size:100% 100%; ">
                            <div>
                                <span>事件统计</span>
                                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
                            </div>
                            <div class="item_sub_div">
<!--                                <div style=" margin-top: 10px; width: 100%;">
                                    <span class="stat_button_active" id="eventtoday" onclick="showEventByDay(0);">今日</span>
                                    <span class="stat_button" id="event7day" onclick="showEventByDay(7);">7天</span>
                                    <span class="stat_button" id="event30day" onclick="showEventByDay(30);">1个月</span>
                                </div>-->
                                <div id="chart_events_container" style="width: 100%; height: 80%;  text-align: center; margin-top: 15px;">
                                    <canvas id="chart_events" width="180px" height="220px"></canvas>
                                </div>
                            </div>
                            <div class="item_sub_div">
                                <table id="traffic_event_table">
                                    <thead>
                                        <td>序号</td>
                                        <td>事件</td>
                                        <td>时间</td>
                                    </thead>
                                </table>
                            </div> 
                        </div>
                    </div>
                </td>
                
                <td>
                    <div style='z-index: 10; '>
                        <div class="item_container" style="width: 430px; height: 260px; 
                             background: url('images/dashboard/device_background.png') no-repeat;
                                 background-size:100% 100%; ">
                            <div>
                                <span>车辆识别</span>
                                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
                            </div>
                            <div >
                                <table id="tbl_realtime_vehicles">

                                </table>
                            </div> 
                        </div>
                    </div>
                </td>                
            </tr>
        </table>    
    </div>
</div>
    
<script>
var radarVideoMap = new HashMap();
</script>
    
@if(env("dashboard_video_type") == "obu")    
<div id="obu_videos" style="right: 0px;  position: absolute;  top: 70px; padding: 16px;
     background-color: rgba(100, 0, 0, 0);  font-size: 12px; ">
                <?php
                $videocount = 0;
                ?>
                @foreach($obus as $obu)
                <div style="float: left; margin-right: 10px;">
                    <div style="background: url('images/dashboard/video_background.png') no-repeat; 
                         background-size: 100% 100%; width: 220px; height: 155px; padding: 6px;">
                        <video autoplay="autoplay" onended="onVideoEnded({{$obu->id}})" id="video{{$obu->id}}" muted="muted" controls class="card-img-top">
                            <source src="dashboardgetnewobuvideo?obuid={{$obu->id}}" type="video/mp4">
                        </video>
                    </div>
                    <div  style="padding: 3px;">
                        <p class="video_text">
                            {{$obu->obuid}}
                        </p>
                    </div>
                </div>
                <?php
                $videocount++;
                if($videocount == 7){
                    break;
                }
                ?>
                @endforeach        
</div>
@else
<div id="obu_videos" style="right: 0px;  position: absolute;  top: 70px; padding: 16px;
     background-color: rgba(100, 0, 0, 0);  font-size: 12px; z-index: 10;">
                <?php
                $videocount = 0;
                ?>
                @foreach($radars as $radar)
                <div style="float: left; margin-right: 10px;">
                    <div style="background: url('images/dashboard/video_background.png') no-repeat; 
                         background-size: 100% 100%; width: 260px; height: 155px; padding: 6px;">
                        <video  muted="muted" controls id="radarvideo{{$radar->id}}" src="{{$radar->videostreamaddress}}" error="onRadarVideoEnded({{$radar->id}}, '{{$radar->videostreamaddress}}')" onended="onRadarVideoEnded({{$radar->id}}, '{{$radar->videostreamaddress}}')" class="card-img-top" preload="none">
                            <source  type="video/mp4">
                        </video>
                        <script>
                        document.getElementById("radarvideo{{$radar->id}}").play();
                        radarVideoMap.put({{$radar->id}}, "{{$radar->videostreamaddress}}");
                        </script>
                    </div>
                    <div  style="padding: 3px;">
                        <p class="video_text" >
                            {{$radar->devicecode}}
                        </p>
                        <p id="videolabel{{$radar->id}}"></p>
                    </div>
                </div>
                <?php
                $videocount++;
                if($videocount == 7){
                    break;
                }
                ?>
                @endforeach        
</div>
@endif
<script>
var stylejson = [{
    "featureType": "land",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "color": "#091220ff"
    }
}, {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "color": "#113549ff"
    }
}, {
    "featureType": "green",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "color": "#0e1b30ff"
    }
}, {
    "featureType": "building",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "building",
    "elementType": "geometry.topfill",
    "stylers": {
        "color": "#113549ff"
    }
}, {
    "featureType": "building",
    "elementType": "geometry.sidefill",
    "stylers": {
        "color": "#143e56ff"
    }
}, {
    "featureType": "building",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#dadada00"
    }
}, {
    "featureType": "subwaystation",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "color": "#113549B2"
    }
}, {
    "featureType": "education",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "color": "#12223dff"
    }
}, {
    "featureType": "medical",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "color": "#12223dff"
    }
}, {
    "featureType": "scenicspots",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "color": "#12223dff"
    }
}, {
    "featureType": "highway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "weight": 40
    }
}, {
    "featureType": "highway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "highway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#fed66900"
    }
}, {
    "featureType": "highway",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "highway",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "highway",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "highway",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "arterial",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "weight": 40
    }
}, {
    "featureType": "arterial",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "arterial",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffeebb00"
    }
}, {
    "featureType": "arterial",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "arterial",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "arterial",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "local",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "weight": "1"
    }
}, {
    "featureType": "local",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "local",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "local",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "local",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#979c9aff"
    }
}, {
    "featureType": "local",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffffff"
    }
}, {
    "featureType": "railway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "subway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "weight": "1"
    }
}, {
    "featureType": "subway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#d8d8d8ff"
    }
}, {
    "featureType": "subway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "subway",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "subway",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#979c9aff"
    }
}, {
    "featureType": "subway",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffffff"
    }
}, {
    "featureType": "continent",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "continent",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "continent",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "continent",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "city",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "city",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "city",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "city",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "town",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "town",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "town",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#454d50ff"
    }
}, {
    "featureType": "town",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffffff"
    }
}, {
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "poilabel",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "districtlabel",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on",
        "weight": "5"
    }
}, {
    "featureType": "road",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "road",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "district",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "poilabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "poilabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "poilabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "manmade",
    "elementType": "geometry",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "districtlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffffff"
    }
}, {
    "featureType": "entertainment",
    "elementType": "geometry",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "shopping",
    "elementType": "geometry",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "nationalway",
    "stylers": {
        "level": "6",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "stylers": {
        "level": "7",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "stylers": {
        "level": "8",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "stylers": {
        "level": "9",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "stylers": {
        "level": "10",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "6",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "7",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "8",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "9",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "10",
        "weight": "20",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "6",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "7",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "8",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "9",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "nationalway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "10",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-10"
    }
}, {
    "featureType": "cityhighway",
    "stylers": {
        "level": "6",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "stylers": {
        "level": "7",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "stylers": {
        "level": "8",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "stylers": {
        "level": "9",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "6",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "7",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "8",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "off",
        "level": "9",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "6",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "7",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "8",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "labels",
    "stylers": {
        "visibility": "off",
        "level": "9",
        "curZoomRegionId": "0",
        "curZoomRegion": "6-9"
    }
}, {
    "featureType": "subwaylabel",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "subwaylabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "tertiarywaysign",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "tertiarywaysign",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "provincialwaysign",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "provincialwaysign",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "nationalwaysign",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "nationalwaysign",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "highwaysign",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "highwaysign",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "village",
    "elementType": "labels",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "district",
    "elementType": "labels.text",
    "stylers": {
        "fontsize": "20"
    }
}, {
    "featureType": "district",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "district",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "country",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "country",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "water",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "tertiaryway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "tertiaryway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff10"
    }
}, {
    "featureType": "provincialway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "provincialway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "nationalway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "nationalway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "highway",
    "elementType": "labels.text",
    "stylers": {
        "fontsize": "20"
    }
}, {
    "featureType": "nationalway",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "nationalway",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "nationalway",
    "elementType": "labels.text",
    "stylers": {
        "fontsize": "20"
    }
}, {
    "featureType": "provincialway",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "provincialway",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "provincialway",
    "elementType": "labels.text",
    "stylers": {
        "fontsize": "20"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "labels.text",
    "stylers": {
        "fontsize": "20"
    }
}, {
    "featureType": "cityhighway",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "estate",
    "elementType": "geometry",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "tertiaryway",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "tertiaryway",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "fourlevelway",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "fourlevelway",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "scenicspotsway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "scenicspotsway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "universityway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "universityway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "vacationway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "vacationway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "fourlevelway",
    "elementType": "geometry",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "fourlevelway",
    "elementType": "geometry.fill",
    "stylers": {
        "color": "#12223dff"
    }
}, {
    "featureType": "fourlevelway",
    "elementType": "geometry.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "transportationlabel",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "transportationlabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "transportationlabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "transportationlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "educationlabel",
    "elementType": "labels",
    "stylers": {
        "visibility": "on"
    }
}, {
    "featureType": "educationlabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "educationlabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "educationlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "transportation",
    "elementType": "geometry",
    "stylers": {
        "color": "#113549ff"
    }
}, {
    "featureType": "airportlabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "airportlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "scenicspotslabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "scenicspotslabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "medicallabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "medicallabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "medicallabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "scenicspotslabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "airportlabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "entertainmentlabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "entertainmentlabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "entertainmentlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "estatelabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "estatelabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "estatelabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "businesstowerlabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "businesstowerlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "businesstowerlabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "companylabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "companylabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "companylabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "governmentlabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "governmentlabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "governmentlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "restaurantlabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "restaurantlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "restaurantlabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "hotellabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "hotellabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "hotellabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "shoppinglabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "shoppinglabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "shoppinglabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "lifeservicelabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "lifeservicelabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "lifeservicelabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "carservicelabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "carservicelabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "carservicelabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "financelabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "financelabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "financelabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "otherlabel",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "otherlabel",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "otherlabel",
    "elementType": "labels.icon",
    "stylers": {
        "visibility": "off"
    }
}, {
    "featureType": "manmade",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "manmade",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "transportation",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "transportation",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "education",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "education",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "medical",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "medical",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}, {
    "featureType": "scenicspots",
    "elementType": "labels.text.fill",
    "stylers": {
        "color": "#2dc4bbff"
    }
}, {
    "featureType": "scenicspots",
    "elementType": "labels.text.stroke",
    "stylers": {
        "color": "#ffffff00"
    }
}]

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
                
                let pt = new BMapGL.Point(rsuobj.rsulng, rsuobj.rsulat);
                var marker = new BMapGL.Marker(pt, {
                    icon: rsuIcon,
                    offset: new BMapGL.Size(0, -10)
                });
                
                if(rsuobj.score < 80){
                    var label = new BMapGL.Label(rsuobj.devicecode + " <a href='devices' target='_blank'><font color='#d77f43'>设备异常</font></a>", {       // 创建文本标注
                        position: pt,                          // 设置标注的地理位置
                        offset: new BMapGL.Size(-60, -60)           // 设置标注的偏移量
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
                lanestatestr =  "<font color='" + lanestatecolor + "'>" + lanestatestr + "</font>";  
                var labelstr = "平均车速：" + Math.round(radarobj.avgspeed) + "km/h<br/>"
                            + "车头间距：" + radarobj.spaceheadway + " 米<br/>车头时距：" 
                            + radarobj.timeheadway + " 秒<br/>车道状态：" + lanestatestr;
                
                var marker = radarDeviceMap.get(radarobj.id);
                if(marker === null){
                    marker = new BMapGL.Marker(pt, {
                        icon: radarIcon,
                        offset: new BMapGL.Size(0, -10)
                    });
                    
                    var label = new BMapGL.Label(labelstr, {       // 创建文本标注
                        position: pt,                          // 设置标注的地理位置
                        offset: new BMapGL.Size(-60, -110)           // 设置标注的偏移量
                    })    
                    label.setStyle({border: "1px dotted rgb(171 158 158)", backgroundColor: "#aa000000", borderRadius: "3px", padding: "6px", color: "#c3c2c0"});
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
                    
//                    infoshadowobjs = document.getElementsByClassName("shadow");
//                    for(var j = 0; j < infoshadowobjs.length; j++){
//                        infoshadowobjs[j].innerHTML = "";
//                    }                    
                });
                //map.openInfoWindow(infoWindow, pt); // 开启信息窗口  
                marker.addEventListener('click', function () {
                    
                });                
                // 将标注添加到地图
                map.addOverlay(marker);
                
//                if(warnobj.startlat !== warnobj.stoplat || warnobj.startlng !== warnobj.stoplng){
//                    var latlng1 = coordtransform.wgs84togcj02(warnobj.stoplng, warnobj.stoplat);
//                    latlng1 = coordtransform.gcj02tobd09(latlng1[0], latlng1[1]); 
//                    
//                    let ptstop = new BMapGL.Point(latlng1[0], latlng1[1]);
//                    var marker = new BMapGL.Marker(ptstop, {
//                        icon: alertStopIcon
//                    });
//                    
//                    marker.addEventListener('click', function () {
//                        map.openInfoWindow(infoWindow, ptstop); // 开启信息窗口  
//                    });                        
//                    // 将标注添加到地图
//                    map.addOverlay(marker);                    
//                }
            }            
            //setTimeout('updateBdMapSummary()', 10000);    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //setTimeout('updateBdMapSummary()', 10000);    
        }
    });
}


function rotateMarker(){
    for(var i = 0; i < warningmarkers.length; i++){
        warningmarkers[i].setRotation(warningmarkers[i].getRotation() + 15);
//        $("#testtext").html(warningmarkers[i].getRotation());
    }
    
    setTimeout("rotateMarker()", 200);
}
rotateMarker();
</script>


<!--事件统计-->
<script>
var eventReqDay = 0;
function showEventByDay(day){
    eventReqDay  = day;
    
    $('#eventtoday').attr('class', "stat_button");
    $('#event7day').attr('class', "stat_button");
    $('#event30day').attr('class', "stat_button");
    if(day === 0){
        $('#eventtoday').attr('class', "stat_button_active");
    } else if(day === 7){
        $('#event7day').attr('class', "stat_button_active");
    } else {
        $('#event30day').attr('class', "stat_button_active");
    }    
    
    showEvents();
}    
    
var eventChart ; 
var eventReqCount = 0;
function showEvents(){
    var constpiecolors = ["#13F9F9", "#2EA1FF", "#2B68FA", "#DA3097", '#59a4ff', '#ffbd2a', '#b37feb', '#4ace82', '#ff745c', '#26d0ff', '#f6cc00', '#c04ee6'];
    var eventdateset = [];
    var eventdataitem = {};
    var labels = [];
    var eventdata = [];
    var piecolors = [];
    var eventitemcount = 0;
    $.getJSON("dashboardeventjson?statday=" + eventReqDay,function(data){
        eventReqCount++;
        var tbl = document.getElementById("traffic_event_table");
        var rows = tbl.rows; //获取表格的行数

        for (var i = rows.length - 1; i > 0 ; i--) {
            tbl.deleteRow(i);    
        }

        var maxid = Math.min(4, data["events"].length);
        for(var i=0;i<maxid;i++){
            var tr=tbl.insertRow(i+1);
            tr.className = "tr_content";
                        //添加单元格
            var cell0=tr.insertCell(0);
            cell0.innerHTML = i+1;
            var cell1=tr.insertCell(1);
            cell1.innerHTML=data["events"][i]["winame"];
            var cell2=tr.insertCell(2);
            cell2.innerHTML=data["events"][i]["eventtime"]; 
        }

        if(data["summary"] !== null){
            eventitemcount = data["summary"].length;
        }
        for(var i = 0; i < data["summary"].length; i++){
            labels.push(data["summary"][i].tecname);
            eventdata.push(data["summary"][i].wcount);
            piecolors.push(constpiecolors[i]);
        }
        
        eventdataitem["data"] = eventdata;
        eventdataitem["backgroundColor"] = piecolors;
        eventdataitem["borderColor"] = 'rgba(0, 0, 0, 0)';
        eventdataitem["borderWidth"] = 8;
        eventdataitem["borderAlign"] = 'inner';
        eventdateset.push(eventdataitem);

//        if(eventChart){    
//            eventChart.clear();
//            eventChart.destroy();
//        }
        if(eventitemcount === 0){
            $("#chart_events_container").html('<br/><br/>暂无数据。');
        } else {
            $("#chart_events_container").html('<canvas id="chart_events" width="80" height="80"></canvas>');

            eventChart = new Chart(document.getElementById("chart_events"), {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: eventdateset,
                        scaleFontColor : "red",
                        scaleLineColor: "red",
                        scaleLineWidth: 8, 
                    },
                    options: {               
                        maintainAspectRatio: false,
                        startAngle: 45,
                        title: {
                                display: false,
                                text: ''
                        },
                        legend: {
                            position: 'bottom',
                            display: true,
                                labels: {
                                    boxWidth:8
                                }
                        },
                        animation: {
                            duration: 0,
                        }
                    }
            });        
        }        
    });
}

var vehflowChart;
var vehflowReqCount = 0;
function showVehFlowChartByDay(reqcount){
    vehflowReqCount = reqcount;
    
    $('#vehflowtoday').attr('class', "stat_button");
    $('#vehflow7day').attr('class', "stat_button");
    $('#vehflow30day').attr('class', "stat_button");
    if(reqcount === 0){
        $('#vehflowtoday').attr('class', "stat_button_active");
    } else if(reqcount === 7){
        $('#vehflow7day').attr('class', "stat_button_active");
    } else {
        $('#vehflow30day').attr('class', "stat_button_active");
    }
    
    showVehFlowChart();
}

function showVehFlowChart(){
    var ctx = document.getElementById('chart_veh_flow').getContext('2d');
    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke1.addColorStop(0, 'rgba(32, 219, 253, 0.3)');  
      gradientStroke1.addColorStop(1, 'rgba(32, 219, 253, 0.1)'); 

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#20DAFC');  
        gradientStroke2.addColorStop(1, '#20DAFC'); 
              
    var chartoptions = {
        maintainAspectRatio: false,
        legend: {
            display: false,
            labels: {
                fontColor: '#585757',
                boxWidth: 40
            }
        },
        tooltips: {
                enabled: false
        },        
        animation: {
            duration: 0,
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontColor: '#fff'
                },
                gridLines: {
                    display: true,
                    color: "rgba(60, 60, 60, 0.6)"
                },
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontColor: '#fff'
                },
                gridLines: {
                    display: true,
                    color: "rgba(60, 60, 60, 0.6)"
                },
            }]
        }
    };

    $.getJSON("dashboardvehflow?reqcount=" + vehflowReqCount,function(data){
        if(vehflowReqCount !== 0){
            var clabels = [];
            var cvalues = [];

            for(var i=0;i<data["vehflow"].length;i++){
               clabels.push(data["vehflow"][i]["vfdate"]);
               cvalues.push(data["vehflow"][i]["vehcount"]);
            }

            const data1 = {
                labels: clabels,
                datasets: [{
                   data: cvalues,
                   backgroundColor: gradientStroke1,
                   borderColor: gradientStroke2, 
                   pointRadius :"0",
                   pointHoverRadius:"0",
                   borderWidth: 3                            
               }]
            };

            if(vehflowChart){
                vehflowChart.clear();
                vehflowChart.destroy();
            }
            vehflowChart = new Chart(ctx, {
               type: "line",
               data: data1,
               options: chartoptions
           });
        } else {
            var clabels = [];
            var cvalues = [];
            
            var d = new Date();
            var loophour = Math.max(8, d.getHours());

            for(var k = 1; k <= loophour; k++){
                clabels.push(k);
                var haveHour = false;
                for(var i=0;i<data["vehflow"].length;i++){
                    if(data["vehflow"][i]["vfhour"] === k){
                        cvalues.push(data["vehflow"][i]["vehcount"]);
                        haveHour = true;
                        break;
                    }                                    
                }
                
                if(!haveHour){
                    cvalues.push(0);
                }
            }

            const data1 = {
                labels: clabels,
                datasets: [{
                   data: cvalues,
                   backgroundColor: gradientStroke1,
                   borderColor: gradientStroke2, 
                   pointRadius :"0",
                   pointHoverRadius:"0",
                   borderWidth: 3                            
               }]
            };

            if(vehflowChart){
                vehflowChart.clear();
                vehflowChart.destroy();
            }
            vehflowChart = new Chart(ctx, {
               type: "line",
               data: data1,
               options: chartoptions
           });            
        }
   });
}

$(window).on('resize',function(){
    resizePage();
    //alert(window.innerWidth);
});

function resizePage(){
    $("#dashboard_left").width(window.innerWidth);
    
    if(window.innerWidth < 1400){
        $("#obu_videos").css('display', 'none');
    } else {
        //$("#dashboard_left").width(window.innerWidth - $("#obu_videos").width() - 32);
        $("#obu_videos").css('display', '');
    }
}

resizePage();
//alert($("#obu_videos").attr('display'));
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
var carIcon = new BMapGL.Icon("/images/caricon_white.png", new BMapGL.Size(24, 24));
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

function Vehicle(uuid, plateno, targetid, targettype, speed, laneno, lng, lat, detecttime, id){
    this.uuid = uuid;
    this.plateno = plateno;
    this.targetid = targetid;
    this.targettype = targettype;
    this.speed = speed;
    this.laneno = laneno;
    this.lat = lat;
    this.lng = lng;
    this.detecttime = detecttime;
    this.dbid = id;
    
    this.setMarker = function(marker){
        this.marker = marker;
    }
    
    this.updateData = function(uuid, plateno, targetid, targettype, speed, laneno, lng, lat, detecttime, id){
        this.uuid = uuid;
        this.plateno = plateno;
        this.targetid = targetid;
        this.targettype = targettype;
        this.speed = speed;
        this.laneno = laneno;
        this.lat = lat;
        this.lng = lng;
        this.detecttime = detecttime;
        this.dbid = id;        
    }
}

//var vehmarkers = [];
var vehMap = new HashMap();
function showVehicles(){   
    $.getJSON("dashboardvehicles",function(data){
        var tbl = document.getElementById("tbl_realtime_vehicles");
        var rows = tbl.rows; //获取表格的行数

        for (var i = rows.length - 1; i >= 0 ; i--) {
            tbl.deleteRow(i);    
        }

        var maxid = Math.min(6, data["vehicles"].length);
        for(var i=0;i<maxid;i++){
            var tr=tbl.insertRow(i);
            tr.className = "tr_realtime_vehicle";
                        //添加单元格
            var cell0=tr.insertCell(0);
            cell0.innerHTML = data["vehicles"][i]["devicecode"];
            cell0.width = 80;
            var cell1=tr.insertCell(1);
            cell1.innerHTML = data["vehicles"][i]["targetid"];
            cell1.width = 80;
            var cell2=tr.insertCell(2);
            cell2.innerHTML=data["vehicles"][i]["plateno"] === "" ? "-" : data["vehicles"][i]["plateno"];
            var cell3=tr.insertCell(3);
            cell3.innerHTML=hkVehType2Str(data["vehicles"][i]["vehicletype"]);
            cell3.width = 80;
        }        
        
        for(var i = 0; i < data["vehicles"].length; i++){
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
                    data["vehicles"][i]["id"]);
                
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

                var labeltext = veh.plateno + " id: " + veh.targetid
                    + " speed:" + veh.speed + " lane: " + veh.laneno 
                    + " lat:" + veh.lat + " lng: " + veh.lng 
                    + " id: " + veh.dbid;
                carmaker.enableDragging();

                map.addOverlay(carmaker); 
//                vehmarkers.push(carmaker);                
            } else {
                //alert(veh.lng + "  " + veh.lat);
                veh.updateData(data["vehicles"][i]["uuid"], data["vehicles"][i]["plateno"], data["vehicles"][i]["targetid"], 
                    data["vehicles"][i]["targettype"], data["vehicles"][i]["speed"], data["vehicles"][i]["laneno"],
                    data["vehicles"][i]["longitude"], data["vehicles"][i]["latitude"], data["vehicles"][i]["detecttime"],
                    data["vehicles"][i]["id"]);
                
                var latlng = coordtransform.wgs84togcj02(veh.lng, veh.lat);
                latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
                var pt = new BMapGL.Point(latlng[0], latlng[1]);
                
                veh.marker.setPosition(pt);
                veh.marker.setTitle(data["vehicles"][i]["targetid"]);
                veh.marker.setRotation(vehrotation);
            }
        }
        
        var nowdate = new Date();
        for(var i = vehMap.values().length - 1; i >= 0 ; i--){
            var timecha = nowdate.getTime() - new Date(vehMap.values()[i].detecttime).getTime();
            if(timecha > 10  * 1000){
                map.removeOverlay(vehMap.values()[i].marker);
                vehMap.remove(vehMap.values()[i].uuid);
            }
            $("#test").html(nowdate);
        }
        setTimeout("showVehicles()", 500);
    }); 
}

function showDataSummary(){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "GET",
        url: "dashboardsummary",
        dataType: "json",
        success: function (data) {
            $('#vehflow').html("<a href='anprevents' target='_blank' style='color: #16F7FB;'>" + data[0].vehflowcount + "</a>");
            $('#warncount').html("<a href='warninginfo' target='_blank' style='color: 2EA1FF;'>" + data[0].warncount + "</a>");
            $('#warnrecordcount').html("<a href='warningrecordstat' target='_blank' style='color: 2B69F4;'>" + data[0].warnrecordcount + "</a>");            
            $('#speedcount').html("<a href='aidevents?aidevent=speed' target='_blank' style='color: #16F7FB;'>" + data[0].speedcount + "</a>");
            $('#lowspeedcount').html("<a href='aidevents?aidevent=lowspeed' target='_blank' style='color: 2EA1FF;'>" + data[0].lowspeedcount + "</a>");
            $('#abandonedobjectcount').html("<a href='aidevents?aidevent=abandonedobject' target='_blank' style='color: 2B69F4;'>" + data[0].abandonedobjectcount + "</a>");   
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

//video视频播放完成的事件
function onVideoEnded(obuid) {
    var aud = document.getElementById('video' + obuid);
    aud.src = "dashboardgetnewobuvideo?obuid=" + obuid;
}; 

function checkVideoPlay(){
    videoctrls = document.getElementsByTagName("video");
    for(var i = 0; i < videoctrls.length; i++){
        id = videoctrls[i].id;
        idstr = id.replace("radarvideo", "");
        console.debug(id + ": " + videoctrls[i].networkState + ", " + videoctrls[i].paused + ", " + radarVideoMap.get(idstr));
        if(videoctrls[i].networkState !== 2  && videoctrls[i].paused === true){            
            videoctrls[i].src = radarVideoMap.get(idstr);
        }
        console.debug(id + ", play()");
        videoctrls[i].play();
        //$("#videolabel" + idstr).html(videoctrls[i].src + " " + videoctrls[i].networkState);            
    }
    
    setTimeout("checkVideoPlay()", 5000);
}
checkVideoPlay();


function onRadarVideoEnded(radarid, videourl){
//    var aud = document.getElementById('radarvideo' + radarid);
//    aud.play();
    setTimeout("playRadarVideo(" + radarid + ", '" + videourl + "')", 5000);
}

function playRadarVideo(radarid, videourl){
    var aud = document.getElementById('radarvideo' + radarid);
    aud.src = videourl;
    aud.play();    
}

function refreshAll(){
    setTimeout('refreshAll()', 5000);
    
    hideBd();
    updateBdMapSummary();
    showEvents();
    showVehFlowChart();
    getWeekDay();
    showDate();    
    showDataSummary();
}
refreshAll();
showVehicles();
//showTestVehs();
</script>
</body>

</html>