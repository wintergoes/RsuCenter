@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>   
<script src="js/zlzl.js"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>  
<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个OBU设备吗？') == false){
            return;
        }
        
        window.location.href= 'deleteobudevice?id=' + gtid;
    }
</script>

<h5 class="card-title">OBU平板列表</h5>
<hr>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($obudevices) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >OBUID</th>
                        <th >终端ID</th>
                        <th >OBU硬件</th>
                        <th >状态</th>
                        <th >关联车辆</th>
                        <th >最后坐标</th>
                        <th >备注</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obudevices as $obu)
                    <tr>
                        <td >{{$obu->id}}</td>
                        <td>{{$obu->obuid}}</td>
                        <td>{{$obu->obulocalid}}</td>
                        <td>{{$obu->obuhardware == "" ? "-" : $obu->obuhardware}}</td>
                        <td>{{$obu->obustatus == 1 ? "有效" : "无效"}}</td>
                        <td>{{$obu->plateno == "" ? "-" : $obu->plateno}}</td>
                        @if($obu->obulongtitude == 0 || $obu->obulatitude == 0)
                        <td align='center'>未设置</td>
                        @else
                        <td><button type="button" class="btn btn-transparent" style="font-size: 14px;text-decoration:underline; color:blue;" data-bs-toggle="modal" onclick="showObuPosition('{{$obu->obuid}}', {{$obu->obulongtitude}}, {{$obu->obulatitude}})" data-bs-target="#exampleWarningModal">查看</button></td>
                        @endif
                        <td>{{$obu->oburemark == "" ? "-" : $obu->oburemark}}</td>
                        <td >{{$obu->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="editobudevice?obuid={{$obu->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$obu->id}});">删除</a></li>
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
                <div class="text-info">OBU设备列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 


<script>
var obuIcon = new BMapGL.Icon("/images/obu_vehicle.png", new BMapGL.Size(15, 31));  

function showObuPosition(dcode, lng, lat){
    if(lng === 0 || lat === 0){
        alert("未设置坐标！");
        return ;
    }
    
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
            icon: obuIcon,
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