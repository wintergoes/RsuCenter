@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs"></script>


<script>
function submitData(){
    if($('#devicecode').val() === ''){
        alert('预警名称不能为空！');
        $('#devicecode').focus();
        return;
    }  

    $('#form1').submit();
}

function getPosition(flag){ 
    document.getElementById("bdmap_row").style.visibility = 'visible';
    document.getElementById("bdmap_row").style.display = '';
}
</script>

@if(isset($obudevice))
<h5 class="card-title">设备管理 > 编辑OBU设备</h5>
@else
<h5 class="card-title">设备管理 > 新增OBU设备</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($obudevice))
    <form class="form-horizontal" id="form1" method="post" action="/editobudevicesave">
        <input type="hidden" name="id" value="{{$obudevice->id}}" />
    @else
    <form class="form-horizontal" id="form1" method="post" action="/addobudevicesave">
    @endif
        {{ csrf_field() }}      
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="obuid" class="col-sm-2 col-form-label">设备编码</label>
            <div class="col-sm-6">
                @if(isset($obudevice))
                
                <input type="text" class="form-control" id="obuid" name="obuid" readonly value="{{$obudevice->obuid}}">
                @else
                <input type="text" class="form-control" id="obuid" name="obuid" placeholder="请输入设备编码">
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="obuhardware" class="col-sm-2 col-form-label">OBU硬件</label>
            <div class="col-sm-6">
                <select name="obuhardware" class="form-select"  >
                    <option class="form-control" value="" >无</option>
                    @foreach($obuhardwares as $obuhw)
                    @if(isset($obudevice))
                    <option class="form-control" value="{{$obuhw->device_ID}}" {{$obuhw->device_ID == $obudevice->obuhardware ? "selected" : ""}}>{{$obuhw->device_ID}}</option>
                    @else
                    <option class="form-control" value="{{$obuhw->device_ID}}" >{{$obuhw->device_ID}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>        

        <div class="row mb-3">
            <label for="obulatitude" class="col-sm-2 col-form-label">坐标</label>
            <div class="col-sm-2">
                @if(isset($obudevice))
                <input type="text" class="form-control" id="obulatitude" name="obulatitude" value="{{$obudevice->obulatitude}}">
                @else
                <input type="text" class="form-control" id="obulatitude" name="obulatitude" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-2">
                @if(isset($obudevice))
                <input type="text" class="form-control" id="obulongtitude" name="obulongtitude" value="{{$obudevice->obulongtitude}}">
                @else
                <input type="text" class="form-control" id="obulongtitude" name="obulongtitude" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-1">
                <input type="button" class="form-control" onclick="getPosition(0);" value="拾取"></button>
            </div>            
        </div>
        
        <div class="row mb-3">
            <label for="oburemark" class="col-sm-2 col-form-label">备注</label>
            <div class="col-sm-6">
                @if(isset($obudevice))
                <input type="text" class="form-control" id="oburemark" name="oburemark" value="{{$obudevice->oburemark}}">
                @else
                <input type="text" class="form-control" id="oburemark" name="oburemark" placeholder="请输入设备编码">
                @endif
            </div>
        </div>        

        <div class="row mb-3">
            <label for="obustatus" class="col-sm-2 col-form-label">状态</label>
            <div class="col-sm-2">
                <select name="obustatus" class="form-select">
                    <option class="form-control" value="1" {{isset($obudevice) && $obudevice->obustatus == 1 ? "selected" : ""}}>有效</option>
                    <option class="form-control" value="0" {{isset($obudevice) && $obudevice->obustatus == 0 ? "selected" : ""}}>无效</option>
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
    //alert(tmplng + " " + tmplng);
    
    document.getElementById('obulatitude').value = tmplat.toFixed(6);
    document.getElementById('obulongtitude').value = tmplng.toFixed(6);
    
    document.getElementById("bdmap_row").style.visibility = 'hidden';
    document.getElementById("bdmap_row").style.display = 'none';    
});
</script>    
@endsection