@extends('layouts.home')

@section('content')

<script language="javascript" type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<script>
function submitData(){
    if($('#roadname').val() === ''){
        alert('路段名称不能为空！');
        $('#roadname').focus();
        return;
    }

    $('#form1').submit();
}

</script>

<style type="text/css">
    .rccontent{
        width: 100%;
        height: 100px;
        text-align: center;
    }
</style>

<h5 class="card-title">道路管控参数设置</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <button type="button" class="btn btn-outline-success px-2 radius-6" data-bs-toggle="modal" onclick="showAddWindow();" data-bs-target="#exampleWarningModal">新增管控参数</button>
    </div>
</div>

<div class="row">
    <div class="col col-lg-6 mx-0">
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary" role="tablist">
                    <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#rcVisibility" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="lni lni-eye font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title" onclick="changeFactor(1);">能见度</div>
                                    </div>
                            </a>
                    </li>
                    <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#rcRain" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="lni lni-rain font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title" onclick="changeFactor(2);">降雨量</div>
                                    </div>
                            </a>
                    </li>
                    <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#rcSnow" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="lni lni-flower font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title" onclick="changeFactor(3);">雪的厚度</div>
                                    </div>
                            </a>
                    </li>
                    
                    <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#rcWind" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="lni lni-website-alt font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title" onclick="changeFactor(4);">风力</div>
                                    </div>
                            </a>
                    </li> 
            </ul>
            <div class="tab-content py-3">
                    <div class="tab-pane fade active show" id="rcVisibility" role="tabpanel">
                        <table class="table mb-0 table-hover table-bordered text-center" id="rcdatavisibility"><thead><th>起始值</th><th>终止值</th><th>建议车速</th><th>操作</th></thead></table>
                        <div class="rccontent" id="nowdata_visibility">
                            暂无配置项。
                        </div>
                    </div>
                    <div class="tab-pane fade" id="rcRain" role="tabpanel">
                        <table class="table mb-0 table-hover table-bordered text-center" id="rcdatarain"><thead><th>起始值</th><th>终止值</th><th>建议车速</th><th>操作</th></thead></table>
                        <div class="rccontent" id="nowdata_rain">
                            暂无配置项。
                        </div>
                    </div>
                    <div class="tab-pane fade" id="rcSnow" role="tabpanel">
                        <table class="table mb-0 table-hover table-bordered text-center" id="rcdatasnow"><thead><th>起始值</th><th>终止值</th><th>建议车速</th><th>操作</th></thead></table>
                        <div class="rccontent" id="nowdata_snow">
                            暂无配置项。
                        </div>
                    </div>
                    <div class="tab-pane fade" id="rcWind" role="tabpanel">
                        <table class="table mb-0 table-hover table-bordered text-center" id="rcdatawind"><thead><th>起始值</th><th>终止值</th><th>建议车速</th><th>操作</th></thead></table>
                        <div class="rccontent" id="nowdata_wind">
                            暂无配置项。
                        </div>
                    </div>
            </div>
        </div>
    <div>
</div>

        
            <div class="modal fade" id="exampleWarningModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 500px;">
                            <div class="modal-content bg-light" >
                                <div class="card radius-6 border-1">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 card-title" id="map_title">
                                                    <i class="bx bx-map">
                                                    </i>
                                                    新增管控参数
                                                </h6>
                                            </div> 
                                        </div>
                                        <div class="col-sm-12" id="bdmap_container" style="height: 350px; width: 400px;">

        <div class="row mb-3 mt-5">
            <label for="rcfactor" class="col-sm-3 col-form-label">天气因素</label>
            <div class="col-sm-9">
                        <select name="rcfactor" id="rcfactor" class="form-select" >
                            <option value="1"  >能见度（单位：m）</option>
                            <option value="2"  >降雨量（单位：mm）</option>
                            <option value="3"  >雪的厚度（单位：mm）</option>
                            <option value="4"  >风力（范围：0-12）</option>
                        </select>    
            </div>
        </div>  
                                            
        <div class="row mb-3">
            <label for="rcfactor" class="col-sm-3 col-form-label"></label>
            <div id="factorremark" class="col-sm-9"></div>
        </div>                                             

        <div class="row mb-3">
            <label for="rcstartvalue" class="col-sm-3 col-form-label">起始值</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="rcstartvalue" name="rcstartvalue" placeholder="">
            </div>
        </div>                                              
                                            
        <div class="row mb-3">
            <label for="rcendvalue" class="col-sm-3 col-form-label">终止值</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="rcendvalue" name="rcendvalue" placeholder="">
            </div>
        </div>  
                                            
        <div class="row mb-3">
            <label for="rcsuggestspeed" class="col-sm-3 col-form-label">建议速度</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="rcsuggestspeed" name="rcsuggestspeed" placeholder="">
            </div>
        </div>                                              

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6" style="text-align: right;">
                <button type="button" class="btn btn-outline-primary px-2" data-bs-dismiss="modal" onclick="addRoadControlItem();">保存</button>
            </div>
        </div>
                                           
                                        </div>    
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>        
<script>
var currentfactor = 1;
function changeFactor(factor){
//    alert("changeFactor");
    currentfactor = factor;
    console.log("currentfactor: " + currentfactor);
    switch(factor){
        case 1:
            reqSetupItems(1, "rcdatavisibility", "nowdata_visibility");
            break;
        case 2:
            reqSetupItems(2, "rcdatarain", "nowdata_rain");
            break;
        case 3:
            reqSetupItems(3, "rcdatasnow", "nowdata_snow");
            break;
        case 4:
            reqSetupItems(4, "rcdatawind", "nowdata_wind");
            break;            
    }
} 

