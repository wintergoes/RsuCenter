@extends('layouts.home')

@section('content')

<h5 class="card-title">提示信息</h5>
<hr>

<div class="row">
    <div class="col col-lg-9 mx-auto">
        <div class="alert border-0 border-start border-5 border-info alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                        <div class="font-35 text-info m-3"><i class="bx bx-info-square"></i>
                        </div>
                        <div class="row">                        
                                <div>{{$simplemessage}}</div>
                        </div>
                    
                        @if(isset($backurl1))
                            <a href="{{$backurl1}}">{{$backtext1}}</a>    
                        @else
                            <a href="javascript:history.back(-1);">返回</a>
                        @endif                    
                </div>
        </div>
    </div>
</div>

@endsection