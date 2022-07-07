@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>


<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	
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

<h5 class="card-title">预警信息统计</h5>
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
                    <td class="search_td"><input name="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="16" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="16" value="{{$searchtodate}}"/></td>                 
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
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
	<div class="col-12 col-lg-8">
		<div class="card radius-6">
			<div class="card-body">
				<div class="d-flex align-items-center">
                                        <div>
						<h6 class="mb-3">
							日预警类型统计
						</h6>
					</div>
				</div>
				<div class="chart-container-0">
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
		</div>
	</div>
	<div class="col-12 col-lg-4">
		<div class="card radius-6">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h6 class="mb-3">
							预警类型占比统计
						</h6>
					</div>
				</div>                            
                            
				<div id="chart11" style="height:320px;">
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
        url: "eventtrendsummary?fromdate=2022-07-01&todate=2022-07-07",
        dataType: "json",
        success: function (data) {
            var esdataset = [];
            for(var i = 0; i < data.esdata.length; i++){
                var tecdata = {};
                tecdata.label = data.esdata[i].name;
                
                var dataary = [];
                for(var j = 0; j < data.esdata[i].summary.length; j++){
                    dataary.push(data.esdata[i].summary[j].count);
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
                                barPercentage: .5
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
 // chart 11 
	
	Morris.Donut({
		element: 'chart11',
		data: [{
			label: "天气",
			value: 15,

		}, {
			label: "事故",
			value: 30
		}, {
			label: "施工",
			value: 20
		}],
		resize: true,
		colors:['#008cff', '#15ca20', '#fd3550']
	});
</script>
@endsection