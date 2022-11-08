@extends('layouts.home')

@section('content')
<script type="text/javascript" src="http://api.tianditu.gov.cn/api?v=3.0&tk=41a827605c36598489f9ddee196c176c"></script>

<script type="text/javascript" src="js/coordtransform.js"></script>
<script type="text/javascript" src="js/zlzl.js"></script>
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<script>
function submitData(){
    if($('#areaname').val() === ''){
        alert('区域名称不能为空！');
        $('#areaname').focus();
        return;
    } 

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    }); 

    $.ajax({
        type: "GET",
        url: "addroadareasave?p1lat=" + p1Marker.getLngLat().getLat() + "&p1lng=" + p1Marker.getLngLat().getLng() +
                "&p2lat=" + p2Marker.getLngLat().getLat() + "&p2lng=" + p2Marker.getLngLat().getLng() +
                "&p3lat=" + p3Marker.getLngLat().getLat() + "&p3lng=" + p3Marker.getLngLat().getLng() +
                "&p4lat=" + p4Marker.getLngLat().getLat() + "&p4lng=" + p4Marker.getLngLat().getLng() +
                "&p5lat=" + p5Marker.getLngLat().getLat() + "&p5lng=" + p5Marker.getLngLat().getLng() +
                "&p6lat=" + p6Marker.getLngLat().getLat() + "&p6lng=" + p6Marker.getLngLat().getLng() +
                "&roadid=" + getUrlParam("roadid") + "&areaname=" + $("#areaname").val() + "&areatype=" + $("#areatype").find("option:selected").val() ,
        dataType: "json",
        success: function (data) {
            if(data.retcode === 1){
                alert("添加区域成功！");
                location.href="showroadareas?roadid=" + getUrlParam("roadid");
            } else {
                alert("添加区域失败！(" + data.retmsg + ")");
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("添加区域失败！");
        }
    });
}
</script>

<h5 class="card-title">道理管理 > 新增区域</h5>
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">
    <form class="form-horizontal" id="form1" method="post" action="/addroadareasave">
        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>
        
        <div class="row mb-3">
            <label for="mobile" class="col-sm-2 col-form-label">选择标志</label>
            <div class="col-sm-6">
                <select id="areatype" name="areatype" class="form-select">
                    <option class="form-control" value="1" >收费站</option>
                    <option class="form-control" value="2" >交叉路口</option>
                </select>
            </div>                                   
        </div>

        <div class="row mb-3">
            <label for="tsname" class="col-sm-2 col-form-label">区域名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="areaname" name="areaname" placeholder="请输入区域名称">
            </div>
        </div>
        
        <div class="row mb-3" id="bdmap_ctrl_row">
            <table>
                <tr>
                    <td>
                        <select id="bdmap_type" onchange="onBdmapChange(this);">
                            <option value="0">街道地图</option>
                            <option value="1">卫星地图</option>
                        </select>                
                    </td>
                    <td>
                        <button type="button" onclick="addRoadSectionOnMap();" class="btn btn-outline-secondary px-1 radius-6">初始标记</button>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="row mb-3" id="bdmap_row" style=" height: 600px; ">
            <div class="col-sm-12" id="bdmap_container"></div>           
        </div>         

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">保存修改</button>
            </div>
        </div>
    </form>
    <div>
</div>

<script type="text/javascript" >
    var latlng = coordtransform.bd09togcj02({{$default_lng}}, {{$default_lat}});
    latlng = coordtransform.gcj02towgs84(latlng[0], latlng[1])
    
    //初始化地图对象
    var map=new TMap("bdmap_container");
    //设置显示地图的中心点和级别
    map.centerAndZoom(new TLngLat(latlng[0], latlng[1]), 14);
     //允许鼠标滚轮缩放地图
    map.enableHandleMouseScroll();
    map.setMapType(TMAP_SATELLITE_MAP);


var p1Icon = new TIcon("/images/icon_p1.png", new TSize(22, 28));
var p2Icon = new TIcon("/images/icon_p2.png", new TSize(26, 26));
var p3Icon = new TIcon("/images/icon_p3.png", new TSize(26, 26));
var p4Icon = new TIcon("/images/icon_p4.png", new TSize(26, 26));

