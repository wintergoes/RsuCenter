@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个用户吗？') == false){
            return;
        }
        
        window.location.href= 'deleteuser?userid=' + gtid;
    }
</script>

<h5 class="card-title">OBU、RSU更新</h5>
<hr>

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
                    <tr>
                        <td >{{$hw->device_ID}}</td>
                        <td>{{$hw->hardversion}}</td>
                        <td>{{$hw->softversion}}</td>
                        <td>{{$hw->Is_online == 1 ? "是" : "否"}}</td>
                        <td>{{$hw->log_datetime}}</td>
                        <td >{{$hw->con_datetime == "" ? "-" : $hw->con_datetime}}</td>
                        <td >-</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="edituser?userid={{$hw->device_ID}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$hw->device_ID}});">删除</a></li>
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
 
@endsection