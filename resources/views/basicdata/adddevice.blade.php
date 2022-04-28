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

@if(isset($device))
<h5 class="card-title">设备管理 > 编辑设备</h5>
@else
<h5 class="card-title">设备管理 > 新增设备</h5>
@endif
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    @if(isset($device))
    <form class="form-horizontal" id="form1" method="post" action="/editdevicesave">
    @else
    <form class="form-horizontal" id="form1" method="post" action="/adddevicesave">
    @endif
        {{ csrf_field() }}
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="devicecode" class="col-sm-2 col-form-label">设备编码</label>
            <div class="col-sm-6">
                @if(isset($device))
                <input type="hidden" name="id" value="{{$device->id}}" />
                <input type="text" class="form-control" id="devicecode" name="devicecode" readonly value="{{$device->devicecode}}">
                @else
                <input type="text" class="form-control" id="devicecode" name="devicecode" placeholder="请输入设备编码">
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="rsulat" class="col-sm-2 col-form-label">坐标</label>
            <div class="col-sm-2">
                @if(isset($device))
                <input type="text" class="form-control" id="rsulat" name="rsulat" value="{{$device->rsulat}}">
                @else
                <input type="text" class="form-control" id="rsulat" name="rsulat" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-2">
                @if(isset($device))
                <input type="text" class="form-control" id="rsulng" name="rsulng" value="{{$device->rsulng}}">
                @else
                <input type="text" class="form-control" id="rsulng" name="rsulng" placeholder="请拾取坐标">
                @endif
            </div>
            
            <div class="col-sm-1">
                <input type="button" class="form-control" onclick="getPosition(0);" value="拾取"></button>
            </div>            
        </div>

        
        <div class="row mb-3" style="visibility: hidden; height: 500px; display: none;" id="bdmap_row">
            <div class="col-sm-12" id="bdmap_container">
            </div>           
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
    
    document.getElementById('rsulat').value = tmplat.toFixed(6);
    document.getElementById('rsulng').value = tmplng.toFixed(6);
    
    document.getElementById("bdmap_row").style.visibility = 'hidden';
    document.getElementById("bdmap_row").style.display = 'none';    
});
</script>    
@endsection