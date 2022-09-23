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
</script>

<h5 class="card-title">事件管理</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addwarninginfo"><button type="button" class="btn btn-outline-success px-2 radius-6">新增事件</button></a>
    </div>
</div>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }}
            <table style="font-size: 12px; text-align: center;" >
                <tr>                   
                    <td class="search_td">创建日期 自&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="fromdate" id="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" id="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchtodate}}"/></td>
                    <td class="search_td"><select class="form-select" id="quickdateselector"/></td>
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;状态&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="wistatus" class="form-select"  style="width: 80px">
                            <option value="-1">全部</option>
                            <option value="0" {{$searchwistatus == "0" ? "selected" : ""}}>无效</option>
                            <option value="1" {{$searchwistatus == "1" ? "selected" : ""}}>有效</option>
                        </select>
                    </td>                    
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                </tr>
            </table>
        </form>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($warninginfo) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >预警名称</th>
                        <th >起始坐标</th>
                        <th >影响半径</th>
                        <th >开始时间</th>
                        <th >结束时间</th>
                        <th >来源</th>
                        <th >创建者</th>
                        <th >状态</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $commonctrl = new \App\Http\Controllers\CommonController() ?>
                    @foreach($warninginfo as $winfo)
                    <tr>
                        <td>{{$winfo->id}}</td>
                        <td>{{$winfo->winame}}</td>
                        <td><button type="button" class="btn btn-transparent" data-bs-toggle="modal" onclick="showDevicePosition('{{$winfo->teccode}}', '{{$winfo->winame}}', {{$winfo->startlng}}, {{$winfo->startlat}})" data-bs-target="#exampleWarningModal">查看</button></td>
                        <td>{{$winfo->wiradius}}米</td>
                        <td>{{$winfo->starttime}}</td>
                        <td>{{$winfo->endtime}}</td>
                        <td>{{$commonctrl->eventSource2Str($winfo->wisource)}}</td>
                        <td>{{$winfo->realname}}</td>
                        <td>{{$winfo->wistatus == 1 ? "有效" : "无效"}}</td>
                        <td>{{$winfo->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="editwarninginfo?id={{$winfo->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$winfo->id}});">删除</a></li>
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
                <div class="text-info">没有符合条件的预警信息！</div>
        </div>
        </div>
        @endif         
    </div>
</div>

@if(count($warninginfo) > 0)
<div style="margin-top: 10px;">
   
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $warninginfo->appends([ "fromdate"=>$searchfromdate,
                "todate"=>$searchtodate, "wistatus"=>$searchwistatus])->links() }}  
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
</script>
@endsection