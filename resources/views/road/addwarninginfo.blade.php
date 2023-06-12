@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<script type="text/javascript" src="js/zlzl.js"></script>
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>


<script>
function submitData(){
    if($('#winame').val() === ''){
        alert('预警名称不能为空！');
        $('#winame').focus();
        return;
    }
    
    if($('#startlat').val() === '' || $('#startlng').val() === ''){
        alert('起始坐标不能为空！');
        $('#startlat').focus();
        return;
    }    
    
    if($('#wiradius').val() === ''){
        alert('影响半径不能为空！');
        $('#wiradius').focus();
        return;
    }
    
    if($('#wipriority').val() === ''){
        $('#wipriority').val(0);
    }    
    
    if($('#starttime').val() === '' || $('#endtime').val() === ''){
        alert('起始时间不能为空！');
        $('#starttime').focus();
        return;
    }  
    
    $('#form1').submit();
}

var getPosFlag = 0;
function getPosition(flag){    
    getPosFlag = flag;
    document.getElementById("bdmap_row").style.visibility = 'visible';
    document.getElementById("bdmap_row").style.display = '';
    document.getElementById("bdmap_ctrl_row").style.visibility = 'visible';
    document.getElementById("bdmap_ctrl_row").style.display = '';    
    getRsuTimer = setTimeout("showRsuOnMap()", 1000);
}

function onSelectTecRoot(){
    initTrafficEventClass("tecchild", $("#tecroot").val(), "", "{{ csrf_token() }}");
}

function onSelectTecChild(){
    $("#winame").val($("#tecchild").find("option:selected").text());
}
</script>

