@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs"></script>


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
        
        <div class="row mb-3">
            <label for="wistatus" class="col-sm-2 col-form-label">状态</label>
            <div class="col-sm-2">
                <select name="wistatus" class="form-select"  >
                    <option class="form-control" value="1" {{$winfo->wistatus == 1 ? "selected" : ""}}>有效</option>
                    <option class="form-control" value="0" {{$winfo->wistatus == 0 ? "selected" : ""}}>无效</option>
                </select>
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

    </<div>
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
    
    if(getPosFlag === 0){
        document.getElementById('startlat').value = tmplat.toFixed(6);
        document.getElementById('startlng').value = tmplng.toFixed(6);
    } else {
        document.getElementById('stoplat').value = tmplat.toFixed(6);
        document.getElementById('stoplng').value = tmplng.toFixed(6);     
    }
    
    document.getElementById("bdmap_row").style.visibility = 'hidden';
    document.getElementById("bdmap_row").style.display = 'none';    

    if(e.overlay){//判断右键单击的是否是marker    

    }else{
        //RightClickMap(s,w);//右键单击map出现右键菜单事件
    }
});
</script>    
@endsection