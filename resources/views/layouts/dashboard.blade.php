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
        
        .tr_content{
            background-color: #0B2F49;
            font-weight: lighter;  
        }
        
        .forecast_tbl{
            background-color: transparent;
            font-size: 15px;
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
            text-align: center; 
            background: url('images/dashboard/title_background.png') no-repeat center; 
    
            padding-top: 12px;
        }
        
    </style>        
</head>

<body style="width: 100%; height: 100%">
<div id='dashboard_left' style="position:relative;width: 84%; height: 100%; float: left;">
    <div id="bdmap_container" style="width: 100%; height: 100% ;position: absolute;">dmg</div>
    <div id="dashboard_title">
        <img src="images/dashboard/dashboard_title.png">
    </div>
    <div id="mask_layer" style="width: 100%; height: 100%;  position: absolute; opacity: 0.5;">
        <img style="width: 100%; height: 100%;" src="images/dashboard/background.png"/>
    </div>

    <div style='z-index: 10; position: absolute; left: 0px; top: 80px;'>
        <div class="item_container" style="width: 430px; height: 160px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>系统导航栏</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 410px; 
             background: url('images/dashboard/device_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>设备管理</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">设备状态</div>
                <div style="margin-top: 20px;">
                    <canvas id="chart_devices"></canvas>
                </div>
                
                <div style="width: 100%; font-size: 12px; margin-top: 36px;">
                    <div style="float: left;"><img src="images/dashboard/device_chart_zc.png"></div>
                    <div style="width: 90px; margin-left: 6px; float: left;">正常设备</div>
                    <div id="normaldevicepercent">70%</div>
                </div>
                
                <div style="width: 100%; font-size: 12px; margin-top: 16px;">
                    <div style="float: left;"><img src="images/dashboard/device_chart_yc.png"></div>
                    <div style="width: 90px; margin-left: 6px; float: left;">异常设备</div>
                    <div id="abnormaldevicepercent">30%</div>
                </div>                
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">设备列表</div>
                <table id='device_table'>
                    <thead>
                        <td>序号</td>
                        <td>设备名称</td>
                        <td>状态</td>
                    </thead>
                </table>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 240px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>车流量统计</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div style="margin-top: 30px; float: left;">
                <canvas id="chart_veh_flow"></canvas>
            </div>
            <div style="width: 20%; position: absolute; right: 1px; margin-top: 30px;">
                <p class="stat_button_active" id='vehflowtoday' onclick="showVehFlowChartByDay(0);">今日</p>
                <p class="stat_button" id='vehflow7day' onclick="showVehFlowChartByDay(7);">7天</p>
                <p class="stat_button" id='vehflow30day' onclick="showVehFlowChartByDay(30);">1个月</p>
            </div>
        </div>
    </div>


    <div style='z-index: 10; position: absolute; right: 0px; top: 80px;'>
        <div class="item_container" style="width: 430px; height: 160px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div>
                <span>环境信息</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            
            
            <div >
                <table class="forecast_tbl">
                    <tr>
                        <td><span id='datespan'></span></td>                       
                        <td><img src="images/dashboard/wendu.png"/></td>
                        <td>湿度</td>
                        <td>30</td>
                        <td><img src="images/dashboard/shidu.png"/></td>
                        <td>湿度</td>
                        <td>23hPa</td>
                    </tr>
                    <tr>
                        <td><span id='weekday'>星期四</span> <img src="images/dashboard/sunshine.png"></td>
                        <td><img src="images/dashboard/fengli.png"/></td>
                        <td>风力</td>
                        <td>62Km/h</td>
                        <td><img src="images/dashboard/fengxiang.png"/></td>
                        <td>风向</td>
                        <td>东南</td>
                    </tr>                    
                </table>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 410px; 
             background: url('images/dashboard/device_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div>
                <span>事件统计</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle" id="event_sub_title">简要统计</div>
                <div style=" margin-top: 10px; width: 100%;">
                    <span class="stat_button_active" id="eventtoday" onclick="showEventByDay(0);">今日</span>
                    <span class="stat_button" id="event7day" onclick="showEventByDay(7);">7天</span>
                    <span class="stat_button" id="event30day" onclick="showEventByDay(30);">1个月</span>
                </div>                
                <div id="chart_events_container" style="width: 100%; text-align: center;">
                    <canvas id="chart_events" width="180" height="260"></canvas>
                </div>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">事件列表</div>
                <table id="traffic_event_table">
                    <thead>
                        <td>序号</td>
                        <td>事件</td>
                        <td>时间</td>
                    </thead>
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
                        <td>路段</td>
                        <td>时间</td>
                    </thead>
                    <tr>
                        <td>团雾</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                </table>                
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">中度拥堵</div>
                <table>
                    <thead>
                        <td>路段</td>
                        <td>时间</td>
                    </thead>
                    <tr>
                        <td>团雾</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>交通事故</td>
                        <td>10:30:00</td>                        
                    </tr>
                </table>
            </div>             
        </div>
    </div>
</div>

<div id="obu_videos" style="width: 240px; height: 100%; position: absolute; right: 0px; padding: 16px;
     background-color: #04090B; font-size: 12px; ">
                @foreach($obus as $obu)
                <div >
                    <div style="background: url('images/dashboard/video_background.png') no-repeat; 
                         background-size: 100% 100%; height: 135px; padding: 6px;">
                    <video autoplay="autoplay" onended="onVideoEnded({{$obu->id}})" id="video{{$obu->id}}" muted="muted" controls class="card-img-top">
                        <source src="getnewobuvideo?obuid={{$obu->id}}" type="video/mp4">
                    </div>
                    </video>
                        <div class=" text-center" style="padding: 3px;">
                        <p class="card-title">
                            {{$obu->obuid}}
                        </p>
                    </div>
                </div>
                @endforeach        
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
        type: "GET",
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
                
                var latlng = coordtransform.wgs84togcj02(warnobj.startlng, warnobj.startlat);
                latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
                let pt = new BMapGL.Point(latlng[0], latlng[1]);
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
                    var latlng1 = coordtransform.wgs84togcj02(warnobj.stoplng, warnobj.stoplat);
                    latlng1 = coordtransform.gcj02tobd09(latlng1[0], latlng1[1]); 
                    
                    let ptstop = new BMapGL.Point(latlng1[0], latlng1[1]);
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
            //setTimeout('updateBdMapSummary()', 10000);    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //setTimeout('updateBdMapSummary()', 10000);    
        }
    });
}

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
    var constpiecolors = ["#2e9fff", "#2968f6", "#e02e89", "#13f9fe", '#59a4ff', '#ffbd2a', '#b37feb', '#4ace82', '#ff745c', '#26d0ff', '#f6cc00', '#c04ee6'];
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

        var maxid = Math.min(7, data["events"].length);
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
            $("#chart_events_container").html('<br/><br/><br/><br/>暂无数据。');
        } else {
            $("#chart_events_container").html('<canvas id="chart_events" width="180" height="200"></canvas>');

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
            
            for(var k = 1; k < 24; k++){
                clabels.push(k);
                var haveHour = false;
                for(var i=0;i<data["vehflow"].length;i++){
                    if(data["vehflow"][i]["vfhour"] === k.toString()){
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

var globalNormalPercent = 0;
var deviceStatusChart ;
function showDeviceStatus(){
    //return;
    $.getJSON("dashboarddevices",function(data){
        var tbl = document.getElementById("device_table");
        var rows = tbl.rows; //获取表格的行数

        for (var i = rows.length - 1; i > 0 ; i--) {
            tbl.deleteRow(i);    
        }

        var maxid = Math.min(7, data["devices"].length);
        for(var i=0;i<maxid;i++){
            var tr=tbl.insertRow(i+1);
            tr.className = "tr_content";
                        //添加单元格
            var cell0=tr.insertCell(0);
            cell0.innerHTML = i+1;
            var cell1=tr.insertCell(1);
            cell1.innerHTML=data["devices"][i]["devicecode"];
            var cell2=tr.insertCell(2);

            if(data["devices"][i]["dstatus"] === 1){
                cell2.innerHTML="正常"; 
                normalDeviceCounter++;
            } else {
                cell2.innerHTML="异常"; 
            }
        }
        
        var normalDeviceCounter = 0;   
        for(var i=0;i< data["devices"].length;i++){
            if(data["devices"][i]["dstatus"] === 1){
                normalDeviceCounter++;
            }
        }        
        var normalPercent = (normalDeviceCounter / data["devices"].length) * 100;
        var abnormalPercent = ((data["devices"].length - normalDeviceCounter) / data["devices"].length) * 100;
        $("#normaldevicepercent").html(normalPercent.toFixed(0) + "%");
        $("#abnormaldevicepercent").html(abnormalPercent.toFixed(0) + "%");
        
        if(normalPercent !== globalNormalPercent){
            globalNormalPercent = normalPercent;
            var abnormalDeviceCounter = data["devices"].length - normalDeviceCounter;
            var ctx = document.getElementById('chart_devices').getContext('2d');    
            var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
              gradientStroke1.addColorStop(0, 'rgba(32, 242, 233, 1)');  
              gradientStroke1.addColorStop(1, 'rgba(41, 150, 246, 1)'); 

            var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
              gradientStroke3.addColorStop(0, 'rgba(65, 126, 255, 1)');  
              gradientStroke3.addColorStop(1, 'rgba(86, 157, 253, 1)');  

            if(deviceStatusChart){
                deviceStatusChart.clear();
                deviceStatusChart.destroy();
            }          
            // chart 6
            deviceStatusChart = new Chart(document.getElementById("chart_devices"), {
                type: 'doughnut',
                data: {
                    labels: ["正常设备", "异常设备"],
                    datasets: [{
                            label: "",
                            backgroundColor: [gradientStroke1, gradientStroke3],
                            data: [normalDeviceCounter, abnormalDeviceCounter],
                            borderColor: 'rgba(255, 255, 255, 0.3)',
                            hoverBackgroundColor: [gradientStroke1, gradientStroke3],
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    title: {
                            display: false,
                            text: ''
                    },
                    legend: {
                        display: false,
                    }
                }
            });        
        }        
    }); 
}

$(window).on('resize',function(){
    resizePage();
    //alert(window.innerWidth);
});

function resizePage(){
    if(window.innerWidth < 1400){
        $("#dashboard_left").width(window.innerWidth);
        $("#obu_videos").css('display', 'none');
    } else {
        $("#dashboard_left").width(window.innerWidth - $("#obu_videos").width() - 32);
        $("#obu_videos").css('display', '');
    }
}

resizePage();
//alert($("#obu_videos").attr('display'));
</script>

<script>
//video视频播放完成的事件
function onVideoEnded(obuid) {
    var aud = document.getElementById('video' + obuid);
    aud.src = "getnewobuvideo?obuid=" + obuid;
};    


function getWeekDay() { 
    var myDate= new Date(); 
    var str = ''; 
     
    var Week = ['日','一','二','三','四','五','六']; 
    str += ' 星期' + Week[myDate.getDay()]; 
    
    $('#weekday').text(str);
} 

function showDate() { 
    var myDate= new Date(); 
    var str = myDate.toLocaleDateString(); 
    
    $('#datespan').text(str);
}

function hideBd(){
    var el = [],
    _el = document.getElementsByClassName('anchorBL');
    for (var i=0; i<_el.length; i++ ) {
        _el[i].style.display = "none";
    }    
}

function refreshAll(){
    setTimeout('refreshAll()', 5000);
    
    hideBd();
    showDeviceStatus();
    updateBdMapSummary();
    showEvents();
    showVehFlowChart();
    getWeekDay();
    showDate();    
}
refreshAll();
</script>
</body>

</html>