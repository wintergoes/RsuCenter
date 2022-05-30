@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个OBU设备吗？') == false){
            return;
        }
        
        window.location.href= 'deleteobudevice?id=' + gtid;
    }
</script>

<h5 class="card-title">OBU设备列表</h5>
<hr>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($obudevices) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >OBUID</th>
                        <th >硬件标识</th>
                        <th >状态</th>
                        <th >最后坐标</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obudevices as $obu)
                    <tr>
                        <td >{{$obu->id}}</td>
                        <td>{{$obu->obuid}}</td>
                        <td>{{$obu->obulocalid}}</td>
                        <td>{{$obu->obustatus}}</td>
                        <td>{{$obu->obulatitude}}, {{$obu->obulongtitude}}</td>
                        <td >{{$obu->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="editobudevice?userid={{$obu->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$obu->id}});">删除</a></li>
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
                <div class="text-info">OBU设备列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 
@endsection