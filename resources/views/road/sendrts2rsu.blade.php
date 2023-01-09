@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script> 
<script type="text/javascript" src="/api/bdmapjs"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<script language="javascript" type="text/javascript" src="/js/zlzl.js"></script>
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<script>
    function submitData(){
        if($("#selectedRsu").val() === ""){
            alert("请选择要接收的Rsu设备。");
            return;            
        }
        
        if($("#starttime").val() === ""){
            alert("开始时间不能为空，请输入开始时间。");
            return;            
        }
        
        if($("#endtime").val() === ""){
            alert("结束时间不能为空，请输入结束时间。");
            return;            
        }        
        
        var elements = document.getElementsByName("signs[]");
        var selectCount = 0;
        for(var i=0;i<elements.length;i++){
            if(elements[i].checked){
                selectCount++;
            }
        }
        
        if(selectCount === 0){
            alert("请选择要发送的事件。");
            return;
        }
        
        $("#form1").submit();
    }
</script>

<h5 class="card-title">交通标志下发RSU</h5>
<hr>

<?php
$minstarttime = "2050-01-01 00:00:00";
$maxendtime = "2000-01-01 00:00:00";
?>

<form class="form-horizontal" id="form1" method="post" action="/sendrts2rsusave">
    {{ csrf_field() }}      
<div class="dataTables_wrapper dt-bootstrap5 mb-3">
    <div class="row">
        @if (count($trafficsigns) > 0)
        <div class="col-sm-12">           
            <table class="table mb-0 table-hover table-bordered" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th >选择</th>
                        <th >ID</th>
                        <th >标志名称</th>
                        <th >图片</th>
                        <th >参数</th>
                        <th >位置</th>
                        <th >开始时间</th>
                        <th >结束时间</th>    
                        <th >创建日期</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $commonctrl = new \App\Http\Controllers\CommonController() ?>
                    @foreach($trafficsigns as $sign)
                    <?php
                        $minstarttime = min($minstarttime, $sign->starttime);
                        $maxendtime = max($maxendtime, $sign->endtime);
                    ?>
                    <tr>
                        <td><input type="checkbox" name="signs[]" id="event{{$sign->id}}" value="{{$sign->id}}" checked="checked"></td>
                        <td>{{$sign->id}}</td>
                        <td>{{$sign->tsname}}</td>
                        <td><img src="images/trafficsigns/sign_type_{{$sign->tscid}}.png" onerror="this.src='images/trafficsigns/sign_type_none.png';"></td>
                        <td>{{$sign->tsparam1 == "" ? "-" : $sign->tsparam1}}</td>
                        <td><button type="button" class="btn btn-transparent" data-bs-toggle="modal" onclick="showDevicePosition('{{$sign->tscid}}', '{{$sign->tsname}}', {{$sign->tslng}}, {{$sign->tslat}})" data-bs-target="#exampleWarningModal">查看</button></td>
                        <td>{{$sign->starttime}}</td>
                        <td>{{$sign->endtime}}</td> 
                        <td>{{$sign->created_at}}</td>
                    </tr>
                    @endforeach                            
                </tbody>
            </table>
            
            <div class="modal fade" id="exampleWarningModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" >
                            <div class="modal-content bg-light" >
                                <div class="card radius-6 border-1 border-grey111111">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 card-title" id="map_title">
                                                    <i class="bx bx-map">
                                                    </i>
                                                </h6>
                                            </div> 
                                        </div>
                                        <div class="col-sm-12" id="bdmap_container" style="height: 600px;"></div>    
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>              
        </div>
        @else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">没有符合条件的交通标志信息！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
    
<div class="row">
    <div class="col col-lg-12 mx-auto">

    </div>
</div>
@if (count($trafficsigns) > 0)
<div class="row">
    <div class="col-12 col-lg-12 border-1">
        <div class="card radius-6  border-1">
            <div class="card-body">
        <div class="row mb-3" style=" padding-left: 6px;">
            <label for="" class="col-sm-1 col-form-label" style="text-align: left;">开始时间：</label>
            <div class="col-sm-2" style="text-align: right;">
                <input type="text" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  value="{{$minstarttime}}" autocomplete="off" id="starttime" name="starttime" placeholder="请输入开始时间">
            </div>
            
            <label for="" class="col-sm-3 col-form-label" ></label>
            
            <label for="" class="col-sm-1 col-form-label" style="text-align: left;">结束时间：</label>
            <div class="col-sm-2" style="text-align: right;">
                <input type="text" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" value="{{$maxendtime}}"  autocomplete="off" id="endtime" name="endtime" placeholder="请输入开始时间">
            </div>            
        </div>                
                
                <div class="d-flex align-items-center mb-3">
                    <label for="" class="col-sm-1 col-form-label" style="text-align: left;" onclick="showRsuMap();" style="cursor: pointer;">选择要发送的RSU：</label>
                    <div class="col-sm-2">
                        <input type="text" id="selectedRsu" name="selectedRsu" readonly="readonly" class="form-control">
                    </div>
                    
                    <div class="col-sm-1">
                        <input type="button" onclick="showRsuMap()" value="选择RSU" class="form-control">
                    </div>
                </div>
                <div id="bdmap_rsu_container" style="width: 100%; height: 400px; visibility: hidden; display: none; "></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col col-lg-12 mx-auto">
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">发送</button>
            </div>
        </div>
    </div>
