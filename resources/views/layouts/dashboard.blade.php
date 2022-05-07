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
            height: 100%;
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
        
        tbody{
            background-color: #0B2F49;
            font-weight: lighter;  
        }
        
        .forecast_tbl{
            background-color: transparent;
            font-size: 16px;
            margin: 12px 0;
            height: 60px;
        }
        
        .forecast_tbl tbody{
            background-color: transparent;
        }
        
        .forecast_tbl img{
            width: 30px;;
            height: 22px;
        }

    </style>        
</head>

<body style="width: 100%; height: 100%">
<div style="position:relative;width: 100%; height: 100%">
<div id="bdmap_container" style="width: 100%; height: 100% ;position: absolute;">dmg</div>
<div style="width: 100%; height: 98px; z-index: 2; position: absolute;
     font-size: 36px; color: white; text-align: center; background: url('images/dashboard/title_background.png') no-repeat; 
     background-size:100% 100%; padding-top: 12px; font-family: 微软雅黑;">智能云控平台</div>
<div style="width: 100%; height: 100%;  position: absolute; opacity: 0.5;">
    <img style="width: 100%; height: 100%;" src="images/dashboard/background.png"/></div>

    <div style='z-index: 2; position: absolute; left: 6px; top: 80px;'>
        <div class="item_container" style="width: 430px; height: 160px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>系统导航栏</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 439px; 
             background: url('images/dashboard/device_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>设备管理</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">设备状态</div>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">设备列表</div>
                <table>
                    <thead>
                        <td>序号</td>
                        <td>设备名称</td>
                        <td>状态</td>
                    </thead>
                    <tr>
                        <td>001</td>
                        <td>RSU0001</td>
                        <td>正常</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>RSU0001</td>
                        <td>正常</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>RSU0001</td>
                        <td>正常</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>RSU0001</td>
                        <td>正常</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>RSU0001</td>
                        <td>正常</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>RSU0001</td>
                        <td>正常</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>RSU0001</td>
                        <td>正常</td>                        
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 194px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>车流量统计</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
        </div>
    </div>


    <div style='z-index: 2; position: absolute; right: 6px; top: 80px;'>
        <div class="item_container" style="width: 430px; height: 160px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div>
                <span>环境信息</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            
<!--            <div style="float:left; width: 18%">
                <div>2022/05/05</div>
                <div>星期四</div>                
            </div>-->
            
            <div >
                <table class="forecast_tbl">
                    <tr>
                        <td>2022/05/05</td>                       
                        <td><img src="images/dashboard/wendu.png"/></td>
                        <td>湿度</td>
                        <td>30</td>
                        <td><img src="images/dashboard/shidu.png"/></td>
                        <td>湿度</td>
                        <td>23hPa</td>
                    </tr>
                    <tr>
                        <td>星期四</td>
                        <td><img src="images/dashboard/fengli.png"/></td>
                        <td>风力</td>
                        <td>62m/h</td>
                        <td><img src="images/dashboard/fengxiang.png"/></td>
                        <td>风向</td>
                        <td>东南</td>
                    </tr>                    
                </table>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 439px; 
             background: url('images/dashboard/device_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>事件统计</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">简要统计</div>
                <div id="chart_events"></div>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">事件列表</div>
                <table>
                    <thead>
                        <td>序号</td>
                        <td>事件</td>
                        <td>时间</td>
                    </thead>
                    <tr>
                        <td>001</td>
                        <td>团雾</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                </table>
            </div> 
        </div>
        

        <div class="item_container" style="width: 430px; height: 240px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div>
                <span>拥堵预警</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">严重拥堵</div>
               <table>
                    <thead>
                        <td>序号</td>
                        <td>事件</td>
                        <td>时间</td>
                    </thead>
                    <tr>
                        <td>001</td>
                        <td>团雾</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                </table>                
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">中度拥堵</div>
                <table>
                    <thead>
                        <td>序号</td>
                        <td>事件</td>
                        <td>时间</td>
                    </thead>
                    <tr>
                        <td>001</td>
                        <td>团雾</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                </table>
            </div>             
        </div>
    </div>
</div>
    
<script>
var map = new BMapGL.Map("bdmap_container", {
   coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                 // 指定完成后API将以指定的坐标类型处理您传入的坐标
});          // 创建地图实例  
var point = new BMapGL.Point(120.340579,36.18043);  // 创建点坐标  
map.centerAndZoom(point, 15);                 // 初始化地图，设置中心点坐标和地图级别 
map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

map.setMapStyleV2({     
  styleId: '3e91fe66b489f9a4e6836f790d1587b1'
});
    
var rsuIcon = new BMapGL.Icon("/images/dashboard/rsu.png", new BMapGL.Size(64, 64));
var obuIcon = new BMapGL.Icon("/images/obu_vehicle.png", new BMapGL.Size(31, 15));
var alertStartIcon = new BMapGL.Icon("/images/alertstart.png", new BMapGL.Size(24, 24));
var alertStopIcon = new BMapGL.Icon("/images/alertstop.png", new BMapGL.Size(24, 24));
    
function updateBdMapSummary(){
    $.ajax({
        type: "POST",
        url: "homebdmapsummary",
        dataType: "json",
        success: function (data) {
            map.clearOverlays();
            for(var i = 0; i < data.rsudevices.length; i++){
                rsuobj = data.rsudevices[i];
                
                let pt = new BMapGL.Point(rsuobj.rsulng, rsuobj.rsulat);
                var marker = new BMapGL.Marker(pt, {
                    icon: rsuIcon
                });
                
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
              
                var pt = new BMapGL.Point(obuobj.obulongtitude, obuobj.obulatitude);
                var marker = new BMapGL.Marker(pt, {
                    icon: obuIcon
                });
                // 将标注添加到地图
                map.addOverlay(marker);                
            }
            
            for(var i = 0; i < data.warnings.length; i++){
                warnobj = data.warnings[i];
                
                let pt = new BMapGL.Point(warnobj.startlng, warnobj.startlat);
                var marker = new BMapGL.Marker(pt, {
                    icon: alertStartIcon
                });
                
                // 创建信息窗口
                var opts = {
                    width: 200,
                    height: 30,
                    title: '预警'
                };
                let infoWindow = new BMapGL.InfoWindow(warnobj.winame, opts);                
                marker.addEventListener('click', function () {
                    map.openInfoWindow(infoWindow, pt); // 开启信息窗口  
                });                
                // 将标注添加到地图
                map.addOverlay(marker);
                
                if(warnobj.startlat !== warnobj.stoplat || warnobj.startlng !== warnobj.stoplng){
                    let ptstop = new BMapGL.Point(warnobj.stoplng, warnobj.stoplat);
                    var marker = new BMapGL.Marker(ptstop, {
                        icon: alertStopIcon
                    });
                    
                    marker.addEventListener('click', function () {
                        map.openInfoWindow(infoWindow, ptstop); // 开启信息窗口  
                    });                        
                    // 将标注添加到地图
                    map.addOverlay(marker);                    
                }
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


<!--事件统计-->
<script>
	Highcharts.chart('chart_events', {
		chart: {
                    backgroundColor: 'rgba(0,0,0,0)',
                    type: 'variablepie',
                    styledMode: true,
		},
		credits: {
			enabled: false
		},
                legend:{
                    verticalAlign:'bottom',
                },
                plotOptions: {
                    variablepie: {
                            dataLabels: {
                                    enabled: false,
                            },
                            center: ['50%', '25%'],
                            showInLegend: true
                        }
                },
		tooltip: {
			headerFormat: '',
			pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' + 'Area (square km): <b>{point.y}</b><br/>' + 'Population density (people per square km): <b>{point.z}</b><br/>'
		},
		series: [{
			minPointSize: 10,
			innerSize: '20%',
			zMin: 0,
			name: 'countries',
			data: [{
				name: '团雾',
				y: 505370,
				z: 92.9
			}, {
				name: '雨雪天气',
				y: 551500,
				z: 118.7
			}, {
				name: '交通事故',
				y: 312685,
				z: 124.6
			}, {
				name: '交通管制',
				y: 78867,
				z: 137.5
			}]
		}]
	});
</script>
</body>

</html>