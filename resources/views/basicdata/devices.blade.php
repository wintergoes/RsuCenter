@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个设备吗？') == false){
            return;
        }
        
        window.location.href= 'deletedevice?deviceid=' + gtid;
    }
</script>

<h5 class="card-title">用户列表</h5>
<hr>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($devices) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >设备编号</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($devices as $device)
                    <tr>
                        <td>{{$device->id}}</td>
                        <td>{{$device->devicecode}}</td>
                        <td>{{$device->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                <button class="btn btn-light border-dark border-1 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                <ul class="dropdown-menu" style="margin: 0px;">
                                    <li><a class="dropdown-item" href="devicelogs?devicecode={{$device->id}}">系统日志</a></li>
                                    <li><a class="dropdown-item" href="bsmlogs?devicecode={{$device->id}}">BSM日志</a></li>
                                    <li><a class="dropdown-item" href="javascript:confirmDelete({{$device->id}});">删除</a></li>
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