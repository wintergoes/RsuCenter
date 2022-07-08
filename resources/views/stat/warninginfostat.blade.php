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

  var ctx = document.getElementById("chart1").getContext('2d');
   
  var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke1.addColorStop(0, '#6078ea');  
      gradientStroke1.addColorStop(1, '#17c5ea'); 
   
  var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke2.addColorStop(0, '#ff8359');
      gradientStroke2.addColorStop(1, '#ffdf40');

      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['04-01', '04-02', '04-03', '04-04', '04-05', '04-06', '04-07', '04-08', '04-09', '04-10', '04-11', '04-12', '04-01', '04-02', '04-03', '04-04', '04-05', '04-06', '04-07', '04-08', '04-09', '04-10', '04-11', '04-12'],
          datasets: [{
            label: '天气',
            data: [5, 0, 0, 3, 4, 5, 7, 0,0, 0, 0,4, 1, 1, 0, 0,0, 0, 0, 8,7, 6,0, 0],
            borderColor: gradientStroke1,
            backgroundColor: gradientStroke1,
            hoverBackgroundColor: gradientStroke1,
            pointRadius: 0,
            fill: false,
            borderWidth: 0
          }, {
            label: '事故',
            data: [0, 0, 0, 7,4, 4, 1, 0,2, 4,0, 1, 5, 0, 0, 3, 4, 5, 7, 0,0, 0, 0,4],
            borderColor: gradientStroke2,
            backgroundColor: gradientStroke2,
            hoverBackgroundColor: gradientStroke2,
            pointRadius: 0,
            fill: false,
            borderWidth: 0
          }]
        },
        zoom: {
            enabled: false,
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
                          barPercentage: .5
                    }]
                }
            }
        });

	// chart 1
	
	$('#chart1').sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8,6,4,5,8,7,10,9,5,8,7,9,5,4,8,7,10,9,5,8,7,9,5,4], {
            type: 'bar',
            height: '25',
            barWidth: '2',
            resize: true,
            barSpacing: '2',
            barColor: '#008cff'
        });

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