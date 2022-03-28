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

<h5 class="card-title">用户列表</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="adduser"><button type="button" class="btn btn-outline-success px-2 radius-6">新增用户</button></a>
    </div>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($users) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >用户名</th>
                        <th >用户组</th>
                        <th >真实姓名</th>
                        <th >手机号</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td >{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->groupname}}</td>
                        <td>{{$user->realname}}</td>
                        <td>{{$user->mobile}}</td>
                        <td >{{$user->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-dark border-1 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="edituser?userid={{$user->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$user->id}});">删除</a></li>
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
                <div class="text-info">用户列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 
@endsection