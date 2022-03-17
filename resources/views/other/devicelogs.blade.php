@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-list"></span>　日志查看
        </div>

    </div>
    
    <div class="tpl-block">
       
        <form id="form1" method="get" >
            <input type="hidden" name="_token" value="ZaVg5KCerjuZCgDytKghF6Jc2kLHYSyMRo4MCXTB">
            <input type="hidden" name="logtype" value="{{$logtype}}" />
            <table style="font-size: 12px; margin-left: 15px;  text-align: center;" >
                <tr>                   
                    <td class="search_td">日期 自</td>
                    <td class="search_td"><input name="fromdate" onClick="WdatePicker()" autocomplete="off" size="12" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">至</td>
                    <td class="search_td"><input name="todate" onClick="WdatePicker()" autocomplete="off" size="12" value="{{$searchtodate}}"/></td>
                  
                    <td class="search_td">设备编号</td>
                    <td class="search_td">
                        <select name="devicecode" style="width: 120px">
                            @foreach($devices as $device)
                            <option value="{{$device->id}}" {{$searchdevicecode == $device->id ? "selected" : ""}}>{{$device->devicecode}}</option>
                            @endforeach
                        </select>                        
                    </td>                    
                    <td class="search_td"><button type="submit">查询</button></td>
                </tr>
            </table>
        </form>        

        <table class="am-table am-table-striped am-table-hover table-main" >
                <tbody><?php $lfcount = 0 ?>
                    <tr>
                        @foreach($logfiles as $logfile)
                        <td>{{$logfile->logfile}} <a href="dllogfile?filename={{$logfile->logfile}}&devicecode={{$searchdevicename}}&deviceid={{$searchdevicecode}}&logtype={{$logtype}}" target="_blank"><img src="images/dllogfile.png" width="20px" height="20px"></a></td>

                        <?php $lfcount++ ?>
                        {!!$lfcount % 5 == 0 ? "</tr><tr>" : ""!!}
                        @endforeach
                    </tr>           
                </tbody>
        </table>        
    </div>

</div>

@endsection