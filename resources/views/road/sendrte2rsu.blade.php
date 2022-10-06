@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script> 
<script type="text/javascript" src="/api/bdmapjs"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<script language="javascript" type="text/javascript" src="/js/zlzl.js"></script>
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个预警信息吗？') == false){
            return;
        }
        
        window.location.href= 'deletewarninginfo?id=' + gtid;
    }
    
    function showWinfoOnMap(){
        
    }
    
    function submitData(){
        $("#form1").submit();
    }
</script>

<h5 class="card-title">事件下发</h5>
<hr>

<form class="form-horizontal" id="form1" method="post" action="/sendrte2rsusave">
    {{ csrf_field() }}      
<div class="dataTables_wrapper dt-bootstrap5 mb-3">
    <div class="row">
        @if (count($warninginfo) > 0)        
        <div class="col-sm-12">           
            <table class="table mb-0 table-hover table-bordered" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th >选择</th>
                        <th >预警名称</th>
                        <th >起始坐标</th>
                        <th >影响半径</th>
                        <th >开始时间</th>
                        <th >结束时间</th>
                        <th >来源</th>
                        <th >创建者</th>
                        <th >状态</th>
                        <th >创建日期</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $commonctrl = new \App\Http\Controllers\CommonController() ?>
                    @foreach($warninginfo as $winfo)
                    <tr>
                        <td><input type="checkbox" name="events[]" id="event{{$winfo->id}}" value="{{$winfo->id}}"></td>
                        <td>{{$winfo->winame}}</td>
                        <td><button type="button" class="btn btn-transparent" data-bs-toggle="modal" onclick="showDevicePosition('{{$winfo->teccode}}', '{{$winfo->winame}}', {{$winfo->startlng}}, {{$winfo->startlat}})" data-bs-target="#exampleWarningModal">查看</button></td>
                        <td>{{$winfo->wiradius}}米</td>
                        <td>{{$winfo->starttime}}</td>
                        <td>{{$winfo->endtime}}</td>
                        <td>{{$commonctrl->eventSource2Str($winfo->wisource)}}</td>
                        <td>{{$winfo->realname}}</td>
                        <td>{{$winfo->wistatus == 1 ? "有效" : "无效"}}</td>
                        <td>{{$winfo->created_at}}</td>
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
                <div class="text-info">没有符合条件的预警信息！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
    
<div class="row">
    <div class="col col-lg-12 mx-auto">

    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-12 border-1">
        <div class="card radius-6  border-1">
            <div class="card-body">
        <div class="row mb-3" style=" padding-left: 6px;">
            <label for="" class="col-sm-1 col-form-label" style="text-align: left;">开始时间：</label>
            <div class="col-sm-2" style="text-align: right;">
                <input type="text" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  autocomplete="off" id="starttime" name="starttime" placeholder="请输入开始时间">
            </div>
            
            <label for="" class="col-sm-3 col-form-label" ></label>
            
            <label for="" class="col-sm-1 col-form-label" style="text-align: left;">结束时间：</label>
            <div class="col-sm-2" style="text-align: right;">
                <input type="text" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  autocomplete="off" id="endtime" name="endtime" placeholder="请输入开始时间">
            </div>            
        </div>                
                
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <span class="mb-0 card-title" onclick="showRsuMap();" style="cursor: pointer;">
                            <b>选择要发送的RSU：</b>
                        </span>
                        <span id="selectedRsuSpan"><input id="selectedRsu" name="selectedRsu" readonly="readonly"></span>
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

                    var pt = new BMapGL.Point(rsuobj.RSU_lng, rsuobj.RSU_lat);
                    var marker = new BMapGL.Marker(pt, {
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