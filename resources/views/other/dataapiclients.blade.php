@extends('layouts.home')

@section('content')

<h5>数据api客户管理</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="adddataapiclient"><button type="button" class="btn btn-outline-success px-2 radius-6">新建客户</button></a>
    </div>
</div>


<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
@if (count($dataapiclients) > 0)
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >客户名称</th>
                        <th >客户Key</th>
                        <th >客户备注</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataapiclients as $client)
                    <tr>
                        <td >{{$client->id}}</td>
                        <td>{{$client->clientname}}</td>
                        <td>{{$client->clientkey}}</td>
                        <td>{{$client->clientremark}}</td>
                        <td >{{$client->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="editdataapiclient?clientid={{$client->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$client->id}});">删除</a></li>
                                    </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach                            
                </tbody>
            </table>
        </div>

{{ $dataapiclients->appends([])->links() }}
@else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">api用户列表为空！</div>
        </div>
        </div>
@endif
    </div>
</div>

@endsection