@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>
<script language="javascript" type="text/javascript" src="/js/hikvision.js"></script>


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

<h5 class="card-title">雷视事件信息统计</h5>
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
                    <td class="search_td">&nbsp;&nbsp;<button type="button" onclick="drawAllChart();" class="btn btn-outline-secondary px-1 radius-6"><div class="spinner-border spinner-border-sm" role="status" id="loadinganimation"> <span class="visually-hidden">Loading...</span></div>查询</button></td>
                    
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
                            <ul class="nav nav-tabs nav-primary mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#eventstatChart" role="tab" aria-selected="true">
                                                    <div class="d-flex align-items-center">
                                                            <div class="tab-icon"><i class="bx bx-chart font-18 me-1"></i>
                                                            </div>
                                                            <div class="tab-title">事件类型趋势图</div>
                                                    </div>
                                            </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#eventstatTable" role="tab" aria-selected="false">
                                                    <div class="d-flex align-items-center">
                                                            <div class="tab-icon"><i class="bx bx-table font-18 me-1"></i>
                                                            </div>
                                                            <div class="tab-title">事件按日统计列表</div>
                                                    </div>
                                            </a>
                                    </li>
                            </ul>
                            
                            <div class="tab-content py-2">
                                <div class="tab-pane fade active show" id="eventstatChart" role="tabpanel"> 
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
                                            <canvas id="chart1" width="515" height="320" style="display: block; width: 515px; height: 320px;"
                                            class="chartjs-render-monitor">
                                            </canvas>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="eventstatTable" role="tabpanel">
                                    <div id="eventtrendtablecontainer">
                                        <table id="eventtrendtbl" class="table mb-0 table-hover table-bordered" >

                                        </table>
                                    </div>
                                </div>
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
							<b>事件分时段统计图</b>
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
							<b>事件类型占比统计</b>
						</h6>
					</div>
				</div>                            
                            
				<div id="chart11" style="height:320px;">
                                    <canvas id="chartEventType" ></canvas>
				</div>
			</div>
		</div>
	</div>
       
</div>



<script>

// chart 1
var eventTrendChart ;
function drawChart(){
    var ctx = document.getElementById("chart1").getContext('2d');
    var barcolors = ['#59a4ff', '#ffbd2a', '#b37feb', '#4ace82', '#ff745c', '#26d0ff', '#f6cc00', '#c04ee6'];

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "radareventtrendsummary?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val(),
        dataType: "text",
        success: function (datatext) {
            var khpos = datatext.indexOf("{");
            var newtext = datatext.substr(khpos, datatext.length);
            //alert(newtext);
            data = JSON.parse(newtext);
            var esdataset = [];
                    //获取table表格对象
            var ta=document.getElementById("eventtrendtbl");
            for(var i = ta.rows.length - 1; i >= 0 ; i--){
                ta.rows[i].remove();
            }
            
            var tr1=ta.insertRow(0);
            tr1.insertCell(0);
            for(var i = 0; i < data.esdata.length; i++){
                var celltitle=tr1.insertCell(i + 1);
                celltitle.style.textAlign="center";
                celltitle.innerHTML = "<b>" + data.esdata[i].name + "</b>";
            }
            
            for(var i = 0; i < data.esdata.length; i++){
                var tecdata = {};
                tecdata.label = data.esdata[i].name;
                
                var dataary = [];
                for(var j = 0; j < data.esdata[i].summary.length; j++){
                    dataary.push(data.esdata[i].summary[j].count);
                    
                    if(ta.rows.length <= j + 1){
                        var trdata=ta.insertRow(ta.rows.length);
                        var celldate = trdata.insertCell(0);
                        celldate.innerHTML = data.esdata[i].summary[j].date;
                        for(var k = 0; k < data.esdata.length; k++){
                            var cellcount=trdata.insertCell(k + 1);
                            cellcount.style.textAlign="center";
                        }    
                    }
                    ta.rows[j+1].cells[i+1].innerHTML = data.esdata[i].summary[j].count === null ? "0" : data.esdata[i].summary[j].count;
                }
                tecdata["data"] = dataary;
                tecdata["backgroundColor"] = barcolors[i];
                esdataset.push(tecdata);           
            }
            
            if(eventTrendChart){
                eventTrendChart.clear();
                eventTrendChart.destroy();
            }
            eventTrendChart = new Chart(ctx, {
            type: 'line',
            backgroundColor: '#ffffff',
            data: {
              labels: data.labels,
              datasets: esdataset
            },

            options:{
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
                }
            });
            
            eventCharFinished = true;
            checkAllFinished()  
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            eventCharFinished = true;
            checkAllFinished()                
//            alert(textStatus);
        }
    });
}


