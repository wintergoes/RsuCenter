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
                        <select name="obudevice" class="form-select"  style="width: 200px">
                            <option class="form-control" value="" {{$searchobu == "" ? "selected" : ""}}>不限</option>
                            @foreach($obus as $obu)
                            <option class="form-control" value="{{$obu->id}}" {{$searchobu == $obu->id ? "selected" : ""}}>{{$obu->obuid}}</option>
                            @endforeach
                        </select>
                    </td>                    
                    <td class="search_td">&nbsp;&nbsp;<button type="submit" class="btn btn-outline-secondary px-1 radius-6">查询</button></td>
                </tr>
            </table>
        </form>
</div>

<div class="row">
    @if(count($obuvideos) > 0)
    <div class="col-12 col-lg-12 p-xl-3">
        <div class="card radius-6 border-1 ">
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 row-cols-xl-4">
                    @foreach($obuvideos as $video)
                    <div class="col">
                        <div class="">
                            <video muted="muted" controls class="card-img-top" id='obu_video_{{$video->id}}'>
                                <source src="{{env("obu_video_path")}}{{$video->obuid}}/{{$video->filename}}" type="video/mp4">
                            </video>
                            <div class="card-body text-center">
                                <p class="card-title">
                                    {{$video->obucode}} - {{$video->filename}} <img src="images/delete_video.png" width="20" height="20" onclick="deleteObuVideo('{{$video->id}}', '{{$video->filename}}');" style="cursor:pointer;"/>
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

@if(count($obuvideos) > 0)
<div class="card" id="pagelinks_container">
    <div class="card-body">
    <nav aria-label="Page navigation example">						
     <div id="pagelinks">
    {{ $obuvideos->appends([ "fromdate"=>$searchfromdate,
                "todate"=>$searchtodate, "obudevice"=>$searchobu])->links() }}  
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

function deleteObuVideo(fileid, filename){
    if(confirm("确定要删除视频文件 "  + filename + "吗?") === false){
        return;
    }
    
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } 
    });    
    
    $.ajax({
        type: "GET",
        url: "deleteobuvideo?fileid=" + fileid,
        dataType: "json",
        success: function (data) {
            if(data.retcode === 1){
                var videoctrl = document.getElementById("obu_video_" + fileid);
                videoctrl.src = "images/video_deleted.mp4";
            } else {
                alert("删除失败！");
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("删除失败1！");
        }
    });        
}
</script>
@endif

@endsection