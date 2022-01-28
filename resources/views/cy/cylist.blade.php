@extends('layouts.home')

@section('content')

<script>
    var currurl = encodeURIComponent(window.location.href);

function editCy(cyid){
    window.location.href = "editcy?id=" + cyid + "&fromurl=" + currurl;
}

function deleteCy(cyid){
    if(confirm("确定要删除这个成语吗?")){
        window.location.href = "deletecy?id=" + cyid + "&fromurl=" + currurl;    
    }
}

</script>

<h1>广告管理</h1>

<div class="margin-bottom-30">
<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills">
      <li class="active"><a href="/addcy">添加成语</a></li>
      <li class="active"><a href="/createcyupdate">生成版本</a></li>
    </ul>          
  </div>
</div>
</div>

  <table class="table table-striped table-hover table-bordered" >
    <thead>
    <tr>
        <th >ID</th>
        <th>成语</th>
        <th>拼音</th>
        <th>缩写</th>
        <th width="300">成语解释</th>
        <th width="300">成语出处</th>
        <th width="100">操作</th>
    </tr>
    </thead>
    
    <tbody>
    @foreach($cys as $cy)
    <tr>
        <td >{{$cy->id}}</td>
        <td>{{$cy->name}}</td>
        <td>{{$cy->spell}}</td>
        <td>{{$cy->spellshort}}</td>
        <td width="300">{{$cy->content}}</td>
        <td width="300">{{$cy->derivation}}</td>
        <td width="100">
            <a href="#" onclick="editCy({{$cy->id}});">修改</a> 
            <a href="#" onclick="deleteCy({{$cy->id}});">删除</a> 

        </td>
    </tr>
    @endforeach
    </tbody>
</table>


{{ $cys->links() }}

@endsection