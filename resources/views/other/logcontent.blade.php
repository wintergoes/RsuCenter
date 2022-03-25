@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

@if($logtype == 0)
<h5 class="card-title">系统日志 - {{$logfile}}</h5>
@else
<h5 class="card-title">BSM日志 - {{$logfile}}</h5>
@endif
<hr>


<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        <div class="col-sm-12">
            <textarea class="form-control col-sm-12" rows="30" wrap="off">{{$logcontent}}</textarea>   
        </div>
    </div>
</div>

@endsection