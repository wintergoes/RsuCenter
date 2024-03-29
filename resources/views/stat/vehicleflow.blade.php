@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/hikvision.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>


<script src="assets/js/pace.min.js"></script>

	
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
	<script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<!--Morris JavaScript -->
	<script src="assets/plugins/raphael/raphael-min.js"></script>
	<script src="assets/plugins/morris/js/morris.js"></script>

<h5 class="card-title">车流量统计</h5>
<hr>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-10">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }}      
            <table style="font-size: 12px; text-align: center;" >
                <tr>                   
                    <td class="search_td">日期 自&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="fromdate" id="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" id="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchtodate}}"/></td>
                    <td class="search_td"><select class="form-select" id="quickdateselector"/></td>
                    <td class="search_td">&nbsp;&nbsp;雷视设备：&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="radarmac" id="radarmac" class="form-select" >
                            <option value="" >不限</option>
                            @foreach ($radars as $radar)
                            <option value="{{$radar->macaddrint}}" {{$radar->macaddrint == $searchradar ? "selected" : ""}}>{{$radar->devicecode}}</option>
                            @endforeach
                        </select>                        
                    </td>                 
                    <td class="search_td">&nbsp;&nbsp;
                        <button type="button" onclick="drawAllChart();" class="btn btn-outline-secondary px-1 radius-6"><div class="spinner-border spinner-border-sm" role="status" id="loadinganimation"> <span class="visually-hidden">Loading...</span></div>查询</button>
                    </td>
                    
                </tr>
            </table>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  

<div class="row">
	<div class="col-12 col-lg-12">
		<div class="card radius-6">
			<div class="card-body">
				<div class="d-flex align-items-center">
                                        <div>
						<h6 class="mb-3">
                                                    <b>车流量趋势图</b>
						</h6>
					</div>
				</div>
				<div class="chart-container-0" id="eventtrendchartcontainer">
					<div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
						<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
							</div>
						</div>
						<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:200%;height:200%;left:0; top:0">
							</div>
						</div>
					</div>
					<canvas id="chart_veh_flow" width="515" height="320" style="display: block; width: 515px; height: 320px;"
					class="chartjs-render-monitor">
					</canvas>
				</div>
                            
                            <div style="display: none;" id="eventtrendtablecontainer">
                                <table id="vehflowtbl" class="table mb-0 table-hover table-bordered" >
       
                                </table>
                            </div>
			</div>
		</div>
	</div>
    
	<div class="col-12 col-lg-6">
		<div class="card radius-6">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h6 class="mb-3">
							<b>车流量时段统计图</b>
						</h6>
					</div>
				</div>                            
                            
				<div id="chart11" style="height:320px;">
                                    <canvas id="chart_vehflow_hours" ></canvas>
				</div>
			</div>
		</div>
	</div>
    
	<div class="col-12 col-lg-6">
		<div class="card radius-6">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h6 class="mb-3">
							<b>车流量车辆类型占比图</b>
						</h6>
					</div>
				</div>                            
                            
				<div style="height:320px;">
                                    <canvas id="veh_type_chart" ></canvas>
				</div>
			</div>
		</div>
	</div> 
</div>

<script>

