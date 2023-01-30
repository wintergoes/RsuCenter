@extends('layouts.home')

@section('content')
<script type="text/javascript" src="http://api.tianditu.gov.cn/api?v=3.0&tk=41a827605c36598489f9ddee196c176c"></script>

<script type="text/javascript" src="js/coordtransform.js"></script>
<script type="text/javascript" src="js/zlzl.js"></script>
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<script>
function submitData(){
    if($("#areaname").val() === ""){
        alert("区域名称不能为空！");
        return ;        
    }
    
    if(!polygon){
        alert("还没在地图上创建区域！");
        return ;
    }
    
    var newPoints = polygon.getLngLats();
    var coordstr = "";
    
    for(var i = 0; i < newPoints.length; i++){
        if(i > 0){
            coordstr = coordstr + ";";
        }
        coordstr = coordstr + newPoints[i].getLng() + "," + newPoints[i].getLat();
    }
    
    $("#centerlat").val(p1Marker.getLngLat().getLat());
    $("#centerlng").val(p1Marker.getLngLat().getLng());
//    alert(coordstr);
    $("#coordinates").val(coordstr);

    $("#form1").submit();
}
</script>
@if(isset($area))
<h5 class="card-title">道理管理 > 编辑其他区域 </h5>
@else
<h5 class="card-title">道理管理 > 新增其他区域 </h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">
    @if(isset($area))
    <form class="form-horizontal" id="form1" method="post" action="/editmapfixedareasave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addmapfixedareasave">
    @endif
        @if(isset($area))
        <input type="hidden" name="areaid" value="{{$area->id}}">
        <input type="hidden" name="coordinates" id="coordinates" value="{{$area->coordinates}}"/>
        <input type="hidden" name="centerlat" id="centerlat" value="{{$area->centerlat}}"/>
        <input type="hidden" name="centerlng" id="centerlng" value="{{$area->centerlng}}"/>
        @else
        <input type="hidden" name="coordinates" id="coordinates" />
        <input type="hidden" name="centerlat" id="centerlat"/>
        <input type="hidden" name="centerlng" id="centerlng"/>
        @endif
        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>
        
        <div class="row mb-3">
            <label for="mobile" class="col-sm-2 col-form-label">选择标志</label>
            <div class="col-sm-6">
                <select id="areatype" name="areatype" class="form-select">
                    <option class="form-control" value="0" {{isset($area) && $area->areatype == 0 ? "selected" : ""}}>请选择区域类型</option>
                    <option class="form-control" value="1" {{isset($area) && $area->areatype == 1 ? "selected" : ""}}>陆地</option>
                    <option class="form-control" value="2" {{isset($area) && $area->areatype == 2 ? "selected" : ""}}>海洋</option>
                </select>
            </div>                                   
        </div>

        <div class="row mb-3">
            <label for="tsname" class="col-sm-2 col-form-label">区域名称</label>
            <div class="col-sm-6">
                @if(isset($area))
                <input type="text" class="form-control" id="areaname" name="areaname" value="{{$area->areaname}}" placeholder="请输入区域名称">
                @else
                <input type="text" class="form-control" id="areaname" name="areaname" placeholder="请输入区域名称">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="tsname" class="col-sm-2 col-form-label">参数1</label>
            <div class="col-sm-6">
                @if(isset($area))
                <input type="text" class="form-control" id="areaparam1" name="areaparam1" value="{{$area->areaparam1}}" placeholder="请输入参数1">
                @else
                <input type="text" class="form-control" id="areaparam1" name="areaparam1" placeholder="请输入参数1">
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="tsname" class="col-sm-2 col-form-label">参数2</label>
            <div class="col-sm-6">
                @if(isset($area))
                <input type="text" class="form-control" id="areaparam2" name="areaparam2" value="{{$area->areaparam2}}" placeholder="请输入参数2">
                @else
                <input type="text" class="form-control" id="areaparam2" name="areaparam2" placeholder="请输入参数2">
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="tsname" class="col-sm-2 col-form-label">参数3</label>
            <div class="col-sm-6">
                @if(isset($area))
                <input type="text" class="form-control" id="areaparam3" name="areaparam3" value="{{$area->areaparam3}}" placeholder="请输入参数3">
                @else
                <input type="text" class="form-control" id="areaparam3" name="areaparam3" placeholder="请输入参数3">
                @endif
            </div>
        </div>        
        
        <div class="row mb-3">
            <label for="daytexture" class="col-sm-2 col-form-label">纹理（日）</label>
            <div class="col-sm-6">
                @if(isset($area))
                <input type="text" class="form-control" id="daytexture" name="daytexture" value="{{$area->daytexture}}" placeholder="请输入白天纹理名称">
                @else
                <input type="text" class="form-control" id="daytexture" name="daytexture" placeholder="请输入白天纹理名称">
                @endif
            </div>
        </div> 

        <div class="row mb-3">
            <label for="nighttexture" class="col-sm-2 col-form-label">纹理（夜）</label>
            <div class="col-sm-6">
                @if(isset($area))
                <input type="text" class="form-control" id="nighttexture" name="nighttexture" value="{{$area->nighttexture}}" placeholder="请输入夜晚纹理名称">
                @else
                <input type="text" class="form-control" id="nighttexture" name="nighttexture" placeholder="请输入夜晚纹理名称">
                @endif
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
                        <label class="col-sm-4 col-form-label"></label>
                        <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">保存修改</button>
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

var polygon;
var p1Icon = new TIcon("/images/icon_p1.png", new TSize(22, 28));
var p1Marker;
function addRoadSectionOnMap(){
    var pt1 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() + 0.01);
    var pt2 = new TLngLat(map.getCenter().getLng() - 0.01, map.getCenter().getLat() + 0.01);
    var pt3 = new TLngLat(map.getCenter().getLng() - 0.01, map.getCenter().getLat() );
    var pt4 = new TLngLat(map.getCenter().getLng(), map.getCenter().getLat() );
    
    if(p1Marker == null){
        p1Marker = new TMarker(pt1, {
            icon: p1Icon
        });
        map.addOverLay(p1Marker);   
    } else {
        p1Marker.setLngLat(pt1);
    }
    p1Marker.enableDragging();    

    var points = [];
    points.push(pt1);
    points.push(pt2);
    points.push(pt3);
    points.push(pt4);
    polygon = new TPolygon(points, {strokeColor:"blue", strokeWeight:1, strokeOpacity:1, fillOpacity:0.5}); 
    polygon.enableEdit();
    map.addOverLay(polygon);
}


function onBdmapChange(obj){
    if($(obj).val() === "0"){
        map.setMapType(TMAP_NORMAL_MAP);
    } else {
        map.setMapType(TMAP_SATELLITE_MAP ); 
    }
}

@if(isset($area))
function showFixedArea(){
    var coordstr = '{{$area->coordinates}}';
    var coords = coordstr.split(";");
    var points = [];
    for(var i = 0; i < coords.length; i++){
        var strlatlng = coords[i].split(",");
        points.push(new TLngLat(strlatlng[0], strlatlng[1]));
    }
    polygon = new TPolygon(points, {strokeColor:"blue", strokeWeight:1, strokeOpacity:1, fillOpacity:0.5}); 
    polygon.enableEdit();
    map.addOverLay(polygon); 
    
    p1Marker = new TMarker(new TLngLat({{$area->centerlng}}, {{$area->centerlat}}), {
        icon: p1Icon
    });
    map.addOverLay(p1Marker);   

    p1Marker.enableDragging();     
}    
showFixedArea();    
@endif
</script>    
@endsection