@if(isset($winfo))
<h5 class="card-title">道理管理 > 编辑事件</h5>
@else
<h5 class="card-title">道理管理 > 新增事件</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($winfo))
    <form class="form-horizontal" id="form1" method="post" action="/editwarninginfosave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addwarninginfosave">
    @endif
        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>
        
        <div class="row mb-3">
            <label for="mobile" class="col-sm-2 col-form-label">事件类型</label>
            <div class="col-sm-2">
                <select id="tecroot" name="tecroot" class="form-select" onchange="onSelectTecRoot()"></select>
                @if(isset($winfo))
                <script>initTrafficEventClass("tecroot", "", "{{$winfo->tecparentcode}}", "{{ csrf_token() }}");</script>
                @else
                <script>initTrafficEventClass("tecroot", "", "", "{{ csrf_token() }}");</script>
                @endif
            </div>
            
            <div class="col-sm-2">
                <select id="tecchild" name="tecchild" class="form-select" onchange="onSelectTecChild()"></select>
                @if(isset($winfo))
                <script>initTrafficEventClass("tecchild", "{{$winfo->tecparentcode == '' ? '01' : $winfo->tecparentcode}}", "{{$winfo->teccode}}", "{{ csrf_token() }}");</script>
                @else
                <script>initTrafficEventClass("tecchild", "01", "", "{{ csrf_token() }}");</script>
                @endif                
            </div>                         
        </div>
        
        <div class="row mb-3">
            <label for="wisource" class="col-sm-2 col-form-label">事件来源</label>
            <div class="col-sm-2">
                <select id="wisource" name="wisource" class="form-select" >
                    @if(isset($winfo))
                    <option value="1" {{$winfo->wisource == 1 ? "selected" : ""}}>交警</option>
                    <option value="2" {{$winfo->wisource == 2 ? "selected" : ""}}>政府</option>
                    <option value="3" {{$winfo->wisource == 3 ? "selected" : ""}}>气象部门</option>
                    <option value="4" {{$winfo->wisource == 4 ? "selected" : ""}}>互联网</option>
                    <option value="5" {{$winfo->wisource == 5 ? "selected" : ""}}>本地检测</option>
                    @else
                    <option value="1" >交警</option>
                    <option value="2" >政府</option>
                    <option value="3" >气象部门</option>
                    <option value="4" >互联网</option>
                    <option value="5" >本地检测</option>                    
                    @endif
                </select>
            </div>
                      
        </div>         

        <div class="row mb-3">
            <label for="winame" class="col-sm-2 col-form-label">事件名称</label>
            <div class="col-sm-6">
                @if(isset($winfo))
                <input type="hidden" name="id" value="{{$winfo->id}}" />
                <input type="text" class="form-control" id="winame" name="winame" value="{{$winfo->winame}}">
                @else
                <input type="text" class="form-control" id="winame" name="winame" placeholder="请输入预警内容">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="realname" class="col-sm-2 col-form-label">事件坐标</label>
            <div class="col-sm-2">
                @if(isset($winfo))
                <input type="text" class="form-control" id="startlat" name="startlat" value="{{$winfo->startlat}}">
                @else
                <input type="text" class="form-control" id="startlat" name="startlat" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-2">
                @if(isset($winfo))
                <input type="text" class="form-control" id="startlng" name="startlng" value="{{$winfo->startlng}}">
                @else
                <input type="text" class="form-control" id="startlng" name="startlng" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-1">
                <input type="button" class="form-control" onclick="getPosition(0);" value="拾取"></button>
            </div>            
        </div>
        
        @if(isset($winfo))
        <div class="row mb-3"  id="startExtraInfo">
            <label for="realname" class="col-sm-2 col-form-label"></label>
            @if(count($roadsStart) == 0)
            <div class="col-sm-5" id="startExtraInfoContent"><font color="red">此坐标没有在任何路段上。</font></div>
            @else
            <div class="col-sm-5" id="startExtraInfoContent">
                <ul>
                    @foreach($roadsStart as $road)
                    @if($road->published == "1")
                    <li>{{$road->roadname}}
                    @if($road->lanetype == 0)
                    ，全车道
                    @else
                    ，{{$road->laneno}}车道
                    @endif
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @endif
        </div>      
        @else
        <div class="row mb-3" style="visibility: hidden; display: none;" id="startExtraInfo">
            <label for="realname" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5" id="startExtraInfoContent">
            </div>
        </div>           
        @endif        

        <div class="row mb-3">
            <label for="wiradius" class="col-sm-2 col-form-label">影响半径(米)</label>
            <div class="col-sm-6">
                @if(isset($winfo))
                <input type="number" class="form-control" id="wiradius" min="0" name="wiradius" value="{{$winfo->wiradius}}">
                @else
                <input type="number" class="form-control" id="wiradius" min="0" name="wiradius" placeholder="请输入影响半径">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="wipriority" class="col-sm-2 col-form-label">优先级(0-7)</label>
            <div class="col-sm-6">
                @if(isset($winfo))
                <input type="number" class="form-control" id="wipriority" max="7" min="0" name="wipriority" value="{{$winfo->wipriority}}">
                @else
                <input type="number" class="form-control" id="wipriority" max="7" min="0" name="wipriority" value="0" placeholder="">
                @endif
            </div>
        </div>        
        
        <div class="row mb-3">
            <label for="starttime" class="col-sm-2 col-form-label">开始时间</label>
            <div class="col-sm-6">
                @if(isset($winfo))
                <input type="text" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  autocomplete="off" id="starttime" name="starttime" value="{{$winfo->starttime}}">
                @else
                <input type="text" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  autocomplete="off" id="starttime" name="starttime" placeholder="请输入开始时间">
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="endtime" class="col-sm-2 col-form-label">结束时间</label>
            <div class="col-sm-6">
                @if(isset($winfo))
                <input type="text" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  autocomplete="off" id="endtime" name="endtime" value="{{$winfo->endtime}}">
                @else
                <input type="text" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  autocomplete="off" id="endtime" name="endtime" value="" placeholder="请输入结束时间">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="wistatus" class="col-sm-2 col-form-label">状态</label>
            <div class="col-sm-2">
                <select name="wistatus" class="form-select">
                    <option class="form-control" value="1" {{isset($winfo) && $winfo->wistatus == 1 ? "selected" : ""}}>有效</option>
                    <option class="form-control" value="0" {{isset($winfo) && $winfo->wistatus == 0 ? "selected" : ""}}>无效</option>
                </select>
            </div>           
        </div>
        
        <div class="row mb-3" style="visibility: hidden; display: none;" id="bdmap_ctrl_row">
            <div >
                <select id="bdmap_type" onchange="onBdmapChange(this);">
                    <option value="0">街道地图</option>
                    <option value="1">卫星地图</option>
                </select>                
            </div>            
        </div>
        
        <div class="row mb-3" style="visibility: hidden; height: 500px; display: none;" id="bdmap_row">
            <div class="col-sm-12" id="bdmap_container"></div>           
        </div>         

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">保存修改</button>
            </div>
        </div>
    </form>

    </div>
