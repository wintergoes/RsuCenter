@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
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

<h5 class="card-title">事件信息统计</h5>
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
                    <td class="search_td"><input name="fromdate" id="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="16" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" id="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="16" value="{{$searchtodate}}"/></td>
                    <td class="search_td"><select class="form-select" id="quickdateselector"/></td>
                    <td class="search_td">&nbsp;&nbsp;<button type="button" onclick="drawChart();" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                    
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
                                                    <b>事件类型统计</b>
						</h6>
					</div>

                                        <div class="dropdown ms-auto">
                                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-horizontal-rounded font-22 text-option">
                                                </i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" onclick="showEventTrendChart();" href="javascript:;">图表</a>
                                                    <a class="dropdown-item" onclick="showEventTrendTable();" href="javascript:;">表格</a>
                                                </li>
                                            </ul>
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
					<canvas id="chart1" width="515" height="320" style="display: block; width: 515px; height: 320px;"
					class="chartjs-render-monitor">
					</canvas>
				</div>
                            
                            <div style="display: none;" id="eventtrendtablecontainer">
                                <table id="eventtrendtbl" class="table mb-0 table-hover table-bordered" >
       
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
    
	<div class="col-12 col-lg-6">
		<div class="card radius-6">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h6 class="mb-3">
							<b>事件来源占比统计</b>
						</h6>
					</div>
				</div>                            
                            
				<div style="height:320px;">
                                    <canvas id="chartEventSource" ></canvas>
				</div>
			</div>
		</div>
	</div>    
</div>



<script>

// chart 1
function drawChart(){
    var ctx = document.getElementById("chart1").getContext('2d');
    var barcolors = ['#008000', '#FF69B4', '#ADD8E6', '#90EE90', '#778899', '#800000', '#9370DB', '#191970'];

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "eventtrendsummary?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val(),
        dataType: "json",
        success: function (data) {
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
                celltitle.innerHTML = data.esdata[i].name;
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
            
            console.log(esdataset);
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: data.labels,
                datasets: esdataset
              },

              options:{
                  maintainAspectRatio: false,
                  legend: {
                        position: 'bottom',
                        display: true,
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
    
    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
        }
    });
}
drawChart();

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

function drawEventTypeStat(){
    var ctx = document.getElementById("chartEventType").getContext('2d');
    var barcolors = ['#008000', '#FF69B4', '#ADD8E6', '#90EE90', '#778899', '#800000', '#9370DB', '#191970'];
    var barhovercolors = ['#008033', '#FF6933', '#ADD833', '#90EE33', '#778833', '#800033', '#937033', '#191933'];

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "eventtypestatjson?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val(),
        dataType: "json",
        success: function (data) {
            var etdataset = [];
            var etlabels = [];
            
            var bgcolor = [];
            var hoverbgcolor = [];
            var summarydata = [];
            for(var i = 0; i < data.summary.length; i++){
                etlabels.push(data.summary[i].tecname);
                
                bgcolor[i] = barcolors[i];
                hoverbgcolor[i] = barhovercolors[i];
                summarydata[i] = data.summary[i].wcount;
            }
            
            var etdataitem = {};
            etdataitem["backgroundColor"] = bgcolor;
            etdataitem["hoverBackgroundColor"] = hoverbgcolor;            
            etdataitem["data"] = summarydata;
            etdataset.push(etdataitem);
            var myChart = new Chart(ctx, {
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
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            setTimeout("drawEventTypeStat()", 3000);
        }
    });
}

function drawEventSourceStat(){
    var ctx = document.getElementById("chartEventSource").getContext('2d');
    var barcolors = ['#008000', '#FF69B4', '#ADD8E6', '#90EE90', '#778899', '#800000', '#9370DB', '#191970'];
    var barhovercolors = ['#008033', '#FF6933', '#ADD833', '#90EE33', '#778833', '#800033', '#937033', '#191933'];

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "eventsourcestatjson?fromdate=" + $("#fromdate").val() + "&todate=" + $("#todate").val(),
        dataType: "json",
        success: function (data) {
            var etdataset = [];
            var etlabels = [];
            
            var bgcolor = [];
            var hoverbgcolor = [];
            var summarydata = [];
            for(var i = 0; i < data.summary.length; i++){
                etlabels.push(data.summary[i].sourcename);
                
                bgcolor[i] = barcolors[i];
                hoverbgcolor[i] = barhovercolors[i];
                summarydata[i] = data.summary[i].scount;
            }
            
            var etdataitem = {};
            etdataitem["backgroundColor"] = bgcolor;
            etdataitem["hoverBackgroundColor"] = hoverbgcolor;            
            etdataitem["data"] = summarydata;
            etdataset.push(etdataitem);
            var myChart = new Chart(ctx, {
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
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            setTimeout("drawEventTypeStat()", 3000);
        }
    });
}
  
  drawEventTypeStat();
  drawEventSourceStat();
</script>
@endsection