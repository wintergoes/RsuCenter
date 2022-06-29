@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<h5 class="card-title">考勤统计</h5>
<hr>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            <input type="hidden" name="_token" value="ZaVg5KCerjuZCgDytKghF6Jc2kLHYSyMRo4MCXTB">
            <table style="font-size: 12px; text-align: center;" >
                <tr>                   
                    <td class="search_td">日期 自&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="16" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd'})" autocomplete="off" size="16" value="{{$searchtodate}}"/></td>
                  
                    <td class="search_td">&nbsp;&nbsp;人员&nbsp;&nbsp;</td>
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
        <div class="col-sm-auto">
        <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >姓名</th>
                        <th >日期</th>
                        <th >上班时间</th>
                        <th >下班时间</th>
                    </tr>
                </thead>            
                <tbody>
                    @foreach($clockins as $ci)
                    <tr>
                        <td>{{$ci->realname}}</td>
                        <td>{{$ci->clockindate}}</td>
                        <td>{{$ci->sbtime}}</td>
                        <td>{{$ci->xbtime}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>    
        </div>
    </div>
</div>

@endsection