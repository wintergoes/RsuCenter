<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Rsu管理平台</title>
        <meta name="description" content="万家环保" />
        <meta name="keywords" content="index" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="renderer" content="webkit" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="image/png" href="i/favicon.png" />
        <link rel="apple-touch-icon-precomposed" href="i/app-icon72x72@2x.png" />
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        <link rel="stylesheet" href="../css/app.css" />
    </head>
    
    <body data-type="index">

<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<div class="tpl-portlet-components">
    <div class="tpl-block">
        <form id="form1" method="get" >
            <input type="hidden" name="_token" value="ZaVg5KCerjuZCgDytKghF6Jc2kLHYSyMRo4MCXTB">
            <input type="hidden" name="devicecode" value="{{$searchdevicecode}}" />
            <input type="hidden" name="logtype" value="{{$searchlogtype}}" />
            <table style="font-size: 12px; margin-left: 15px;  text-align: center;" >
                <tr> 
                    <td class="search_td">日期 自</td>
                    <td class="search_td"><input name="fromdate" onClick="WdatePicker()" autocomplete="off" size="12" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">至</td>
                    <td class="search_td"><input name="todate" onClick="WdatePicker()" autocomplete="off" size="12" value="{{$searchtodate}}"/></td>
                    <td class="search_td">关键字</td>
                    <td class="search_td"><input name="keyword" size="12" value="{{$searchkeyword}}"/></td> 
                    <td class="search_td"><button type="submit">查询</button></td>
                </tr>
            </table>
        </form>        
                
        
        <div class="am-g">
            <div class="am-u-sm-12">
                <textarea rows="30" wrap="off" style="width: 100%">@foreach($devicelogs as $dlog){{$dlog->logcontent . "\r"}}@endforeach</textarea>
            </div>
            
            <div>
                {{ $devicelogs->appends(["fromdate"=>$searchfromdate, "todate"=>$searchtodate, 
                        "devicecode"=>$searchdevicecode, "keyword"=>$searchkeyword, "logtype"=>$searchlogtype])->links() }}                
            </div>
        </div>     
    </div>

</div>
    </body>
    </html>