</div>
@endif

</form>
<script>
function showDevicePosition(tscid, tsname, lng, lat){
    var tscidInt = parseInt(tscid);
    var rsuIcon = new BMapGL.Icon("/images/trafficevents/traffic_event_" + tscidInt + ".png", new BMapGL.Size(32, 32));        
    var map = new BMapGL.Map("bdmap_container", {
       coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                     // 指定完成后API将以指定的坐标类型处理您传入的坐标
    });          // 创建地图实例  
    
    var latlng = coordtransform.wgs84togcj02(lng, lat);
    latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);
    var tmplng = latlng[0];
    var tmplat = latlng[1];      
    
    var point = new BMapGL.Point(tmplat, tmplng);  // 创建点坐标  
    map.centerAndZoom(point, 15); 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    
    map.addEventListener("tilesloaded",function(){
        $("#map_title").text(tsname + " 位置信息");
        map.clearOverlays();
                       
        var pt = new BMapGL.Point(tmplng, tmplat);
        var marker = new BMapGL.Marker(pt, {
            icon: rsuIcon,
            offset: new BMapGL.Size(0, 0)
        });
        map.addOverlay(marker);

        var label = new BMapGL.Label(tsname, {       // 创建文本标注
            position: pt,                          // 设置标注的地理位置
            offset: new BMapGL.Size(-30, -40)           // 设置标注的偏移量
        })    

        marker.setLabel(label); 
        map.setCenter(pt);
    });
}

var rsumarkers = []
var mapRsu = new BMapGL.Map("bdmap_rsu_container", {
   coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
});          // 创建地图实例  
var point = new BMapGL.Point({{$default_lng}}, {{$default_lat}});  // 创建点坐标  
mapRsu.centerAndZoom(point, {{$default_zoom}});                 // 初始化地图，设置中心点坐标和地图级别 
mapRsu.setMinZoom(6);
mapRsu.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

var rsuIcon = new BMapGL.Icon("/images/dashboard/rsu_device.png", new BMapGL.Size(24, 24));
var getRsuTimer ;
var selectRsuRadom;
function showRsuOnMap(tscid, tsname, lng, lat){
    $.ajax({
        type: "GET",
        url: "getrsuonline",
        dataType: "json",
        success: function (data) {
            for(var i = 0; i < data.rsus.length; i++){
                (function(i){
                    rsuobj = data.rsus[i];

                    var latlng = coordtransform.wgs84togcj02(rsuobj.RSU_lng, rsuobj.RSU_lat);
                    latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);
                    var tmplng = latlng[0];
                    var tmplat = latlng[1];      

                    var point = new BMapGL.Point(tmplat, tmplng);  // 创建点坐标  
    //                mapRsu.centerAndZoom(point, 15); 
    //                mapRsu.setCenter(point);

                    var marker = new BMapGL.Marker(point, {
                        icon: rsuIcon,
                        offset: new BMapGL.Size(0, -10)
                    });

                    marker.setTitle(rsuobj.log_radom + ", " + rsuobj.device_id);
                    rsumarkers.push(marker);                

                    marker.addEventListener('click', function () {
                        rsuIds = marker.getTitle().split(",")
                        selectRsuRadom = rsuIds[0];
                        $("#selectedRsu").val(rsuIds[1].trim());
                        clearTimeout(getRsuTimer);
                        document.getElementById("bdmap_rsu_container").style.visibility = 'hidden';
                        document.getElementById("bdmap_rsu_container").style.display = 'none'; 
                        //map.openInfoWindow(infoWindow, pt); // 开启信息窗口  
                    });
                    // 将标注添加到地图
                    mapRsu.addOverlay(marker);
                })(i);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //setTimeout('updateBdMapSummary()', 10000);    
        }
    });
    
    getRsuTimer = setTimeout("showRsuOnMap()", 5000);
}

function showRsuMap(){
    if(document.getElementById("bdmap_rsu_container").style.visibility !== "visible"){
        document.getElementById("bdmap_rsu_container").style.visibility = 'visible';
        document.getElementById("bdmap_rsu_container").style.display = '';
        showRsuOnMap();
    } else {
        document.getElementById("bdmap_rsu_container").style.visibility = 'hidden';
        document.getElementById("bdmap_rsu_container").style.display = 'none';         
    }
}
</script>
@endsection