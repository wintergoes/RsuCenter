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

<h5 class="card-title">OBU、RSU升级包管理</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addhwupdateres"><button type="button" class="btn btn-outline-success px-2 radius-6">新增升级包</button></a>
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
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                </tr>
            </table>
        </form>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($resources) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered text-center" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >升级包名称</th>
                        <th >升级包位置</th>
                        <th >HW Version</th>
                        <th >SW Version</th>
                        <th >是否可用</th>
                        
                        <th >更新日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resources as $res)
                    <tr>
                        <td >{{$res->resource_id}}</td>
                        <td>{{$res->resource_name}}</td>
                        <td>{{$res->resource_content}}</td>
                        <td>{{$res->resource_hardversion}}</td>
                        <td>{{$res->resource_softversion}}</td>
                        <td>{{$res->Is_use ? "是" : "否"}}</td>
                        
                        <td >{{$res->modifydate == "" ? "-" : $res->modifydate}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="edituser?userid={{$res->resource_id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$res->resource_id}});">删除</a></li>
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
                <div class="text-info">升级包列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 
@endsection