@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-center" style="width: 90%;">
                        <p class="mb-0">
                            RSU数量
                        </p>
                        <h4 class="my-1 text-info" id="rsucount">
                            0台
                        </h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle text-white ms-auto">
                        <i class="bx bxs-radio">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-center" style="width: 90%;">
                        <p class="mb-0 ">
                            OBU数量
                        </p>
                        <h4 class="my-1 text-info" id="obucount">
                            0台
                        </h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle  text-white ms-auto">
                        <i class="bx bxs-devices">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-center" style="width: 90%;">
                        <p class="mb-0 ">
                            道路预警信息
                        </p>
                        <h4 class="my-1 text-danger" id="warncount">
                            0个
                        </h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle  text-white ms-auto">
                        <i class="bx bxs-no-entry">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-center" style="width: 90%;">
                        <p class="mb-0 ">
                            道路风险规避
                        </p>
                        <h4 class="my-1 text-success">
                            360次
                        </h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle  text-white ms-auto">
                        <i class="bx bxs-time">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-8 border-1">
        <div class="card radius-6  border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <h6 class="mb-0 card-title">
                            <i class="bx bx-map">
                            </i>
                            路段实况图
                        </h6>
                    </div>
                    <div class="d-flex align-items-center ms-auto font-13 gap-2">
                        <span class="border px-1 rounded cursor-pointer">
                            <img src="images/rsu_device.png" height="15" style="vertical-align: middle;"></img>
                            RSU
                        </span>
                        <span class="border px-1 rounded cursor-pointer">
                            <img src="images/obu_vehicle.png" width="25" style="vertical-align: middle;"></img>
                            OBU
                        </span>
                        <span class="border px-1 rounded cursor-pointer">
                            <img src="images/alertstop.png" width="15" height="15" style="vertical-align: middle;"></img>
                            异常信息
                        </span>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-horizontal-rounded font-22 text-option">
                            </i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:;">
                                    查看详情
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="bdmap_container" style="width: 100%; height: 630px">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 ">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <h6 class="mb-0">
                            <i class="bx bx-video-plus">
                            </i>
                            实时图像
                        </h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-horizontal-rounded font-22 text-option">
                            </i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:;">
                                    更多
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                    @foreach($obus as $obu)
                    <div class="col">
                        <div class="">
                            <video autoplay="autoplay" onended="onVideoEnded({{$obu->id}})" id="video{{$obu->id}}" muted="muted" controls class="card-img-top">
                                <source src="getnewobuvideo?obuid={{$obu->id}}" type="video/mp4">
                            </video>
                            <div class="card-body text-center">
                                <p class="card-title">
                                    {{$obu->obuid}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var map = new BMapGL.Map("bdmap_container", {
   coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                 // 指定完成后API将以指定的坐标类型处理您传入的坐标
});          // 创建地图实例  
var point = new BMapGL.Point({{$default_lng}}, {{$default_lat}});  // 创建点坐标  
map.centerAndZoom(point, {{$default_zoom}});                 // 初始化地图，设置中心点坐标和地图级别 
map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    
var rsuIcon = new BMapGL.Icon("/images/rsu_device.png", new BMapGL.Size(24, 24));
var obuIcon = new BMapGL.Icon("/images/obu_vehicle.png", new BMapGL.Size(31, 15));
var alertStartIcon = new BMapGL.Icon("/images/alertstart.png", new BMapGL.Size(24, 24));
var alertStopIcon = new BMapGL.Icon("/images/alertstop.png", new BMapGL.Size(24, 24));
    
function updateBdMapSummary(){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
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


<script>
function updateHomeSummary(){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "POST",
        url: "homedatasummary",
        dataType: "json",
        success: function (data) {
            $('#rsucount').text(data[0].rsucount + "台");
            $('#obucount').text(data[0].obucount + "台");
            $('#warncount').text(data[0].warncount + "个");
            setTimeout('updateHomeSummary()', 5000);    
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            setTimeout('updateHomeSummary()', 10000);    
        }
    });
}
updateHomeSummary();
</script>


<script>
//video视频播放完成的事件
function onVideoEnded(obuid) {
    var aud = document.getElementById('video' + obuid);
    aud.src = "getnewobuvideo?obuid=" + obuid;
};    
</script>
@endsection