function showEventTrendTable(){
    document.getElementById("eventtrendtablecontainer").style.visibility = 'visible';
    document.getElementById("eventtrendtablecontainer").style.display = '';
    document.getElementById("eventtrendchartcontainer").style.visibility = 'hidden';
    document.getElementById("eventtrendchartcontainer").style.display = 'none'; 
}

function showEventTrendChart(){
    document.getElementById("eventtrendtablecontainer").style.visibility = 'hidden';
    document.getElementById("eventtrendtablecontainer").style.display = 'none';
    document.getElementById("eventtrendchartcontainer").style.visibility = 'visible';
    document.getElementById("eventtrendchartcontainer").style.display = ''; 
}

fillQuickDateSelector("quickdateselector", "fromdate", "todate");

var eventTypeChart;
function drawEventTypeStat(){
    var ctx = document.getElementById("chartEventType").getContext('2d');
    var barcolors = ['#6aa3fa', '#f2ae49', '#ac83e3', '#71ca88', '#ef7d65', '#62cffa', '#f1cc47', '#b359df', '#d9d7d8', '#70e7cb'];
    var barhovercolors = ['#6991cc', '#c89752', '#977abd', '#6daa7e', '#c47566', '#63aecd', '#c5ad4d', '#995cb9', '#b5b3b4', '#6dc0ae'];

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "radareventtypestatjson?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val(),
        dataType: "text",
        success: function (datatext) {
            var khpos = datatext.indexOf("{");
            var newtext = datatext.substr(khpos, datatext.length);
            //alert(newtext);
            data = JSON.parse(newtext);            
            var etdataset = [];
            var etlabels = [];
            
            var bgcolor = [];
            var hoverbgcolor = [];
            var summarydata = [];
            for(var i = 0; i < data.summary.length; i++){
                etlabels.push(hkEvent2Str(data.summary[i].aidevent));
                
                bgcolor[i] = barcolors[i];
                hoverbgcolor[i] = barhovercolors[i];
                summarydata[i] = data.summary[i].wcount;
            }
            
            var etdataitem = {};
            etdataitem["backgroundColor"] = bgcolor;
            etdataitem["hoverBackgroundColor"] = hoverbgcolor;            
            etdataitem["data"] = summarydata;
            etdataset.push(etdataitem);
            
            if(eventTypeChart){
                eventTypeChart.clear();
                eventTypeChart.destroy();
            }
            eventTypeChart = new Chart(ctx, {
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
                  
            eventTypeStatFinished = true;
            checkAllFinished()
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            eventTypeStatFinished = true;
            checkAllFinished() 
        }
    });
}


var vehflowHourChart;
function drawRadarEventHourStat(){
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
    
    $.getJSON("vehflowhourstatjson?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val(),function(data){
        var clabels = [];
        var cvalues = [];
        
        var daycount = 1;
        if($("#fromdate").val() !== $("#todate").val()){
            daycount = GetDateDiff($("#fromdate").val(), $("#todate").val(), "day");
        }         

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
                    cvalues.push(Math.round(data["vehflow"][i]["vehcount"] / daycount));
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
       
       eventHourStatFinished = true;
       checkAllFinished();
   });
}

function checkAllFinished(){
    if(eventCharFinished && eventTypeStatFinished && eventHourStatFinished){
//    if(vehBrandStatFinished){
        document.getElementById("loadinganimation").style.visibility = 'hidden';
        document.getElementById("loadinganimation").style.display = 'none'; 
    }
}
    
var eventCharFinished = false;
var eventTypeStatFinished = false;
var eventHourStatFinished = false;
function drawAllChart(){
    eventCharFinished = false;
    eventTypeStatFinished = false;
    eventHourStatFinished = false;    
    
    document.getElementById("loadinganimation").style.visibility = 'visible';
    document.getElementById("loadinganimation").style.display = '';     
    
    drawChart(); 
    drawEventTypeStat();
    drawRadarEventHourStat();    
}

drawAllChart();
</script>
@endsection