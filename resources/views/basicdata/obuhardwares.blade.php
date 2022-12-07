@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>   
<script src="js/zlzl.js"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>  
<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个设备吗？') == false){
            return;
        }
        
        window.location.href= 'deletedevice?deviceid=' + gtid;
    }
</script>

<h5 class="card-title">Obu设备列表</h5>
<hr>
<?php
$commonctrl = new \App\Http\Controllers\CommonController();
?>
<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($obuhardwares) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered text-center" >
                <thead>
                    <tr role="row">
                        <th >设备编号</th>
                        <th >设备状态</th>
                        <th >坐标</th>
                        <th >通讯时间</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obuhardwares as $hw)
                    <?php
                    $errstr = $commonctrl->getObuError($hw, '<font color=red>', '</font><br/>');
                    ?>
                    <tr>
                        <td align='left'>{{$hw->device_ID}}</td>
                        @if ($errstr != "")
                        <td ><button type="button" class="btn btn-transparent" style="font-size: 14px;text-decoration:underline;" data-bs-toggle="modal" onclick='showRsuError("{{$hw->device_ID}}", {{$hw->score}}, "{!!$errstr!!}");' data-bs-target="#rsuErrorInfo">{!! $commonctrl->getRsuScoreStr($hw->score) !!}</input></td>
                        @else
                        <td >{!! $commonctrl->getRsuScoreStr($hw->score) !!}</td>
                        @endif
                        @if($hw->obulatitude ==0 || $hw->obulongtitude == 0)
                        <td  >未设置</td>
                        @else
                        <td><button type="button" class="btn btn-transparent" style="font-size: 14px;text-decoration:underline; color:blue;" data-bs-toggle="modal" onclick="showDevicePosition('{{$hw->device_ID}}', {{$hw->obulongtitude}}, {{$hw->obulatitude}})" data-bs-target="#exampleWarningModal">查看</button></td>
                        @endif
                        <td>{{$hw->con_datetime == "" ? "-" : $hw->con_datetime}}</td>
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
            
            <div class="modal fade" id="rsuErrorInfo" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" >
                            <div class="modal-content bg-light" >
                                <div class="card radius-6 border-1">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 card-title">
                                                    <i class="bx bx-devices"  id="rsuErrorTitle">
                                                    </i>
                                                    
                                                </h6>
                                            </div> 
                                        </div> 
                                        <div class="col-sm-12" id="rsuErrorContent" style='padding: 10px;'></div>    
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>            
        </div>
        @else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">设备列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>

<script>
var rsuIcon = new BMapGL.Icon("/images/dashboard/rsu_device.png", new BMapGL.Size(24, 24));        
    
function showDevicePosition(dcode, lng, lat){
    var map = new BMapGL.Map("bdmap_container", {
       coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                     // 指定完成后API将以指定的坐标类型处理您传入的坐标
    });          // 创建地图实例  
    var point = new BMapGL.Point(39, 120);  // 创建点坐标  
    map.centerAndZoom(point, 15); 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    
    map.addEventListener("tilesloaded",function(){
        $("#map_title").text(dcode + " 位置信息");
        map.clearOverlays();
                       
        var pt = new BMapGL.Point(lng, lat);
        var marker = new BMapGL.Marker(pt, {
            icon: rsuIcon,
            offset: new BMapGL.Size(0, 0)
        });
        map.addOverlay(marker);

        var label = new BMapGL.Label(dcode, {       // 创建文本标注
            position: pt,                          // 设置标注的地理位置
            offset: new BMapGL.Size(-30, -40)           // 设置标注的偏移量
        })    

        marker.setLabel(label); 
        map.setCenter(pt);        
    });

}

function showRsuError(devicecode, score, errorstr){
    $("#rsuErrorTitle").text(" [" + devicecode + "] 错误详情(" + score + ")");
    $("#rsuErrorContent").html(errorstr);
}
</script>
@endsection