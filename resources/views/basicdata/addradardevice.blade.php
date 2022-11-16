@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<script type="text/javascript" src="js/zlzl.js"></script>

<script>
function submitData(){
    if($('#devicecode').val() === ''){
        alert('设备编码不能为空！');
        $('#devicecode').focus();
        return;
    }
    
    if($('#macaddress').val() === ''){
        alert('Mac地址不能为空！');
        $('#macaddress').focus();
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

@if(isset($radardevice))
<h5 class="card-title">编辑雷视设备</h5>
@else
<h5 class="card-title">新增雷视设备</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($radardevice))
    <form class="form-horizontal" id="form1" method="post" action="/editradardevicesave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addradardevicesave">
    @endif
        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="devicecode" class="col-sm-2 col-form-label">设备编号</label>
            <div class="col-sm-6">
                @if(isset($radardevice))
                <input type="hidden" name="id" value="{{$radardevice->id}}" />
                <input type="text" class="form-control" id="devicecode" name="devicecode" value="{{$radardevice->devicecode}}">
                @else
                <input type="text" class="form-control" id="devicecode" name="devicecode" placeholder="请输入设备编码，格式：LS00001">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="macaddress" class="col-sm-2 col-form-label">Mac地址</label>
            <div class="col-sm-6">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="macaddress" name="macaddress" value="{{$radardevice->macaddress}}">
                @else
                <input type="text" class="form-control" id="macaddress" name="macaddress" placeholder="请输入mac地址">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="ipaddress" class="col-sm-2 col-form-label">ip地址</label>
            <div class="col-sm-6">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="ipaddress" name="ipaddress" value="{{$radardevice->ipaddress}}" placeholder="请输入雷视一体机的ip地址">
                @else
                <input type="text" class="form-control" id="ipaddress" name="ipaddress" placeholder="请输入雷视一体机的ip地址">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="videostreamaddress" class="col-sm-2 col-form-label">视频流地址</label>
            <div class="col-sm-6">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="videostreamaddress" name="videostreamaddress" value="{{$radardevice->videostreamaddress}}" placeholder="格式：http://视频服务器地址:http流端口/radarvideo">
                @else
                <input type="text" class="form-control" id="videostreamaddress" name="videostreamaddress" placeholder="格式：http://视频服务器地址:http流端口/radarvideo">
                @endif
            </div>
        </div>        
        
        <div class="row mb-3">
            <label for="httpstreamport" class="col-sm-2 col-form-label">http流端口</label>
            <div class="col-sm-6">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="httpstreamport" name="httpstreamport" value="{{$radardevice->httpstreamport}}">
                @else
                <input type="text" class="form-control" id="httpstreamport" name="httpstreamport" value="{{$maxport}}" placeholder="请输入http流端口">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="lanenumber" class="col-sm-2 col-form-label">车道数量</label>
            <div class="col-sm-6">
                @if(isset($radardevice))
                <input type="number" class="form-control" id="lanenumber" name="lanenumber" value="{{$radardevice->lanenumber}}">
                @else
                <input type="number" class="form-control" id="lanenumber" name="lanenumber" placeholder="请输入车道数量">
                @endif
            </div>
        </div> 
        
        <div class="row mb-3">
            <label for="lanewidth" class="col-sm-2 col-form-label">车道宽度</label>
            <div class="col-sm-6">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="lanewidth" name="lanewidth" value="{{$radardevice->lanewidth}}" placeholder="请输入所有车道的宽度，以英文逗号分隔，格式：3.6,3.6">
                @else
                <input type="text" class="form-control" id="lanewidth" name="lanewidth" placeholder="请输入所有车道的宽度，以英文逗号分隔，格式：3.6,3.6">
                @endif
            </div>
        </div>        
        
        <div class="row mb-3">
            <label for="lat" class="col-sm-2 col-form-label">设备坐标</label>
            <div class="col-sm-2">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="lat" name="lat" value="{{$radardevice->lat}}">
                @else
                <input type="text" class="form-control" id="lat" name="lat" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-2">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="lng" name="lng" value="{{$radardevice->lng}}">
                @else
                <input type="text" class="form-control" id="lng" name="lng" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-1">
                <input type="button" class="form-control" onclick="getPosition(0);" value="拾取"></button>
            </div>            
        </div>
        
        <div class="row mb-3">
            <label for="lat" class="col-sm-2 col-form-label">Y坐标范围</label>
            <div class="col-sm-2">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="validYposSmall" name="validYposSmall" value="{{$radardevice->validYposSmall}}">
                @else
                <input type="text" class="form-control" id="validYposSmall" name="validYposSmall" value="-1000" placeholder="">
                @endif
            </div>
            <div class="col-sm-2">
                @if(isset($radardevice))
                <input type="text" class="form-control" id="validYposLarge" name="validYposLarge" value="{{$radardevice->validYposLarge}}">
                @else
                <input type="text" class="form-control" id="validYposLarge" name="validYposLarge" value="1000" placeholder="">
                @endif
            </div>          
        </div>
        
        <div class="row mb-3">
            <label for="radarremark" class="col-sm-2 col-form-label">备注</label>
            <div class="col-sm-6">
                @if(isset($device))
                <input type="text" class="form-control" id="radarremark" name="radarremark" value="{{$device->radarremark}}">
                @else
                <input type="text" class="form-control" id="radarremark" name="radarremark" placeholder="请输入备注信息">
                @endif
            </div>
        </div>         
        
        <div class="row mb-3">
            <label for="status" class="col-sm-2 col-form-label">状态</label>
            <div class="col-sm-2">
                <select name="status" class="form-select">
                    <option class="form-control" value="1" {{isset($radardevice) && $radardevice->status == 1 ? "selected" : ""}}>有效</option>
                    <option class="form-control" value="0" {{isset($radardevice) && $radardevice->status == 0 ? "selected" : ""}}>无效</option>
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
    
    document.getElementById('lat').value = tmplat.toFixed(6);
    document.getElementById('lng').value = tmplng.toFixed(6);    
    
    document.getElementById("bdmap_row").style.visibility = 'hidden';
    document.getElementById("bdmap_row").style.display = 'none'; 
    document.getElementById("bdmap_ctrl_row").style.visibility = 'hidden';
    document.getElementById("bdmap_ctrl_row").style.display = 'none'; 
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