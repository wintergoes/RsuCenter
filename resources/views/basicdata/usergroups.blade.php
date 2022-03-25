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
        <a href="addusergroup"><button type="button" class="btn btn-outline-success px-5 radius-30">新增用户组</button></a>
    </div>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        <div class="col-sm-auto">
            @if (count($usergroups) > 0)
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th  style="width: 300px;">用户名</th>
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
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="btn btn-outline-secondary px-1 radius-6" onclick="confirmDelete({{$group->id}});"><span class="am-icon-trash-o"></span> 删除</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach                            
                </tbody>
            </table>
            @else
            <div class="alert border-0 border-start border-5 border-warning alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                            <div class="font-35 text-warning"><i class="bx bx-info-circle"></i>
                            </div>
                            <div class="ms-3">
                                    <h6 class="mb-0 text-warning">提示</h6>
                                    <div>暂时还没有用户组。</div>
                            </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
            @endif
        </div>
    </div>
</div>
 
@endsection