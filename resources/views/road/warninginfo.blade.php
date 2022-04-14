@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs"></script>


<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个预警信息吗？') == false){
            return;
        }
        
        window.location.href= 'deletewarninginfo?id=' + gtid;
    }
    
    function showWinfoOnMap(){
        
    }
</script>

<h5 class="card-title">预警信息</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addwarninginfo"><button type="button" class="btn btn-outline-success px-2 radius-6">新增预警</button></a>
    </div>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($warninginfo) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >预警名称</th>
                        <th >起始坐标</th>
                        <th >终点坐标</th>
                        <th >来源</th>
                        <th >创建者</th>
                        <th >状态</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warninginfo as $winfo)
                    <tr>
                        <td>{{$winfo->winame}}</td>
                        <td>{{$winfo->startlat}}, {{$winfo->startlng}}</td>
                        <td>{{$winfo->stoplat}}, {{$winfo->stoplng}}</td>
                        <td>{{$winfo->wisource}}</td>
                        <td>{{$winfo->realname}}</td>
                        <td>{{$winfo->wistatus == 1 ? "有效" : "无效"}}</td>
                        <td>{{$winfo->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="editwarninginfo?id={{$winfo->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$winfo->id}});">删除</a></li>
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
                <div class="text-info">没有预警信息！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 
@endsection