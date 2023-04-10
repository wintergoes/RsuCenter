@extends('layouts.home')

@section('content')
<script type="text/javascript" src="http://api.tianditu.gov.cn/api?v=3.0&tk=41a827605c36598489f9ddee196c176c"></script>

<script type="text/javascript" src="/api/bdmapjs?maptype=webgl"></script>
<script type="text/javascript" src="js/coordtransform.js"></script>
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<h5 class="card-title">Rsm分析</h5>
<hr>

<div class="row mb-0">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }} 
            <table style="font-size: 12px; text-align: center; margin-bottom: 6px; width: 100%;" >
                <tr> 
                    <td>Connect:</td>
                    <td class="search_td">
                        <textarea id="connectjson" rows="5" style="width: 100%;"></textarea>
                    </td>
                    <td><input type="button" onclick="showConnect();" value="显示"/></td>;
                </tr>        
       
            </table>
        </form>
</div>

<table class="table mb-0 table-borderless " style="width: 100%;">
    <tr>
        <td valign="top">
        <div id="bdmap_container" style="width: 100%; height: 1000px; min-width: 600px;">    
        </td>
    </tr>
</table>

<script>
</script>    
@endsection