</div>

<script>
    var map = new BMap.Map("bdmap_container", {
       coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                     // 指定完成后API将以指定的坐标类型处理您传入的坐标
    });          // 创建地图实例  
    var point = new BMap.Point(120.315719,36.179238);  // 创建点坐标  
    map.centerAndZoom(point, 15);                 // 初始化地图，设置中心点坐标和地图级别 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

var tmplng;
var tmplat;

map.addEventListener("rightclick", function(e){
    tmplng = e.point.lng;//经度
    tmplat = e.point.lat;//维度
    
    var latlng = coordtransform.bd09togcj02(tmplng, tmplat);
    latlng = coordtransform.gcj02towgs84(latlng[0], latlng[1]);
    tmplng = latlng[0];
    tmplat = latlng[1];
    
    if(getPosFlag === 0){
        document.getElementById('startlat').value = tmplat.toFixed(6);
        document.getElementById('startlng').value = tmplng.toFixed(6);
    } else {
        document.getElementById('stoplat').value = tmplat.toFixed(6);
        document.getElementById('stoplng').value = tmplng.toFixed(6);     
    }
    
    document.getElementById("bdmap_row").style.visibility = 'hidden';
    document.getElementById("bdmap_row").style.display = 'none'; 
    document.getElementById("bdmap_ctrl_row").style.visibility = 'hidden';
    document.getElementById("bdmap_ctrl_row").style.display = 'none'; 

    $.ajax({
        type: "GET",
        url: "getroadsbycoord?lat=" + latlng[1] + "&lng=" + latlng[0] + "&extrainfo=" + getPosFlag,
        dataType: "json",
        success: function (data) { 
            var addHtml = "";
            if(data.roads.length === 0){
                addHtml = "<font color='red'>此坐标未在任何路段上。</font>";
            } else {
                addHtml = "<div>此坐标可能在以下路段上：</div><ul>";
                for(i = 0; i < data.roads.length; i++){
                    if(data.roads[i].published !== 1){
                        continue;
                    }
                    addHtml += "<li>" + data.roads[i].roadname; 
                    if(data.roads[i].lanetype === 1){
                        addHtml += "，第" + data.roads[i].laneno + "车道";
                    } else {
                        addHtml += "，全车道";
                    }
                    addHtml += "</li>";
                }       
                addHtml += "</ul>";
            }                       
            
            if(data.extrainfo === "0"){
                document.getElementById("startExtraInfo").style.visibility = "visible";
                document.getElementById("startExtraInfo").style.display = "";
                $("#startExtraInfoContent").html(addHtml);
            } else {
                document.getElementById("endExtraInfo").style.visibility = "visible";
                document.getElementById("endExtraInfo").style.display = "";
                $("#endExtraInfoContent").html(addHtml);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            
        }
    });  
});


var rsuIcon = new BMap.Icon("/images/dashboard/rsu_device.png", new BMap.Size(24, 24));
var getRsuTimer ;
var rsumarkers = [];
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

//                    console.log("rsu: " + rsuobj.device_id + ", lat: " + tmplat + ", lng: " + tmplng);
                    var point = new BMap.Point(tmplng, tmplat);  // 创建点坐标  
                    var marker = new BMap.Marker(point, {
                        icon: rsuIcon,
                        offset: new BMap.Size(0, -10)
                    });
                    
                    var label = new BMap.Label(rsuobj.device_id, {
                        position: point,
                    });
                    marker.setLabel(label);

                    marker.setTitle(rsuobj.log_radom + ", " + rsuobj.device_id);
                    rsumarkers.push(marker);                

                    // 将标注添加到地图
                    map.addOverlay(marker);
                })(i);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            //setTimeout('updateBdMapSummary()', 10000);    
        }
    });
    
    getRsuTimer = setTimeout("showRsuOnMap()", 5000);
}

function onBdmapChange(obj){
    if($(obj).val() === "0"){
        map.setMapType(BMAP_NORMAL_MAP ); 
    } else {
        map.setMapType(BMAP_SATELLITE_MAP  ); 
    }
}
</script>    
@endsection