var vehflowChart ;
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
                    position: 'bottom',
                    display: false,
                        labels: {
                            boxWidth:8
                        }
                    },
                    tooltips: {
                      displayColors:false,
                    },	
                    scales: {
                        xAxes: [{
                              barPercentage: .66
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]                        
                    }
    };

    $.getJSON("vehflowstatjson?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val() + "&radarmac=" + $("#radarmac").val(),function(data){
        if($("#fromdate").val() !== $("#todate").val()){
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
                clabels.push(k + ":00");
                var haveHour = false;
                var kstr = "";
                if(k < 10){
                    kstr = "0" + k.toString();
                } else {
                    kstr = k.toString();
                } 
                for(var i=0;i<data["vehflow"].length;i++){
                    if(data["vehflow"][i]["vfhour"] === kstr){
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
        
        vehflowFinished = true;
        checkAllFinished(); 
   });
}

fillQuickDateSelector("quickdateselector", "fromdate", "todate");

var vehflowHourChart;
function drawVehFlowHourStat(){
    var ctx = document.getElementById("chart_vehflow_hours").getContext('2d');
    var barcolors = ['#6aa3fa', '#f2ae49', '#ac83e3', '#71ca88', '#ef7d65', '#62cffa', '#f1cc47', '#b359df', '#d9d7d8', '#70e7cb'];
    var barhovercolors = ['#6991cc', '#c89752', '#977abd', '#6daa7e', '#c47566', '#63aecd', '#c5ad4d', '#995cb9', '#b5b3b4', '#6dc0ae'];

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    }); 
    
    var chartoptions = {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    },
                    tooltips: {
                      displayColors:false,
                    },	
                    scales: {
                        xAxes: [{
                              barPercentage: .66
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]                        
                    }
    };    
    
    $.getJSON("vehflowhourstatjson?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val() + "&radarmac=" + $("#radarmac").val(),function(data){
        var clabels = [];
        var cvalues = [];
        var daycount = 1;
        if($("#fromdate").val() !== $("#todate").val()){
            daycount = GetDateDiff($("#fromdate").val(), $("#todate").val(), "day");
        } 
        //alert(daycount);

        for(var k = 1; k < 24; k++){
            clabels.push(k + ":00");
            var haveHour = false;
            var kstr = "";
            if(k < 10){
                kstr = "0" + k.toString();
            } else {
                kstr = k.toString();
            }             
            for(var i=0;i<data["vehflow"].length;i++){
                if(data["vehflow"][i]["vfhour"] === kstr){
                    cvalues.push(Math.round(data["vehflow"][i]["vehcount"]/daycount));
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
               backgroundColor: "#88d73e",
               pointRadius :"0",
               pointHoverRadius:"0",
               borderWidth: 3                            
           }]
        };

        if(vehflowHourChart){
            vehflowHourChart.clear();
            vehflowHourChart.destroy();
        }
        vehflowHourChart = new Chart(ctx, {
           type: "bar",
           data: data1,
           options: chartoptions
       });    
       
        vehFlowHourStatFinished = true;
        checkAllFinished();       
   });
}

var vehTypeChart;
function drawVehTypeStat(){
    var ctx = document.getElementById("veh_type_chart").getContext('2d');
    var barcolors = ['#6aa3fa', '#f2ae49', '#ac83e3', '#71ca88', '#ef7d65', '#62cffa', '#f1cc47', '#b359df', '#d9d7d8', '#70e7cb'];
    var barhovercolors = ['#6991cc', '#c89752', '#977abd', '#6daa7e', '#c47566', '#63aecd', '#c5ad4d', '#995cb9', '#b5b3b4', '#6dc0ae'];

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "vehflowtypestatjson?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val() + "&radarmac=" + $("#radarmac").val(),
        dataType: "json",
        success: function (data) {
            var etdataset = [];
            var etlabels = [];
            
            var bgcolor = [];
            var hoverbgcolor = [];
            var summarydata = [];
            for(var i = 0; i < data.vehtypes.length; i++){
                etlabels.push(hkVehType2StrForVehdetection(data.vehtypes[i].vehicletype));
                
                bgcolor[i] = barcolors[i];
                hoverbgcolor[i] = barhovercolors[i];
                summarydata[i] = data.vehtypes[i].vehtypecount;
            }
            
            var etdataitem = {};
            etdataitem["backgroundColor"] = bgcolor;
            etdataitem["hoverBackgroundColor"] = hoverbgcolor;            
            etdataitem["data"] = summarydata;
            etdataset.push(etdataitem);
            
            if(vehTypeChart){
                vehTypeChart.clear();
                vehTypeChart.destroy();
            }
            vehTypeChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: etlabels,
                        datasets: etdataset,
                    },
                    options: {
                        maintainAspectRatio: false,
                        cutoutPercentage: 0,
                        legend: {
                          position: 'left',
                          display: true,
                        labels: {
                            boxWidth:8
                            }
                        },
                        tooltips: {
                            displayColors:false,
                        },
                    }
                  });    
            vehTypeStatFinished = true;
            checkAllFinished();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            vehTypeStatFinished = true;
            checkAllFinished();
        }
    });
}

function checkAllFinished(){
    if(vehflowFinished && vehFlowHourStatFinished && vehTypeStatFinished ){
//    if(vehBrandStatFinished){
        document.getElementById("loadinganimation").style.visibility = 'hidden';
        document.getElementById("loadinganimation").style.display = 'none'; 
    }
}

var vehflowFinished = false;
var vehFlowHourStatFinished = false;
var vehTypeStatFinished = false;
function drawAllChart(){
    vehflowFinished = false;
    vehFlowHourStatFinished = false;
    vehTypeStatFinished = false;
    
    document.getElementById("loadinganimation").style.visibility = 'visible';
    document.getElementById("loadinganimation").style.display = '';    
    
    showVehFlowChart(); 
    drawVehFlowHourStat();
    drawVehTypeStat(); 
}

drawAllChart();
</script>
@endsection