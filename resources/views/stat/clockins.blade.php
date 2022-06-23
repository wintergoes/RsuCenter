@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

@if($logtype == 0)
<h5 class="card-title">系统日志</h5>
@else
<h5 class="card-title">BSM日志</h5>
@endif
<hr>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            <input type="hidden" name="_token" value="ZaVg5KCerjuZCgDytKghF6Jc2kLHYSyMRo4MCXTB">
            <input type="hidden" name="logtype" value="{{$logtype}}" />
            <table style="font-size: 12px; text-align: center;" >
                <tr>                   
                    <td class="search_td">日期 自&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" autocomplete="off" size="16" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" autocomplete="off" size="16" value="{{$searchtodate}}"/></td>
                  
                    <td class="search_td">&nbsp;&nbsp;设备编号&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="devicecode" class="form-select"  style="width: 200px">
                            @foreach($devices as $device)
                            <option class="form-control" value="{{$device->id}}" {{$searchdevicecode == $device->id ? "selected" : ""}}>{{$device->devicecode}}</option>
                            @endforeach
                        </select>
                    </td>                    
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                </tr>
            </table>
        </form>
</div>

<style>
a:visited{color: #F03C96;}    
</style>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        <div class="col-sm-auto">
        <table class="table mb-0 table-hover table-bordered" style="width: 100%">
                <tbody><?php $lfcount = 0 ?>
                    <tr>
                        @foreach($logfiles as $logfile)
                        <td style="font-size: 12px">
                            <nobr><a href="{{$logtype == 0 ? "device" : "bsm"}}logfilecontent?filename={{$logfile->logfile}}&devicecode={{$searchdevicename}}&deviceid={{$searchdevicecode}}&logtype={{$logtype}}" target="_blank">{{$logfile->logfile}}</a> 
                            <a href="dllogfile?filename={{$logfile->logfile}}&devicecode={{$searchdevicename}}&deviceid={{$searchdevicecode}}&logtype={{$logtype}}" target="_blank"><img src="images/dllogfile.png" width="20px" height="20px"></a></nobr>
                        </td>

                        <?php $lfcount++ ?>
                        {!!$lfcount % 5 == 0 ? "</tr><tr>" : ""!!}
                        @endforeach
                    </tr>           
                </tbody>
        </table>    
        </div>
    </div>
</div>

@endsection