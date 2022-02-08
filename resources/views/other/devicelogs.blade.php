@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>
<div class="tpl-content-page-title">
    日志查看
</div>
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-list"></span>　日志查看
        </div>

    </div>
    
    <div class="tpl-block">
       
        <form id="form1" method="get" >
            <input type="hidden" name="_token" value="ZaVg5KCerjuZCgDytKghF6Jc2kLHYSyMRo4MCXTB">
            <table style="font-size: 12px; margin-left: 15px;  text-align: center;" >
                <tr>                   
                    <td class="search_td">日期 自</td>
                    <td class="search_td"><input name="fromdate" onClick="WdatePicker()" autocomplete="off" size="12" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">至</td>
                    <td class="search_td"><input name="todate" onClick="WdatePicker()" autocomplete="off" size="12" value="{{$searchtodate}}"/></td>    
                    <td class="search_td">设备编号</td>
                    <td class="search_td"><input name="devicecode" size="12" value="{{$searchdevicecode}}"/></td>                    
                    <td class="search_td"><button type="submit">查询</button></td>
                </tr>
            </table>
        </form>        
                
        
        <div class="am-g">
            <div class="am-u-sm-12">
                <textarea rows="20" style="width: 100%">@foreach($devicelogs as $dlog){{$dlog->logcontent . "\r"}}@endforeach</textarea>
            </div>
        </div>
        <br/><br/>
        <table class="am-table am-table-striped am-table-hover table-main" >
                <tbody><?php $lfcount = 0 ?>
                    <tr>
                        @foreach($logfiles as $logfile)
                        <td>{{$logfile->logfile}} <a href="dllogfile?filename={{$logfile->logfile}}&devicecode={{$searchdevicecode}}" target="_blank"><img src="images/dllogfile.png" width="20px" height="20px"></a></td>

                        <?php $lfcount++ ?>
                        {!!$lfcount % 5 == 0 ? "</tr><tr>" : ""!!}
                        @endforeach
                    </tr>           
                </tbody>
        </table>        
    </div>

</div>

@endsection