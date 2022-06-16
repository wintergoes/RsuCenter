@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个路段吗？') == false){
            return;
        }
        
        window.location.href= 'deleteroad?roadid=' + gtid;
    }
</script>

<h5 class="card-title">路段列表</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addroad"><button type="button" class="btn btn-outline-success px-2 radius-6">新增路段</button></a>
    </div>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($roads) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >名称</th>
                        <th >备注</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roads as $road)
                    <tr>
                        <td>{{$road->id}}</td>
                        <td>{{$road->roadname}}</td>
                        <td>{{$road->remark == "" ? "-" : $road->remark}}</td>
                        <td>
                             <div class="dropdown">
                                <button class="btn btn-light border-dark border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                <ul class="dropdown-menu" style="margin: 0px;">
                                    <li><a class="dropdown-item" href="showroadcoordinate?roadid={{$road->id}}">道路坐标维护</a></li>
                                    @if($road->published == 1)
                                    <li><a class="dropdown-item" href="unpublishroad?roadid={{$road->id}}">取消发布</a></li>
                                    @else
                                    <li><a class="dropdown-item" href="publishroad?roadid={{$road->id}}">发布</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="editroad?roaid={{$road->id}}">编辑</a></li>
                                    <li><a class="dropdown-item" href="javascript:confirmDelete({{$road->id}});">删除</a></li>
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
                <div class="text-info">路段列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 
@endsection