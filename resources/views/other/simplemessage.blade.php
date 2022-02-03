@extends('layouts.home')

@section('content')

<div class="tpl-content-page-title">
    提示信息
</div>
<div class="tpl-portlet-components">

    
    <div class="tpl-block" >

        <div class="am-g">
            <div class="am-u-sm-12">
                <div class="note note-info" style="margin-top: 10px;">
                    <p><span class="label label-danger">提示:</span> {{$simplemessage}}
                    </p>
                </div>       
            </div>
            
            @if(isset($backurl1))
            <div class="am-u-sm-9 am-u-sm-push-3">
                <a href="{{$backurl1}}">{{$backtext1}}</a>
            </div>            
            @else
            <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="button" class="am-btn am-btn-default" onclick="history.back(-1);">返回</button>
            </div>
            @endif
        </div>
    </div>

</div>

@endsection