@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>  
<script type="text/javascript" src="/api/bdmapjs"></script>
<script language="javascript" type="text/javascript" src="/js/zlzl.js"></script>
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个交通标志信息吗？') == false){
            return;
        }
        
        window.location.href= 'deletetrafficsign?id=' + gtid;
    }
    
    function showWinfoOnMap(){
        
    }
</script>

<h5 class="card-title">交通标志管理</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addtrafficsign"><button type="button" class="btn btn-outline-success px-2 radius-6">新增交通标志</button></a>
    </div>
</div>


<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($trafficsigns) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >标志名称</th>
                        <th >图片</th>
                        <th >参数</th>
                        <th >位置</th>
                        <th >开始时间</th>
                        <th >结束时间</th>                        
                        <th >维护人员</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $commonctrl = new \App\Http\Controllers\CommonController() ?>
                    @foreach($trafficsigns as $sign)
                    <tr>
                        <td>{{$sign->id}}</td>
                        <td>{{$sign->tsname}}</td>
                        <td><img src="images/trafficsigns/sign_type_{{$sign->tscid}}.png" onerror="this.src='images/trafficsigns/sign_type_none.png';"></td>
                        <td>{{$sign->tsparam1 == "" ? "-" : $sign->tsparam1}}</td>
                        <td><button type="button" class="btn btn-transparent" data-bs-toggle="modal" onclick="showDevicePosition('{{$sign->tscid}}', '{{$sign->tsname}}', {{$sign->tslng}}, {{$sign->tslat}})" data-bs-target="#exampleWarningModal">查看</button></td>
                        <td>{{$sign->starttime}}</td>
                        <td>{{$sign->endtime}}</td>                        
                        <td>{{$sign->realname}}</td>
                        <td>{{$sign->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="edittrafficsign?id={{$sign->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$sign->id}});">删除</a></li>
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
                <div class="text-info">没有符合条件的交通标志信息！</div>
        </div>
        </div>
        @endif         
    </div>
</div>

@if(count($trafficsigns) > 0)
<div style="margin-top: 10px;">
   
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $trafficsigns->links() }}  
    </div> 
    </nav>
</div>

<script>
formatPagelinks();
</script>
@endif
<script>
fillQuickDateSelector("quickdateselector", "fromdate", "todate");    
</script>


<script>
    
function showDevicePosition(tscid, tsname, lng, lat){
    var rsuIcon = new BMapGL.Icon("/images/trafficsigns/sign_type_" + tscid + ".png", new BMapGL.Size(32, 32));        
    var map = new BMapGL.Map("bdmap_container", {
       coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                     // 指定完成后API将以指定的坐标类型处理您传入的坐标
    });          // 创建地图实例  
    var point = new BMapGL.Point(39, 120);  // 创建点坐标  
    map.centerAndZoom(point, 15); 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    
    map.addEventListener("tilesloaded",function(){
        $("#map_title").text(tsname + " 位置信息");
        map.clearOverlays();
                       
        var pt = new BMapGL.Point(lng, lat);
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
</script>
@endsection