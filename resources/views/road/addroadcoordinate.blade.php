@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>

<script>
function submitData(){
    if($("#lanecount").val() === ""){
        $("#lanecount").val(0);
    }

    $('#form1').submit();
}


</script>

@if(isset($coord))
<h5 class="card-title">道路管理 > 编辑坐标</h5>
@else
<h5 class="card-title">道路管理 > 新增坐标</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($coord))
    <form class="form-horizontal" id="form1" method="post" action="/editroadcoordinatesave">
        <input type="hidden" name="coordid" value="{{$coord->id}}">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addroadcoordinatesave">
    @endif
        {{ csrf_field() }}
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="latlng1" class="col-sm-2 col-form-label">坐标1</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="latlng1" name="latlng1" readonly="readonly" onchange="showRoadOnMap();" value="{{$coord->lat1}},{{$coord->lng1}}">
                @else
                <input type="text" class="form-control" id="latlng1" name="latlng1" onchange="showRoadOnMap();" value="" placeholder="">
                @endif
            </div>
            
            <label for="latlng2" class="col-sm-1 col-form-label">坐标2</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="latlng2" name="latlng2" readonly="readonly" onchange="showRoadOnMap();" value="{{$coord->lat2}},{{$coord->lng2}}">
                @else
                <input type="text" class="form-control" id="latlng2" name="latlng2" onchange="showRoadOnMap();" value="" placeholder="">
                @endif
            </div>            
        </div>
        

        <div class="row mb-3">
            <label for="latlng3" class="col-sm-2 col-form-label">坐标3</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="latlng3" name="latlng3" readonly="readonly" onchange="showRoadOnMap();" value="{{$coord->lat3}},{{$coord->lng3}}">
                @else
                <input type="text" class="form-control" id="latlng3" name="latlng3" onchange="showRoadOnMap();" value="" placeholder="">
                @endif
            </div>
            
            <label for="latlng4" class="col-sm-1 col-form-label">坐标4</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="latlng4" name="latlng4" readonly="readonly" onchange="showRoadOnMap();" value="{{$coord->lat4}},{{$coord->lng4}}">
                @else
                <input type="text" class="form-control" id="latlng4" name="latlng4" onchange="showRoadOnMap();" value="" placeholder="">
                @endif
            </div>            
        </div>
        
        <div class="row mb-3">
            <label for="maxlat" class="col-sm-2 col-form-label">maxlat</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="maxlat" name="maxlat" readonly="readonly" value="{{$coord->maxlat}}">
                @else
                <input type="text" class="form-control" id="maxlat" name="maxlat" value="" placeholder="">
                @endif
            </div>
            
            <label for="maxlng" class="col-sm-1 col-form-label">maxlng</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="maxlng" name="maxlng" readonly="readonly" value="{{$coord->maxlng}}">
                @else
                <input type="text" class="form-control" id="maxlng" name="maxlng" value="" placeholder="">
                @endif
            </div>            
        </div>

        <div class="row mb-3">
            <label for="minlat" class="col-sm-2 col-form-label">minlat</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="minlat" name="minlat" readonly="readonly" value="{{$coord->minlat}}">
                @else
                <input type="text" class="form-control" id="minlat" name="minlat" value="" placeholder="">
                @endif
            </div>
            
            <label for="minlng" class="col-sm-1 col-form-label">minlng</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="minlng" name="minlng" readonly="readonly" value="{{$coord->minlng}}">
                @else
                <input type="text" class="form-control" id="minlng" name="minlng" value="" placeholder="">
                @endif
            </div>            
        </div>
        
        <div class="row mb-3">
            <label for="lanetype" class="col-sm-2 col-form-label">类型</label>
            <div class="col-sm-3">
                <select name="lanetype" class="form-select"  >
                    @if(isset($coord))
                    <option class="form-control" value="0" {{$coord->lanetype == 0 ? "selected" : ""}}>全车道</option>
                    <option class="form-control" value="1" {{$coord->lanetype == 1 ? "selected" : ""}}>具体车道</option>
                    @else
                    <option class="form-control" value="0" >全车道</option>
                    <option class="form-control" value="1" >具体车道</option>
                    @endif
                </select>
            </div>   
            
            <label for="laneno" class="col-sm-1 col-form-label">车道号</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="number" class="form-control" id="laneno" name="laneno" value="{{$coord->laneno}}">
                @else
                <input type="number" class="form-control" id="laneno" name="laneno" value="" placeholder="">
                @endif
            </div>            
        </div>        
        
        <div class="row mb-3">
            <label for="angle" class="col-sm-2 col-form-label">与正北方向夹角</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="text" class="form-control" id="angle" name="angle" value="{{$coord->angle}}">
                @else
                <input type="text" class="form-control" id="angle" name="angle" value="" placeholder="">
                @endif
            </div>
            
            <label for="laneno" class="col-sm-1 col-form-label">车道宽度(厘米)</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="number" class="form-control" id="lanewidth" name="lanewidth" value="{{$coord->lanewidth}}">
                @else
                <input type="number" class="form-control" id="lanewidth" name="lanewidth" value="" placeholder="">
                @endif
            </div>  
        </div> 
        
        <div class="row mb-3">
            <label for="angle" class="col-sm-2 col-form-label">车道数量</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="number" class="form-control" id="lanecount" name="lanecount" value="{{$coord->lanecount}}">
                @else
                <input type="number" class="form-control" id="lanecount" name="lanecount" value="" placeholder="">
                @endif
            </div>
            
            <label for="laneno" class="col-sm-1 col-form-label">应急车道</label>
            <div class="col-sm-3">
                @if(isset($coord))
                <input type="number" class="form-control" id="emergencylane" name="emergencylane" value="{{$coord->emergencylane}}">
                @else
                <input type="number" class="form-control" id="emergencylane" name="emergencylane" value="" placeholder="">
                @endif
            </div>  
        </div>         
        
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-7" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">保存修改</button>
                <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">保存并新增</button>
            </div>           
        </div>
        
        <div class="row mb-3" style="height: 500px;" id="bdmap_row">
            <div class="col-sm-12" id="bdmap_container">
            </div>           
        </div>
    </form>
    <div>
