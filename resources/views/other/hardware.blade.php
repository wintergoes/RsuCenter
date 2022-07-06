@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个设备吗？') === false){
            return;
        }
        
        window.location.href= 'deletehardware?log_radom=' + gtid;
    }
</script>

<h5 class="card-title">OBU、RSU更新</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="hwupdateres" target="_blank"><button type="button" class="btn btn-outline-success px-2 radius-6">升级包管理</button></a>
    </div>
</div>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }}
            <table style="font-size: 12px; text-align: center;" >
                <tr>                   
                    <td class="search_td">&nbsp;&nbsp;设备类型&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="devicetype" class="form-select"  style="width: 100px">
                            <option class="form-control" value="0" {{$searchdevicetype == 0 ? "selected" : ""}}>不限</option>
                            <option class="form-control" value="1" {{$searchdevicetype == 1 ? "selected" : ""}}>OBU</option>
                            <option class="form-control" value="2" {{$searchdevicetype == 2 ? "selected" : ""}}>RSU</option>
                        </select>
                    </td>
                    
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;在线状态&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="isonline" class="form-select"  style="width: 100px">
                            <option class="form-control" value="0" {{$searchisonline == 0 ? "selected" : ""}}>不限</option>
                            <option class="form-control" value="1" {{$searchisonline == 1 ? "selected" : ""}}>在线</option>
                            <option class="form-control" value="2" {{$searchisonline == 2 ? "selected" : ""}}>离线</option>
                        </select>
                    </td>                      
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                </tr>
            </table>
        </form>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($hws) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered text-center" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >HW Version</th>
                        <th >SW Version</th>
                        <th >是否在线</th>
                        <th >首次登录</th>
                        <th >最后通讯</th>
                        <th >版本更新</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hws as $hw)
                <script>
                    var time{{$hw->log_radom}};
                    var canceling{{$hw->log_radom}} = 0;
                    var startTime{{$hw->log_radom}} = Date.parse(new Date());
                    function cancelUpdate{{$hw->log_radom}}(timeout){
                        canceling{{$hw->log_radom}} = 1;
                        clearTimeout(time{{$hw->log_radom}});
                        $.ajaxSetup({ 
                            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
                        });    

                        $.ajax({
                            type: "POST",
                            url: "deletehwupdate?radom=" + {{$hw->log_radom}} + "&timeout=" + timeout,
                            dataType: "json",
                            success: function (data) {   
                                if(data.retcode === 1){
                                    if(timeout === 1){
                                        $('#updateres{{$hw->log_radom}}').html("更新超时，取消更新！");
                                    } else {
                                        $('#updateres{{$hw->log_radom}}').html("取消更新成功！");                                        
                                    }
                                    document.getElementById("tbl{{$hw->log_radom}}").style.visibility = 'visible';
                                    document.getElementById("tbl{{$hw->log_radom}}").style.display = '';                                    
                                } else {
                                    $('#updateres{{$hw->log_radom}}').html(data.retmsg + "(" + data.retcode + ")");
                                }
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                $('#updateres{{$hw->log_radom}}').html("取消更新失败！");
                            }
                        }); 
                    }
                    
                function updateHw{{$hw->log_radom}}(resid){
                    $.ajaxSetup({ 
                        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
                    });
                    $.ajax({
                        type: "POST",
                        url: "hwupdate?radom=" + {{$hw->log_radom}}+"&resid=" + resid,
                        dataType: "json",
                        success: function (data) {
                            $('#updateres{{$hw->log_radom}}').html(data.retmsg + "(" + data.retcode + ")<a href='#' onclick='cancelUpdate{{$hw->log_radom}}(0);'>取消</a>");
                            if(data.retcode === 1001){
                                startTime{{$hw->log_radom}} = Date.parse(new Date());
                                document.getElementById("tbl{{$hw->log_radom}}").style.visibility = 'hidden';
                                document.getElementById("tbl{{$hw->log_radom}}").style.display = 'none';   
                            } else if(data.retcode === 1003){
                                document.getElementById("tbl{{$hw->log_radom}}").style.visibility = 'visible';
                                document.getElementById("tbl{{$hw->log_radom}}").style.display = '';   
                            } else if(data.retcode === 1004){
//                                alert(Date.parse(new Date()) - startTime{{$hw->log_radom}});
                                if(Date.parse(new Date()) - startTime{{$hw->log_radom}} > 120000){
                                    cancelUpdate{{$hw->log_radom}}(1);
                                }
                            }
                            if(data.retcode !== 1003 && canceling{{$hw->log_radom}} === 0){
                                time{{$hw->log_radom}} = setTimeout('updateHw{{$hw->log_radom}}()', 1000, resid); 
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $('#updateres{{$hw->log_radom}}').html("请求失败！");
                            if(canceling{{$hw->log_radom}} === 0){
                                time{{$hw->log_radom}} = setTimeout('updateHw{{$hw->log_radom}}()', 1000, resid); 
                            }
                        }
                    });                    
                }        
                @if($hw->resource_id != "")
                updateHw{{$hw->log_radom}}({{$hw->resource_id}});
                @endif                
                </script>
                    <tr>
                        <td>{{$hw->device_ID}}</td>
                        <td>{{$hw->hardversion}}</td>
                        <td>{{$hw->softversion}}</td>
                        <td><div id="onlinestatus{{$hw->log_radom}}">{{$hw->Is_online == 1 ? "是" : "否"}}</div></td>
                        <td>{{$hw->log_datetime}}</td>
                        <td ><div id="conntime{{$hw->log_radom}}">{{$hw->con_datetime == "" ? "-" : $hw->con_datetime}}</div></td>
                        <td >
                            <table id='tbl{{$hw->log_radom}}' {!!$hw->resource_id != "" ? "style='visibility:hidden;display: none;'" : ""!!}><tr><td>
                                <select name="updateselector{{$hw->log_radom}}" id="updateselector{{$hw->log_radom}}"  class="form-select"  style="width: 200px">
                            @foreach($updateres as $res)
                            @if(($res->devicetype == 1 && strpos($hw->device_ID, "v2x")===0) ||
                                ($res->devicetype == 2 && strpos($hw->device_ID, "RSU")===0))
                            <option value="{{$res->id}}" {{$hw->resource_id == $res->id ? 'selected' : ""}}>{{$res->resource_name}}</option>
                            @endif
                            @endforeach
                            </select>
                            </td>
                            <td><input type="button" id="updatebutton{{$hw->log_radom}}" onclick="updateHw{{$hw->log_radom}}($('#updateselector{{$hw->log_radom}}').val());" {{$hw->resource_id != "" ? 'disabled="true"' : ""}} value="更新"/></td>
                                </tr></table>
                            
                            <div id="updateres{{$hw->log_radom}}"></div>
                        </td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$hw->log_radom}});">删除</a></li>
                                    </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach                            
                </tbody>
            </table>
        </div>
        @else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">设备列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 

<script>
    function hardwareinfo(){
        $.ajaxSetup({ 
            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
        });    

        $.ajax({
            type: "POST",
            url: "hardwareinfo",
            dataType: "json",
            success: function (data) {
                if(data.retcode === 1){
                    for(var i = 0; i < data.devices.length; i++){
                        $("#onlinestatus" + data.devices[i].log_radom).text(data.devices[i].Is_online === 1 ? "是" : "否");
                        $("#conntime" + data.devices[i].log_radom).text(data.devices[i].con_datetime);
                    }
                }
                setTimeout('hardwareinfo()', 1000);    
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                setTimeout('hardwareinfo()', 1000);    
            }
        });
    }
    hardwareinfo();
</script>
@endsection