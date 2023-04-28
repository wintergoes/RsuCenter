@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<h5 class="card-title">用车打卡</h5>
<hr>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }}
            <table style="font-size: 12px; text-align: center;" >
                <tr>                   
                    <td class="search_td">日期 自&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="fromdate" id="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" id="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="10" value="{{$searchtodate}}"/></td>
                    <td class="search_td"><select class="form-select" id="quickdateselector"/></td>
                    
                    <td class="search_td">&nbsp;&nbsp;设备编号&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="obudevice" id="obudevice" onchange="showValidDates()" class="form-select"  style="width: 160px">
                            <option class="form-control" value="-1" >不限</option>
                            @foreach($obus as $obu)
                            <option class="form-control" value="{{$obu->id}}" {{$searchobu == $obu->id ? "selected" : ""}}>{{$obu->obuid}}</option>
                            @endforeach
                        </select>
                    </td>                      
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                </tr>
            </table>
        </form>
</div>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($clockins) > 0)
        <div class="col-sm-auto">
        <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >姓名</th>
                        <th >OBU</th>
                        <th >车牌号</th>
                        <th >上车时间</th>
                        <th >下车时间</th>
                        <th >运行轨迹</th>
                        <th >行车视频</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach($clockins as $ci)
                    <tr>
                        <td>{{$ci->realname == "" ? "-" : $ci->realname}}</td>
                        <td >{{$ci->obuid}}</td>
                        <td >{{$ci->plateno == "" ? "-" : $ci->plateno}}</td>
                        <td>{{$ci->cistarttime}}</td>
                        <td>{{$ci->ciendtime == "" ? "-" : $ci->ciendtime}}</td>                   
                        <td><a href="oburoute?obudevice={{$ci->obuintid}}&fromdate={{substr($ci->cistarttime, 0, 10)}}&locationtype=1&fromtime={{substr($ci->cistarttime, 11, 5)}}&totime={{substr($ci->ciendtime, 11, 5)}}" target="_blank">运行轨迹</a></td>
                        <td><a href="obuvideos?obudevice={{$ci->obuintid}}&fromdate={{$ci->cistarttime}}&locationtype=1&todate={{$ci->ciendtime}}" target="_blank">行车视频</a></td>
                    </tr>
                    @endforeach
                </tbody>
        </table>    
        </div>
        @else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">没有符合条件的打卡记录！</div>
        </div>
        </div>
        @endif          
    </div>
</div>

<script>
fillQuickDateSelector("quickdateselector", "fromdate", "todate");
</script>
@endsection