var p5Icon = new TIcon("/images/icon_p5.png", new TSize(22, 28));
var p6Icon = new TIcon("/images/icon_p6.png", new TSize(26, 26));
var p1Marker, p2Marker, p3Marker, p4Marker, p5Marker, p6Marker;
var p5p6Line;
var p1234Line ;
function addRoadSectionOnMap(){
    var pt1 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00003);
    if(p1Marker == null){
        p1Marker = new TMarker(pt1, {
            icon: p1Icon
        });
        map.addOverLay(p1Marker);   
    } else {
        p1Marker.setLngLat(pt1);
    }
    p1Marker.enableDragging();

    var pt2 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00006);
    if(p2Marker == null){
        p2Marker = new TMarker(pt2, {
            icon: p2Icon
        });
        p2Marker.enableDragging();
        // 将标注添加到地图
        map.addOverLay(p2Marker);    
    } else {
        p2Marker.setLngLat(pt2);
    }

    var pt3 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00009);
    if(p3Marker == null){
        p3Marker = new TMarker(pt3, {
            icon: p3Icon
        });
        p3Marker.enableDragging();
        // 将标注添加到地图
        map.addOverLay(p3Marker);  
    } else {
        p3Marker.setLngLat(pt3);
    }

    var pt4 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00012);
    if(p4Marker == null){
        p4Marker = new TMarker(pt4, {
            icon: p4Icon
        });
        p4Marker.enableDragging();
        // 将标注添加到地图
        map.addOverLay(p4Marker);     
    } else {
        p4Marker.setLngLat(pt4);
    }
    
    var pt5 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00015);
    if(p5Marker == null){
        p5Marker = new TMarker(pt5, {
            icon: p5Icon
        });
        p5Marker.enableDragging();
        // 将标注添加到地图
        map.addOverLay(p5Marker); 
    } else {
        p5Marker.setLngLat(pt5);
    }
    
    var pt6 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() - 0.00004);
    if(p6Marker == null){
        p6Marker = new TMarker(pt6, {
            icon: p6Icon
        });
        p6Marker.enableDragging();
        // 将标注添加到地图
        map.addOverLay(p6Marker);
    } else {
        p6Marker.setLngLat(pt6);
    }
    
    p5p6Points = [pt6, pt5];
    if(p5p6Line == null){
        p5p6Line = new TPolyline(p5p6Points, {strokeColor:"blue", strokeWeight:3, strokeOpacity:0.8});
        map.addOverLay(p5p6Line);
    } else {
        p5p6Line.setLngLats(p5p6Points);
    }
    
    TEvent.addListener(p1Marker, "dragend", function(p){
       drawP1234Line(); 
    });
    
    TEvent.addListener(p2Marker, "dragend", function(p){
       drawP1234Line(); 
    });
    
    TEvent.addListener(p3Marker, "dragend", function(p){
       drawP1234Line(); 
    });
    
    TEvent.addListener(p4Marker, "dragend", function(p){
       drawP1234Line(); 
    });    
    
    TEvent.addListener(p5Marker, "dragend", function(p){
        p5p6Points = [new TLngLat(p6Marker.getLngLat().getLng(), p6Marker.getLngLat().getLat()), 
                        new TLngLat(p5Marker.getLngLat().getLng(), p5Marker.getLngLat().getLat())];
        p5p6Line.setLngLats(p5p6Points);            
    });
    
    TEvent.addListener(p6Marker, "dragend", function(p){
        p5p6Points = [new TLngLat(p6Marker.getLngLat().getLng(), p6Marker.getLngLat().getLat()), 
                        new TLngLat(p5Marker.getLngLat().getLng(), p5Marker.getLngLat().getLat())];
        p5p6Line.setLngLats(p5p6Points);            
    });    
}

function drawP1234Line(){
    //alert(p1Marker.getLngLat().getLng() + ", " + p1Marker.getLngLat().getLat());
    var p1234Points = [new TLngLat(p1Marker.getLngLat().getLng(), p1Marker.getLngLat().getLat()), 
                        new TLngLat(p2Marker.getLngLat().getLng(), p2Marker.getLngLat().getLat()),
                        new TLngLat(p3Marker.getLngLat().getLng(), p3Marker.getLngLat().getLat()), 
                        new TLngLat(p4Marker.getLngLat().getLng(), p4Marker.getLngLat().getLat()),
                        new TLngLat(p1Marker.getLngLat().getLng(), p1Marker.getLngLat().getLat())];
    if(p1234Line == null){
        p1234Line = new TPolyline(p1234Points, {strokeColor:"red", strokeWeight:1, strokeOpacity:0.8});
        map.addOverLay(p1234Line);
    } else {
        p1234Line.setLngLats(p1234Points);
    }
}

function onBdmapChange(obj){
    if($(obj).val() === "0"){
        map.setMapType(TMAP_NORMAL_MAP);
    } else {
        map.setMapType(TMAP_SATELLITE_MAP ); 
    }
}
</script>    
@endsection