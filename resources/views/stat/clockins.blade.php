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
                    <td class="search_td">&nbsp;&nbsp;&nbsp;&nbsp;人员&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="userid" class="form-select" >
                            <option class="form-control" value="-1" {{$searchuserid == -1 ? "selected" : ""}}>不限</option>
                            @foreach($users as $user)
                            <option class="form-control" value="{{$user->id}}" {{$searchuserid == $user->id ? "selected" : ""}}>{{$user->realname}}</option>
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
                        <th >日期</th>
                        <th >上车时间</th>
                        <th >下车时间</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach($clockins as $ci)
                    <tr>
                        <td>{{$ci->realname == "" ? "-" : $ci->realname}}</td>
                        <td>{{$ci->clockindate}}</td>
                        @if ($ci->sbtime == "")
                        <td><font color="red">未打卡</font></td>
                        @else
                        <td>{{$ci->sbtime}}</td>
                        @endif

                        @if ($ci->xbtime == "")
                        <td><font color="red">未打卡</font></td>
                        @else
                        <td>{{$ci->xbtime}}</td>
                        @endif                        
                        <!--<td><a href="oburoute?obudevice={{$ci->obuid}}&fromdate={{substr($ci->sbtime, 0, 9)}}&locationtype=1&fromtime={{substr($ci->sbtime, 11, 8)}}&totime={{substr($ci->xbtime, 11, 8)}}" target="_blank">运行轨迹</a></td>-->
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