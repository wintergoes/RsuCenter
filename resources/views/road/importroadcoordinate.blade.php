@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>

<script>
function submitData(){
    if($('#devicecode').val() === ''){
        alert('预警名称不能为空！');
        $('#devicecode').focus();
        return;
    }  

    $('#form1').submit();
}


</script>


<h5 class="card-title">道路管理 > 导入路段 [{{$road->roadname}}]</h5>
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">

    <form class="form-horizontal" id="form1" method="post" action="/importroadcoordinatesave">
        <input type="hidden" name="roadid" id="roadid" value="{{$road->id}}"/>
        {{ csrf_field() }}
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>
        
        <div class="row mb-3">
            <label for="leftwidth" class="col-sm-2 col-form-label">左侧宽（米）</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="leftwidth" name="leftwidth" value="2" placeholder="">
            </div>
            
            <label for="rightwidth" class="col-sm-1 col-form-label">右侧宽（米）</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="rightwidth" name="rightwidth" value="2" placeholder="">
            </div>
        </div>        
        
        <div class="row mb-3">
            <label for="lanetype" class="col-sm-2 col-form-label">类型</label>
            <div class="col-sm-3">
                <select name="lanetype" class="form-select"  >
                    <option class="form-control" value="0" >全车道</option>
                    <option class="form-control" value="1" >具体车道</option>
                </select>
            </div>
            
            <label for="laneno" class="col-sm-1 col-form-label">车道号</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="laneno" name="laneno" value="" placeholder="">
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="lanetype" class="col-sm-2 col-form-label">数据</label>
            <div class="col-sm-7">
                <textarea style="width: 100%;" rows="20" id="gpsdata" name="gpsdata"></textarea>
            </div>
        </div>        
        
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-7" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-2" onclick="submitData();">保存修改</button>
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
            <p>1. 导入数据第一列为经度，第二列为纬度，经纬度中间用英文逗号分隔。</p>
            <p>2. 必须为连续的点。</p>
            <p>3. 本功能假设所有导入点都在同一车道，即相对道路左右距离一致。</p>
            <p>4. 左侧宽、右侧宽是指坐标点左右侧路的宽度，用于计算路的边界坐标。</p>
        </div>    
</div>  
@endsection