</div>

<div class="alert border-0 border-start border-5 border-info alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
                <div class="font-35 text-info"><i class="bx bx-info-square"></i>
                </div>
            <div class="ms-3" style="display: block;">
                        <h6 class="mb-0 text-info">说明</h6>
                </div>

        </div>
            <div>
                        <p>1. 一共需要取四个点，四个点要按顺时针的方向取。</p>
                        <p>2. 第一个点到第二个点的指向代表道路运行方向。</p>                
            </div>    
</div>
<script>
    var map = new BMapGL.Map("bdmap_container", {
       coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                     // 指定完成后API将以指定的坐标类型处理您传入的坐标
    });          // 创建地图实例  
    var point = new BMapGL.Point(120.315719,36.179238);  // 创建点坐标  
    map.centerAndZoom(point, 18);                 // 初始化地图，设置中心点坐标和地图级别 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
 
 
function showRoadOnMap(){
//    alert($("#latlng1").val());
//    alert($("#latlng2").val());
//    alert($("#latlng3").val());
//    alert($("#latlng4").val());
    if($("#latlng1").val() === '' ||
            $("#latlng2").val() === '' ||
            $("#latlng3").val() === '' ||
            $("#latlng4").val() === ''){       
        return;
    }
    
    var str1 = $("#latlng1").val().replace("，", ",");
    var str2 = $("#latlng2").val().replace("，", ",");
    var str3 = $("#latlng3").val().replace("，", ",");
    var str4 = $("#latlng4").val().replace("，", ",");
    
    if(!str1.includes(',') || !str2.includes(',') || !str3.includes(',') || !str4.includes(',')){
        alert("输入数据格式不正确。");
        return;
    }
    
    //alert(str1 + "     " + str2 + "    " + str3 + "   " + str4);
    
//    alert("add");
    var latlng1 = str1.split(",");
    var latlng2 = str2.split(",");
    var latlng3 = str3.split(",");
    var latlng4 = str4.split(",");
    
    var islatlng = true;
    if(latlng1[0] > 60){ //经度在前
        islatlng = false;
    }
    
    if(islatlng){
        latlng1 = latlng2lnglat(latlng1[0], latlng1[1]);
        latlng2 = latlng2lnglat(latlng2[0], latlng2[1]);
        latlng3 = latlng2lnglat(latlng3[0], latlng3[1]);
        latlng4 = latlng2lnglat(latlng4[0], latlng4[1]);
    }
    
    //经过gcj02tobd09的转换后，都变成lng, lat的格式了
    islatlng = false;
    
//    alert(latlng1[1] + "    " + latlng2[1] + "   " + latlng3[1] + "   " + latlng4[1]);
    var maxlat = Math.max(latlng1[1], latlng2[1], latlng3[1], latlng4[1]);
    var minlat = Math.min(latlng1[1], latlng2[1], latlng3[1], latlng4[1]);
    var maxlng = Math.max(latlng1[0], latlng2[0], latlng3[0], latlng4[0]);
    var minlng = Math.min(latlng1[0], latlng2[0], latlng3[0], latlng4[0]);    
    
    $("#maxlat").val(maxlat.toFixed(6));
    $("#maxlng").val(maxlng.toFixed(6));
    $("#minlat").val(minlat.toFixed(6));
    $("#minlng").val(minlng.toFixed(6));
    
//    var angle = 0;
//    if(islatlng){
////        if(latlng2[1] < latlng1[1]){
////            angle = 180;
////        }
////        
////        angle = angle + Math.atan((latlng2[0] - latlng1[0])/ (latlng2[1] - latlng1[1]));
//    } else {             
//        lngdistance = getDistances(latlng2[1], latlng2[0], latlng2[1], latlng1[0]);
//        latdistance = getDistances(latlng1[1], latlng1[0], latlng2[1], latlng1[0]);
//        //alert(lngdistance.distance + "  " + latdistance.distance);
//        angle = angle + Math.atan(lngdistance.distance / latdistance.distance);
//        
//        if(latlng2[0] > latlng1[0]){
//            if(latlng2[1] < latlng1[1]){
//                angle = angle + Math.PI / 2;
//            }
//        } else {
//            if(latlng2[1] < latlng1[1]){
//                angle = angle + Math.PI;
//            } else {
//                angle = Math.PI * 2 - angle ;
//            }
//        }
//    }
//    angle = angle * 180 / Math.PI;
//    $('#angle').val(angle.toFixed(2));
    
    var points = [];
    points.push(new BMapGL.Point(latlng1[0], latlng1[1]));
    points.push(new BMapGL.Point(latlng2[0], latlng2[1]));
    points.push(new BMapGL.Point(latlng3[0], latlng3[1]));
    points.push(new BMapGL.Point(latlng4[0], latlng4[1]));
    
    var pointsmax = [];
    pointsmax.push(new BMapGL.Point(maxlng, maxlat));
    pointsmax.push(new BMapGL.Point(minlng, maxlat));
    pointsmax.push(new BMapGL.Point(minlng, minlat));
    pointsmax.push(new BMapGL.Point(maxlng, minlat));
    
    map.clearOverlays();
    var convertor = new BMapGL.Convertor();
    convertor.translate(points, COORDINATES_WGS84, COORDINATES_BD09, translateCallback, 100);    
    convertor.translate(pointsmax, COORDINATES_WGS84, COORDINATES_BD09, translateCallbackMax, 100);    
}

    //坐标转换完之后的回调函数
    translateCallback = function (data){
      if(data.status === 0 && data.points.length >= 4) {
        var point = new BMapGL.Point(data.points[0].lng, data.points[0].lat);  // 创建点坐标  
        map.centerAndZoom(point, 18);                 // 初始化地图，设置中心点坐标和地图级别           
        var polygon = new BMapGL.Polygon([
                new BMapGL.Point(data.points[0].lng, data.points[0].lat),
                new BMapGL.Point(data.points[1].lng, data.points[1].lat),
                new BMapGL.Point(data.points[2].lng, data.points[2].lat),
                new BMapGL.Point(data.points[3].lng, data.points[3].lat)
            ], {strokeColor:"red", strokeWeight:2, strokeOpacity:0.5});   
        map.addOverlay(polygon);
      }
    }       

    translateCallbackMax = function (data){
      if(data.status === 0 && data.points.length >= 4) {
            var polyline = new BMapGL.Polyline([
                new BMapGL.Point(data.points[0].lng, data.points[0].lat),
                new BMapGL.Point(data.points[2].lng, data.points[2].lat),                
                new BMapGL.Point(data.points[1].lng, data.points[1].lat),
                new BMapGL.Point(data.points[3].lng, data.points[3].lat)
                    ], {strokeColor:"gray", strokeWeight:2, strokeOpacity:0.5});
            map.addOverlay(polyline);           
          
            var polygonMax = new BMapGL.Polygon([
                new BMapGL.Point(data.points[0].lng, data.points[0].lat),
                new BMapGL.Point(data.points[1].lng, data.points[1].lat),
                new BMapGL.Point(data.points[2].lng, data.points[2].lat),
                new BMapGL.Point(data.points[3].lng, data.points[3].lat)
            ], {strokeColor:"blue", strokeWeight:2, strokeOpacity:0.5});   
                      
            map.addOverlay(polygonMax);
      }
    }