$("#rcfactor").change(function(){
    var selectvalue = parseInt($(this).val());
    changeFactorValue(selectvalue);
});

function changeFactorValue(selectvalue){
    switch(selectvalue){
        case 1:
            $("#factorremark").text("能风度小于100米为浓雾；能见度100米-300米为重雾；能见度为300米-1000米为大雾；能见度为1000米-10000米为轻雾；");
            break;
        case 2:
            $("#factorremark").text("24小时内，降雨小于10mm为小雨；降雨10-25mm为中雨；降雨25-50mm为大雨；降雨50-100mm为暴雨；降雨100-200mm为大暴雨；降雨大于200ms为特大暴雨；");
            break;
        case 3:
            $("#factorremark").text("");
            break;
        case 4:
            $("#factorremark").text("风力等级范围为0级-12级");
            break;
    }    
}

function showAddWindow(){
    changeFactorValue(currentfactor);
    $("#rcfactor").val(currentfactor);
    $("#rcstartvalue").val("");
    $("#rcendvalue").val("");
    $("#rcsuggestspeed").val("");
}
    
function reqSetupItems(rcfactor, tableid, nodatadivid){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    }); 
    
//    alert("getroadcontroldata");
    
    $.ajax({
        type: "GET",
        url: "getroadcontroldata?rcfactor=" + rcfactor,
        dataType: "json",
        success: function (resdata) {
            var tbl = document.getElementById(tableid);
            var rows = tbl.rows; //获取表格的行数

            for (var i = rows.length - 1; i > 0 ; i--) {
                tbl.deleteRow(i);    
            }
            
//            alert("test");
            if(resdata["rules"].length > 0){
                document.getElementById(nodatadivid).style.display = "none";
                document.getElementById(tableid).style.display = "";
            } else {
                document.getElementById(nodatadivid).style.display = "";
                document.getElementById(tableid).style.display = "none";
            }

            var maxid =  resdata["rules"].length;
            for(var i=0;i<maxid;i++){
                var tr=tbl.insertRow(i+1);
                tr.className = "tr_content";
                //添加单元格
                var cell0=tr.insertCell(0);
                cell0.innerHTML = resdata["rules"][i]["rcstartvalue"];
                var cell1=tr.insertCell(1);
                cell1.innerHTML=resdata["rules"][i]["rcendvalue"];
                var cell2=tr.insertCell(2);
                cell2.innerHTML=resdata["rules"][i]["rcsuggestspeed"]; 
                var cell3=tr.insertCell(3);
                cell3.innerHTML= "<a href='#' onclick='deleteRoadControlRule(" + resdata["rules"][i]["id"] + ");'>删除</a>";                 
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("getroadcontroldata error");
        }
    }); 
}

function addRoadControlItem(){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    }); 
    
    var rcfactor = $("#rcfactor").val();
    var rcstartvalue = $("#rcstartvalue").val();
    var rcendvalue = $("#rcendvalue").val();
    var rcsuggestspeed = $("#rcsuggestspeed").val();
    
    $.ajax({
        type: "POST",
        url: "addroadcontrolrule?" + "rcfactor=" + rcfactor + "&rcstartvalue=" + rcstartvalue + "&rcendvalue=" + rcendvalue + "&rcsuggestspeed=" + rcsuggestspeed,
        dataType: "json",
        success: function (resdata) {
            document.getElementById("exampleWarningModal").style.display = "none";     
            reqSetupItems(1, "rcdatavisibility", "nowdata_visibility");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            
        }
    }); 
}

function deleteRoadControlRule(ruleid){
    if(confirm("确定删除此参数设置吗？") === false){
        return;
    }
    
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    }); 
    
    $.ajax({
        type: "POST",
        url: "deleteroadcontrolrule?" + "ruleid=" + ruleid,
        dataType: "json",
        success: function (resdata) {
            changeFactor(currentfactor);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            
        }
    });     
}

reqSetupItems(1, "rcdatavisibility", "nowdata_visibility");
</script>        
@endsection