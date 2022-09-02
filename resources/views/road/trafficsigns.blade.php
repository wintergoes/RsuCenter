@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs"></script>
<script language="javascript" type="text/javascript" src="/js/zlzl.js"></script>
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个交通标志信息吗？') == false){
            return;
        }
        
        window.location.href= 'deletetrafficsign?id=' + gtid;
    }
    
    function showWinfoOnMap(){
        
    }
</script>

<h5 class="card-title">交通标志管理</h5>
<hr>

<div class="mb-lg-3">
    <div class="col-sm-12 col-md-12">
        <a href="addtrafficsign"><button type="button" class="btn btn-outline-success px-2 radius-6">新增交通标志</button></a>
    </div>
</div>


<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($trafficsigns) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >标志名称</th>
                        <th >参数</th>
                        <th >位置</th>
                        <th >维护人员</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $commonctrl = new \App\Http\Controllers\CommonController() ?>
                    @foreach($trafficsigns as $sign)
                    <tr>
                        <td>{{$sign->id}}</td>
                        <td>{{$sign->tsname}}</td>
                        <td>{{$sign->tsparam1 == "" ? "-" : $sign->tsparam1}}</td>
                        <td>点击查看</td>
                        <td>{{$sign->realname}}</td>
                        <td>{{$sign->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                    <button class="btn btn-light border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                    <ul class="dropdown-menu" style="margin: 0px;">
                                                <li><a class="dropdown-item" href="edittrafficsign?id={{$sign->id}}">编辑</a></li>
                                                <li><a class="dropdown-item" href="javascript:confirmDelete({{$sign->id}});">删除</a></li>
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
                <div class="text-info">没有符合条件的交通标志信息！</div>
        </div>
        </div>
        @endif         
    </div>
</div>

@if(count($trafficsigns) > 0)
<div style="margin-top: 10px;">
   
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $trafficsigns->links() }}  
    </div> 
    </nav>
</div>

<script>
formatPagelinks();
</script>
@endif
<script>
fillQuickDateSelector("quickdateselector", "fromdate", "todate");    
</script>
@endsection