function latlng2lnglat(lat, lng){
    return [lng, lat];
}

function rad(d) {
    return d * Math.PI / 180.0;
}

// 根据经纬度计算距离，参数分别为第一点的纬度，经度；第二点的纬度，经度
function getDistances(lat1, lng1, lat2, lng2) {

    var radLat1 = rad(lat1);
    var radLat2 = rad(lat2);
    var a = radLat1 - radLat2;
    var b = rad(lng1) - rad(lng2);
    var s = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(a / 2), 2) +
        Math.cos(radLat1) * Math.cos(radLat2) * Math.pow(Math.sin(b / 2), 2)));
    s = s * 6378.137; // EARTH_RADIUS;
    // 输出为公里
    s = Math.round(s * 10000) / 10000;

    var distance = s;
    var distance_str = "";

    if (parseInt(distance) >= 1) {
        // distance_str = distance.toFixed(1) + "km";
        distance_str = distance.toFixed(2) + "km";
    } else {
        // distance_str = distance * 1000 + "m";
        distance_str = (distance * 1000).toFixed(2) + "m";
    }

    //s=s.toFixed(4);

    // console.info('距离是', s);
    // console.info('距离是', distance_str);
    // return s;
    
    //小小修改，这里返回对象
    let objData = {
        distance: distance,
        distance_str: distance_str
    }
    return objData;
}

showRoadOnMap();
</script>    
@endsection