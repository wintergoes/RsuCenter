@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<script type="text/javascript" src="js/zlzl.js"></script>

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

    $('#form1').submit();
}

var getPosFlag = 0;
function getPosition(flag){    
    getPosFlag = flag;
    document.getElementById("bdmap_row").style.visibility = 'visible';
    document.getElementById("bdmap_row").style.display = '';
    document.getElementById("bdmap_ctrl_row").style.visibility = 'visible';
    document.getElementById("bdmap_ctrl_row").style.display = '';    
}

function onSelectTecRoot(){
    initTrafficEventClass("tecchild", $("#tecroot").val(), "", "{{ csrf_token() }}");
}

function onSelectTecChild(){
    $("#winame").val($("#tecchild").find("option:selected").text());
}
</script>

@if(isset($winfo))
<h5 class="card-title">道理管理 > 编辑预警信息</h5>
@else
<h5 class="card-title">道理管理 > 新增预警信息</h5>
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
            <label for="winame" class="col-sm-2 col-form-label">预警内容</label>
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
            <label for="realname" class="col-sm-2 col-form-label">起始坐标</label>
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
                    <li>{{$road->roadname}}
                    @if($road->lanetype == 0)
                    ，全车道
                    @else
                    ，{{$road->laneno}}车道
                    @endif
                    </li>
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
            <label for="mobile" class="col-sm-2 col-form-label">终止坐标</label>
            <div class="col-sm-2">
                @if(isset($winfo))
                <input type="text" class="form-control" id="stoplat" name="stoplat" value="{{$winfo->stoplat}}">
                @else
                <input type="text" class="form-control" id="stoplat" name="stoplat" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-2">
                @if(isset($winfo))
                <input type="text" class="form-control" id="stoplng" name="stoplng" value="{{$winfo->stoplng}}">
                @else
                <input type="text" class="form-control" id="stoplng" name="stoplng" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-1">
                <input type="button" class="form-control" onclick="getPosition(1);" value="拾取"></button>
            </div>             
        </div>   
        
        @if(isset($winfo))
       <div class="row mb-3"  id="endExtraInfo">
            <label for="realname" class="col-sm-2 col-form-label"></label>
            @if(count($roadsEnd) == 0)
            <div class="col-sm-5" id="endExtraInfoContent"><font color="red">此坐标没有在任何路段上。</font></div>
            @else
            <div class="col-sm-5" id="endExtraInfoContent">
                <ul>
                    @foreach($roadsEnd as $road)
                    <li>{{$road->roadname}}
                    @if($road->lanetype == 0)
                    ，全车道
                    @else
                    ，{{$road->laneno}}车道
                    @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>   
        @else
        <div class="row mb-3" style="visibility: hidden; display: none;" id="endExtraInfo">
            <label for="realname" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5" id="endExtraInfoContent">
            </div>
        </div>        
        @endif        
        
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

    <div>
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

function onBdmapChange(obj){
    if($(obj).val() === "0"){
        map.setMapType(BMAP_NORMAL_MAP ); 
    } else {
        map.setMapType(BMAP_SATELLITE_MAP  ); 
    }
}
</script>    
@endsection