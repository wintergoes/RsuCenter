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
    </style>        
</head>

<body style="width: 100%; height: 100%">
<div id='dashboard_left' style="position:relative;width: 100%; height: 100%; ">
    <div id="bdmap_container" style="width: 100%; height: 100% ;position: absolute;">dmg</div>
    <div id="dashboard_title" style="z-index: 100;">
        <div style="float: left;"><img src="images/dashboard/dashboard_title.png"></div>
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
  //styleJson: stylejson
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
                        offset: new BMapGL.Size(-60, 0)           // 设置标注的偏移量
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
//        $("#testtext").html(warningmarkers[i].getRotation());
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

function refreshAll(){
    setTimeout('refreshAll()', 5000);
    
    hideBd();

    getWeekDay();
    showDate();
    updateForecast();
}
refreshAll();
showVehicles();
updateBdMapSummary();

if(getQueryVariable("showObuVehicleTable") === "1"){
    document.getElementById("obuVehicleTable").style.visibility = "visible";
    document.getElementById("obuVehicleTable").style.display = "";    
}

function showObuVehicle(){
//    alert('showObuVehicle');
}
//showTestVehs();
</script>
</body>

</html>