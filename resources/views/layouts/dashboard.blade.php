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
	<title>RSU????????????</title>
        
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
                <span>???????????????</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 410px; 
             background: url('images/dashboard/device_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>????????????</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">????????????</div>
                <div style="margin-top: 20px;">
                    <canvas id="chart_devices"></canvas>
                </div>
                
                <div style="width: 100%; font-size: 12px; margin-top: 36px;">
                    <div style="float: left;"><img src="images/dashboard/device_chart_zc.png"></div>
                    <div style="width: 90px; margin-left: 6px; float: left;">????????????</div>
                    <div id="normaldevicepercent">70%</div>
                </div>
                
                <div style="width: 100%; font-size: 12px; margin-top: 16px;">
                    <div style="float: left;"><img src="images/dashboard/device_chart_yc.png"></div>
                    <div style="width: 90px; margin-left: 6px; float: left;">????????????</div>
                    <div id="abnormaldevicepercent">30%</div>
                </div>                
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">????????????</div>
                <table id='device_table'>
                    <thead>
                        <td>??????</td>
                        <td>????????????</td>
                        <td>??????</td>
                    </thead>
                </table>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 240px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div >
                <span>???????????????</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div style="margin-top: 30px; float: left;">
                <canvas id="chart_veh_flow"></canvas>
            </div>
            <div style="width: 20%; position: absolute; right: 1px; margin-top: 30px;">
                <p class="stat_button" id='vehflowtoday' onclick="showVehFlowChart(10);">??????</p>
                <p class="stat_button" id='vehflow7day' onclick="showVehFlowChart(7);">7???</p>
                <p class="stat_button" id='vehflow30day' onclick="showVehFlowChart(30);">1??????</p>
            </div>
        </div>
    </div>


    <div style='z-index: 10; position: absolute; right: 0px; top: 80px;'>
        <div class="item_container" style="width: 430px; height: 160px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div>
                <span>????????????</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            
            
            <div >
                <table class="forecast_tbl">
                    <tr>
                        <td><span id='datespan'></span></td>                       
                        <td><img src="images/dashboard/wendu.png"/></td>
                        <td>??????</td>
                        <td>30</td>
                        <td><img src="images/dashboard/shidu.png"/></td>
                        <td>??????</td>
                        <td>23hPa</td>
                    </tr>
                    <tr>
                        <td><span id='weekday'>?????????</span> <img src="images/dashboard/sunshine.png"></td>
                        <td><img src="images/dashboard/fengli.png"/></td>
                        <td>??????</td>
                        <td>62Km/h</td>
                        <td><img src="images/dashboard/fengxiang.png"/></td>
                        <td>??????</td>
                        <td>??????</td>
                    </tr>                    
                </table>
            </div>
        </div>
        
        <div class="item_container" style="width: 430px; height: 410px; 
             background: url('images/dashboard/device_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div>
                <span>????????????</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle" id="event_sub_title">????????????</div>
                <div style=" margin-top: 10px; width: 100%;">
                    <span class="stat_button_active" id="eventtoday" onclick="showEventByDay(0);">??????</span>
                    <span class="stat_button" id="event7day" onclick="showEventByDay(7);">7???</span>
                    <span class="stat_button" id="event30day" onclick="showEventByDay(30);">1??????</span>
                </div>                
                <div id="chart_events_container" style="width: 100%; text-align: center;">
                    <canvas id="chart_events" width="180" height="260"></canvas>
                </div>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">????????????</div>
                <table id="traffic_event_table">
                    <thead>
                        <td>??????</td>
                        <td>??????</td>
                        <td>??????</td>
                    </thead>
                </table>
            </div> 
        </div>
        

        <div class="item_container" style="width: 430px; height: 240px; 
             background: url('images/dashboard/nav_background.png') no-repeat;
                 background-size:100% 100%; ">
            <div>
                <span>????????????</span>
                <span class="item_title_suffix"><img src="images/dashboard/title_suffix.png"/></span>
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">????????????</div>
               <table>
                    <thead>
                        <td>??????</td>
                        <td>??????</td>
                    </thead>
                    <tr>
                        <td>??????</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>????????????</td>
                        <td>10:30:00</td>                        
                    </tr>
                </table>                
            </div>
            <div class="item_sub_div">
                <div class="item_subtitle">????????????</div>
                <table>
                    <thead>
                        <td>??????</td>
                        <td>??????</td>
                    </thead>
                    <tr>
                        <td>??????</td>
                        <td>10:30:00</td>                        
                    </tr>
                    <tr>
                        <td>????????????</td>
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
   coordsType: 5 // coordsType????????????????????????????????????3???gcj02?????????5???bd0ll??????????????????5???
                 // ???????????????API???????????????????????????????????????????????????
});          // ??????????????????  
var point = new BMapGL.Point(120.340579,36.18043);  // ???????????????  
map.centerAndZoom(point, 15);                 // ?????????????????????????????????????????????????????? 
map.enableScrollWheelZoom(true);     //????????????????????????

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
                
                // ??????????????????
                var opts = {
                    width: 200,
                    height: 30,
                    title: 'RSU'
                };
                let infoWindow = new BMapGL.InfoWindow(rsuobj.devicecode, opts);                  
                
                marker.addEventListener('click', function () {
                    map.openInfoWindow(infoWindow, pt); // ??????????????????  
                });
                // ????????????????????????
                map.addOverlay(marker);
            }
            
            for(var i = 0; i < data.obudevices.length; i++){
                obuobj = data.obudevices[i];
              
                var pt = new BMapGL.Point(obuobj.obulongtitude, obuobj.obulatitude);
                var marker = new BMapGL.Marker(pt, {
                    icon: obuIcon
                });
                // ????????????????????????
                map.addOverlay(marker);                
            }
            
            for(var i = 0; i < data.warnings.length; i++){
                warnobj = data.warnings[i];
                
                let pt = new BMapGL.Point(warnobj.startlng, warnobj.startlat);
                var marker = new BMapGL.Marker(pt, {
                    icon: alertStartIcon
                });
                
                // ??????????????????
                var opts = {
                    width: 200,
                    height: 30,
                    title: '??????'
                };
                let infoWindow = new BMapGL.InfoWindow(warnobj.winame, opts);                
                marker.addEventListener('click', function () {
                    map.openInfoWindow(infoWindow, pt); // ??????????????????  
                });                
                // ????????????????????????
                map.addOverlay(marker);
                
                if(warnobj.startlat !== warnobj.stoplat || warnobj.startlng !== warnobj.stoplng){
                    let ptstop = new BMapGL.Point(warnobj.stoplng, warnobj.stoplat);
                    var marker = new BMapGL.Marker(ptstop, {
                        icon: alertStopIcon
                    });
                    
                    marker.addEventListener('click', function () {
                        map.openInfoWindow(infoWindow, ptstop); // ??????????????????  
                    });                        
                    // ????????????????????????
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


<!--????????????-->
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
        var rows = tbl.rows; //?????????????????????

        for (var i = rows.length - 1; i > 0 ; i--) {
            tbl.deleteRow(i);    
        }

        var maxid = Math.min(7, data["events"].length);
        for(var i=0;i<maxid;i++){
            var tr=tbl.insertRow(i+1);
            tr.className = "tr_content";
                        //???????????????
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
            $("#chart_events_container").html('<br/><br/><br/><br/>???????????????');
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
function showVehFlowChart(reqcount){
    $('#vehflowtoday').attr('class', "stat_button");
    $('#vehflow7day').attr('class', "stat_button");
    $('#vehflow30day').attr('class', "stat_button");
    if(reqcount === 10){
        $('#vehflowtoday').attr('class', "stat_button_active");
    } else if(reqcount === 7){
        $('#vehflow7day').attr('class', "stat_button_active");
    } else {
        $('#vehflow30day').attr('class', "stat_button_active");
    }
    
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

    $.getJSON("dashboardvehflow?reqcount=" + reqcount,function(data){
        var clabels = [];
            var cvalues = [];

            for(var i=0;i<data["vehflow"].length;i++){
               clabels.push(data["vehflow"][i]["date"]);
               cvalues.push(data["vehflow"][i]["value"]);
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
   });
}

var globalNormalPercent = 0;
var deviceStatusChart ;
function showDeviceStatus(){
    //return;
    $.getJSON("dashboarddevices",function(data){
        var tbl = document.getElementById("device_table");
        var rows = tbl.rows; //?????????????????????

        for (var i = rows.length - 1; i > 0 ; i--) {
            tbl.deleteRow(i);    
        }

        var maxid = Math.min(7, data["devices"].length);
        for(var i=0;i<maxid;i++){
            var tr=tbl.insertRow(i+1);
            tr.className = "tr_content";
                        //???????????????
            var cell0=tr.insertCell(0);
            cell0.innerHTML = i+1;
            var cell1=tr.insertCell(1);
            cell1.innerHTML=data["devices"][i]["devicecode"];
            var cell2=tr.insertCell(2);

            if(data["devices"][i]["dstatus"] === 1){
                cell2.innerHTML="??????"; 
                normalDeviceCounter++;
            } else {
                cell2.innerHTML="??????"; 
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
                    labels: ["????????????", "????????????"],
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
//video???????????????????????????
function onVideoEnded(obuid) {
    var aud = document.getElementById('video' + obuid);
    aud.src = "getnewobuvideo?obuid=" + obuid;
};    


function getWeekDay() { 
    var myDate= new Date(); 
    var str = ''; 
     
    var Week = ['???','???','???','???','???','???','???']; 
    str += ' ??????' + Week[myDate.getDay()]; 
    
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
    showVehFlowChart(7);
    getWeekDay();
    showDate();    
}
refreshAll();
</script>
</body>

</html>