@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个用户组吗？') == false){
            return;
        }
        
        window.location.href= 'deleteusergroup?groupid=' + gtid;
    }
</script>

<h5 class="card-title">用户组列表</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addusergroup"><button type="button" class="btn btn-outline-success px-2 radius-6">新增用户组</button></a>
    </div>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($usergroups) > 0)
        <div class="col-sm-auto">
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th  style="width: 300px;">用户组名</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usergroups as $group)
                    <tr>
                        <td >{{$group->id}}</td>
                        <td>{{$group->groupname}}</td>
                        <td >{{$group->created_at}}</td>
                        <td>
                            <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="editusergroup?groupid={{$group->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$group->id}});">删除</a></li>
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
                <div class="text-info">用户组列表为空！</div>
        </div>
        </div>
        @endif        
    </div>
</div>
 
@endsection