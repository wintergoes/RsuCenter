@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>   
<script src="js/zlzl.js"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>  
<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个雷视设备吗？') == false){
            return;
        }
        
        window.location.href= 'deleteradardevice?id=' + gtid;
    }
</script>

<h5 class="card-title">OBU设备列表</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addradardevice"><button type="button" class="btn btn-outline-success px-2 radius-6">新增雷视设备</button></a>
    </div>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($radardevices) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >设备编号</th>
                        <th >Mac地址</th>
                        <th >ip地址</th>
                        <th >视频流地址</th>
                        <th >端口</th>
                        <th >车道数</th>
                        <th >车道宽度</th>
                        <th >坐标</th>
                        <th >状态</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($radardevices as $radar)
                    <tr>
                        <td >{{$radar->id}}</td>
                        <td>{{$radar->devicecode}}</td>
                        <td>{{$radar->macaddress}}</td>
                        <td>{{$radar->ipaddress == "" ? "-" : $radar->ipaddress}}</td>
                        <td>{{$radar->videostreamaddress == "" ? "-" : $radar->videostreamaddress}}</td>
                        <td>{{$radar->httpstreamport}}</td>
                        <td>{{$radar->lanenumber}}</td>
                        <td>{{$radar->lanewidth == "" ? "-" : $radar->lanewidth}}</td>
                        @if($radar->lng == 0 || $radar->lat == 0)
                        <td>未设置</td>
                        @else
                        <td><button type="button" class="btn btn-transparent" style="padding: 0px; margin: 0px;"  data-bs-toggle="modal" onclick="showRadarPosition('{{$radar->devicecode}}', {{$radar->lng}}, {{$radar->lat}})" data-bs-target="#exampleWarningModal">查看</button></td>
                        @endif
                        <td>{{$radar->status == 1 ? "有效" : "无效"}}</td>                        
                        <td >{{$radar->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="editradardevice?id={{$radar->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$radar->id}});">删除</a></li>
                                    </ul>
                            </div>
                        </td>
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
                <div class="text-info">雷视设备列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>


<script>
var radarIcon = new BMapGL.Icon("/images/dashboard/radarvision.png", new BMapGL.Size(24, 24));        
    
function showRadarPosition(dcode, lng, lat){
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
       
        var latlng = coordtransform.wgs84togcj02(lng, lat);
        latlng = coordtransform.gcj02tobd09(latlng[0], latlng[1]);                 
        var pt = new BMapGL.Point(latlng[0], latlng[1]);

        var marker = new BMapGL.Marker(pt, {
            icon: radarIcon,
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
</script>
@endsection