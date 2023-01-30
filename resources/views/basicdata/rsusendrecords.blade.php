@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>   
<script src="js/zlzl.js"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>  
<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个雷视设备吗？') == false){
            return;
        }
        
        window.location.href= 'deleteradardevice?id=' + gtid;
    }
</script>

<h5 class="card-title">RSU下发记录</h5>
<hr>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($devicerequests) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >log_radom</th>
                        <th >设备编号</th>
                        <th >请求<br>时间</th>
                        <th >修改<br>时间</th>
                        <th >类型</th>
                        <th >请求<br>序号</th>
                        <th >req_JSON</th>
                        <th >req_start_time</th>
                        <th >req_end_time</th>
                        <th >return_JSON</th>
                        <th >删除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($devicerequests as $req)
                    <tr>
                        <td >{{$req->log_radom}}</td>
                        <td>{{$req->device_id}}</td>
                        <td>{{$req->request_datetime}}</td>
                        <td>{{$req->modify_datetime == "" ? "-" : $req->modify_datetime}}</td>
                        <td>{{$req->request_type}}</td>
                        <td>{{$req->request_no}}</td>
                        <td style="max-width: 500px; WORD-BREAK:break-all;">{{$req->request_JSON}}</td>
                        <td>{{$req->request_start_time}}<br><font color="grey">{{$req->request_start_time_time}}</font></td>
                        <td>{{$req->request_end_time}}<br><font color="grey">{{$req->request_end_time_time}}</font></td>                        
                        <td style="max-width: 200px; WORD-BREAK:break-all;">{{$req->return_JSON == "" ? "-" : $req->return_JSON}}</td>
                        @if($req->deleted)
                        <td><font color="red">是</font></td>
                        @else
                        <td>否</td>
                        @endif                       
                    </tr>
                    @endforeach                            
                </tbody>
            </table>
            
            <div class="modal fade" id="exampleWarningModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" >
                            <div class="modal-content bg-light" >
                                <div class="card radius-6 border-1 border-grey111111">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0 card-title" id="map_title">
                                                    <i class="bx bx-map">
                                                    </i>
                                                    
                                                </h6>
                                            </div> 
                                        </div>
                                        <div class="col-sm-12" id="bdmap_container" style="height: 600px;"></div>    
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
        @else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">下发记录为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>

@if(count($devicerequests) > 0)
<div style="margin-top: 10px;">
   
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $devicerequests->appends([])->links() }}  
    </div> 
    </nav>
</div>

<script>
formatPagelinks();
</script>
@endif



@endsection