@extends('layouts.home')

@section('content')

<script>
    var currurl = encodeURIComponent(window.location.href);

function editCy(cyid){
    window.location.href = "editcy?id=" + cyid + "&fromurl=" + currurl;
}

function deleteCy(cyid){
    window.location.href = "deletecy?id=" + cyid + "&fromurl=" + currurl;    
}
</script>

<h1>广告管理</h1>

<form action="{{ url('/createcyupdatesave') }}" id="form1" method="POST" class="form-horizontal">
    {{ csrf_field() }} 

<div class="margin-bottom-30">
<div class="row">
  <div class="col-md-12">
      <span><input type="number" name="versionno"></span>
      <span><button type="submit">生成版本</button></span>          
  </div>
</div>
</div>
    
</form>

  <table class="table table-striped table-hover table-bordered" >
    <thead>
    <tr>
        <th >ID</th>
        <th>成语</th>
        <th>拼音</th>
        <th>缩写</th>
        <th width="400">成语解释</th>
        <th width="400">成语出处</th>
    </tr>
    </thead>
    
    <tbody>
    @foreach($cys as $cy)
    <tr>
        <td >{{$cy->id}}</td>
        <td>{{$cy->name}}</td>
        <td>{{$cy->spell}}</td>
        <td>{{$cy->spellshort}}</td>
        <td>{{$cy->content}}</td>
        <td>{{$cy->derivation}}</td>
    </tr>
    @endforeach
    </tbody>
</table>


@endsection