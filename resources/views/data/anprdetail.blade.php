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
                        <td>{{$anprevent->licenseplate}}</td>
                    </tr>
                    <tr>
                        <td>车辆品牌：</td>
                        <td>{{$anprevent->vehlogoname == "" ? "-" : $anprevent->vehlogoname}}</td>
                    </tr>
                    <tr>
                        <td>车辆车系：</td>
                        <td>{{$anprevent->vehsublogoname == "" ? "-" : $anprevent->vehsublogoname}}</td>
                    </tr>                    
                    <tr>
                        <td>检测时间：</td>
                        <td>{{$anprevent->eventtime}}</td>
                    </tr>
                    <tr>
                        <td>雷视编号：</td>
                        <td>{{$anprevent->devicecode}}</td>
                    </tr
                    <tr>
                        <td>UUID：</td>
                        <td>{{$anprevent->vehuuid}}</td>
                    </tr>
                    @for($i = 0; $i < $anprevent->vehpicnum; $i++)
                    <tr>
                        <td>图片{{$i+1}}</td>
                        <td><a href="radarpictures/{{date("Ymd", strtotime($anprevent->eventtime))}}/anpr_{{$anprevent->id}}_{{$i+1}}.jpg" target="_blank"><img style="max-width: 600px;" src="radarpictures/{{date("Ymd", strtotime($anprevent->eventtime))}}/anpr_{{$anprevent->id}}_{{$i+1}}.jpg" /></a></td>
                    </tr>
                    @endfor
                </tbody>
        </table>    
        </div>        
    </div>
</div>

@endsection