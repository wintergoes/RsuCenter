@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<h5 class="card-title">车辆识别图片</h5>
<hr>


<?php
$commonctrl = new \App\Http\Controllers\CommonController();
?>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        <div class="col-sm-auto">
        <table class="table mb-0 table-hover table-bordered" >         
                <tbody>
                    <tr>
                        <td>车牌号：</td>
                        <td>{{$aidevent->plate}}</td>
                    </tr>
                    <tr>
                        <td>检测时间：</td>
                        <td>{{$aidevent->eventtime}}</td>
                    </tr>
                    <tr>
                        <td>雷视编号：</td>
                        <td>{{$aidevent->devicecode}}</td>
                    </tr>
                    @for($i = 0; $i < $aidevent->detectionpicnumber; $i++)
                    <tr>
                        <td>图片{{$i+1}}</td>
                        <td><a href="radarpictures/{{date("Ymd", strtotime($aidevent->eventtime))}}/aid_{{$aidevent->id}}_{{$i+1}}.jpg" target="_blank"><img style="max-width: 600px;" src="radarpictures/{{date("Ymd", strtotime($aidevent->eventtime))}}/aid_{{$aidevent->id}}_{{$i+1}}.jpg" /></a></td>
                    </tr>
                    @endfor
                </tbody>
        </table>    
        </div>        
    </div>
</div>

@endsection