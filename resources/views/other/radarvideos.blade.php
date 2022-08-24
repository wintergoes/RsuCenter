@extends('layouts.home')

@section('content')
<script language="javascript" type="text/javascript" src="/js/dateutils.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<h5 class="card-title">OBU视频</h5>
<hr>

<div class="row mb-4">
        <form id="form1" class="form-horizontal" method="get" >
            {{ csrf_field() }}
            <table style="font-size: 12px; text-align: center;" >
                <tr>                   
                    <td class="search_td">日期 自&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="fromdate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" autocomplete="off" size="16" value="{{$searchfromdate}}"/></td>
                    <td class="search_td">&nbsp;&nbsp;至&nbsp;&nbsp;</td>
                    <td class="search_td"><input name="todate" class="form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})" autocomplete="off" size="16" value="{{$searchtodate}}"/></td>
                  
                    <td class="search_td">&nbsp;&nbsp;设备编号&nbsp;&nbsp;</td>
                    <td class="search_td">
                        <select name="radardevice" class="form-select"  style="width: 200px">
                            <option value="-1">全部</option>
                            @foreach($radars as $radar)
                            <option class="form-control" value="{{$radar->id}}" {{$searchradar == $radar->id ? "selected" : ""}}>{{$radar->devicecode}}</option>
                            @endforeach
                        </select>
                    </td>                    
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                </tr>
            </table>
        </form>
</div>

<div class="row">
    @if(count($radarvideos) > 0)
    <div class="col-12 col-lg-12 ">
        <div class="card radius-6 border-1 border-grey111111">
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 row-cols-xl-4">
                    @foreach($radarvideos as $video)
                    <div class="col">
                        <div class="">
                            <video muted="muted" controls class="card-img-top">
                                <source src="http://192.168.150.130:8079/{{$video->devicecode}}/{{$video->filename}}" type="video/mp4">
                            </video>
                            <div class="card-body text-center">
                                <p class="card-title">
                                    {{$video->filename}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-sm-12">
    <div class="p-4 border border-1 border-warning text-center rounded bg-light">
            <div class="text-info">没有符合条件的视频！</div>
    </div>
    </div>
    @endif
</div>

@if(count($radarvideos) > 0)
<div class="card" id="pagelinks_container">
    <div class="card-body">
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $radarvideos->appends([ "fromdate"=>$searchfromdate,
                "todate"=>$searchtodate, "radardevice"=>$searchradar])->links() }}  
    </div> 
    </nav>
    </div>
</div>    

<script>
var objs = document.getElementById("pagelinks").getElementsByTagName("a");
if(objs.length === 0){
    pldiv = document.getElementById("pagelinks_container");
    pldiv.style.visibility = 'hidden';
}
for(var i = 0; i < objs.length; i++){
    objs[i].className = objs[i].className + " page-link";
}

var liobjs = document.getElementById("pagelinks").getElementsByTagName("li");
for(var i = 0; i < liobjs.length; i++){
    liobjs[i].className = liobjs[i].className + " page-item";
}

var spanobjs = document.getElementById("pagelinks").getElementsByTagName("span");
for(var i = 0; i < spanobjs.length; i++){
    spanobjs[i].className = "page-link";
}
//alert(objs[0].innerText);
</script>
@endif

@endsection