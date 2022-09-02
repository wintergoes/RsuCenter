@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个雷视设备吗？') == false){
            return;
        }
        
        window.location.href= 'deleteradardevice?id=' + gtid;
    }
</script>

<h5 class="card-title">OBU设备列表</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addradardevice"><button type="button" class="btn btn-outline-success px-2 radius-6">新增雷视设备</button></a>
    </div>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($radardevices) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >设备编号</th>
                        <th >Mac地址</th>
                        <th >ip地址</th>
                        <th >视频流地址</th>
                        <th >端口</th>
                        <th >车道数</th>
                        <th >车道宽度</th>
                        <th >坐标</th>
                        <th >状态</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($radardevices as $radar)
                    <tr>
                        <td >{{$radar->id}}</td>
                        <td>{{$radar->devicecode}}</td>
                        <td>{{$radar->macaddress}}</td>
                        <td>{{$radar->ipaddress}}</td>
                        <td>{{$radar->videostreamaddress}}</td>
                        <td>{{$radar->httpstreamport}}</td>
                        <td>{{$radar->lanenumber}}</td>
                        <td>{{$radar->lanewidth}}</td>
                        <td>{{$radar->lng}}, {{$radar->lat}}</td>
                        <td>{{$radar->status == 1 ? "有效" : "无效"}}</td>                        
                        <td >{{$radar->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="editradardevice?id={{$radar->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$radar->id}});">删除</a></li>
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
                <div class="text-info">雷视设备列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 
@endsection