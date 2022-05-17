@extends('layouts.home')

@section('content')

<div class="row">
    <div class="col col-lg-9 mx-auto">

    <form class="form-horizontal" id="form1" method="post" action="/importgps2directiondatasave">
        {{ csrf_field() }}
        <div>
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>

        <div class="row mb-3">
            <label for="dname" class="col-sm-2 col-form-label">名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="dname" name="dname" placeholder="">
            </div>
        </div>

        <div class="row mb-3">
            <label for="devicecode" class="col-sm-2 col-form-label">导入内容</label>
            <div class="col-sm-6">
                <textarea rows="20"  class="form-control" id="dcontent" name="dcontent"></textarea>
            </div>
        </div> 
        
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6" style="text-align: right;">
                <button type="submit" class="btn btn-outline-primary px-2" >保存修改</button>
            </div>
        </div>        
    </form>

    <div>
</div>
@endsection