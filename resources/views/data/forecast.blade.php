@extends('layouts.home')

@section('content')
<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>  
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/hikvision.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
<h5 class="card-title">雷视事件检测查询</h5>
<hr>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }}
            <table style="font-size: 12px; text-align: center;" >
                <tr height="40px">                   
                    <td class="search_td">日期 自&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="fromdate" id="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" id="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchtodate}}"/></td>
                    <td class="search_td"><select class="form-select" id="quickdateselector"/></td>     
                    <td class="search_td"><button type="submit" class="btn btn-outline-secondary radius-6" style="padding: 2px;">查询</button></td>
                </tr>                
            </table>
        </form>
</div>
<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($forecast) > 0)
        <div class="col-sm-12">
        <table class="table mb-0 table-hover table-bordered text-center" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >温度°C</th>
                        <th >湿度%RH</th>
                        <th >风力</th>
                        <th >风向</th>
                        <th >风速m/s</th>
                        <th >能见度m</th>
                        <th >大气压hPa</th>
                        <th >降雨量mm</th>
                        <th >湿滑系数</th>
                        <th >检测时间</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach($forecast as $fcast)
                    <tr>
                        <td>{{$fcast->id}}</td>
                        <td>{{$fcast->temperature}}°C</td>
                        
                        <td>{{$fcast->humidity}}</td>
                        <td>{{$fcast->windpower}}级</td>
                        <td>{{$fcast->winddirection}}</td>
                        <td>{{$fcast->windspeed}}</td>                        
                        
                        <td>{{$fcast->visibility}}</td>
                        
                        <td>{{$fcast->pressure}}</td>     
                        <td>{{$fcast->rainfall}}</td>   
                        <td>{{$fcast->wetroad}}</td>   
                        <td>{{$fcast->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        </div>
        @else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">没有符合条件的数据！</div>
        </div>
        </div>
        @endif
        
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
</div>

@if (count($forecast) > 0)
<div class="card mt-3" id="pagelinks_container">
    <div class="card-body">
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $forecast->appends([ "fromdate"=>$searchfromdate,
                "todate"=>$searchtodate])->links() }}  
    </div> 
    </nav>
    </div>
</div>

<script>
var objs = document.getElementById("pagelinks").getElementsByTagName("a");
if(objs.length === 0){
    pldiv = document.getElementById("pagelinks_container");
    pldiv.style.visibility = 'hidden';
}
for(var i = 0; i < objs.length; i++){
    objs[i].className = objs[i].className + " page-link";
}

var liobjs = document.getElementById("pagelinks").getElementsByTagName("li");
for(var i = 0; i < liobjs.length; i++){
    liobjs[i].className = liobjs[i].className + " page-item";
}

var spanobjs = document.getElementById("pagelinks").getElementsByTagName("span");
for(var i = 0; i < spanobjs.length; i++){
    spanobjs[i].className = "page-link";
}
//alert(objs[0].innerText);
</script>
@endif

<script>
fillQuickDateSelector("quickdateselector", "fromdate", "todate");
</script>
@endsection