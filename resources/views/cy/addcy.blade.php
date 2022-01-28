@extends('layouts.home')

@section('content')

@if(isset($cy))
<h1>成语修改</h1>
@else
<h1>新增成语</h1>
@endif


<script language="javascript">
function submitdata(){
    if($('#cyname').val().length === 0){
        alert('广告名称不能为空!');
        return;
    }
    
    $('#form1').submit();
}
</script>
    
    <!-- New Task Form -->
    @if(isset($cy))
    <form action="{{ url('/editcysave') }}" id="form1" method="POST" class="form-horizontal">
    @else
    <form action="{{ url('/addcysave') }}" id="form1" method="POST" class="form-horizontal">
    @endif
        {{ csrf_field() }}               
        
        @if(isset($cy))
        <input type="hidden" name="cyid" value="{{$cy->id}}">
        @endif
        
        <input type="hidden" name="fromurl" value="{{$fromurl}}">
        
        <div class="form-group">
            <label for="cyname" class="col-sm-3 control-label">成语名称</label>
            <div class="col-sm-6">
                @if(isset($cy))
                <input type="text" name="cyname" id="cyname"  value="{{$cy->name}}" class="form-control">
                @else
                <input type="text" name="cyname" id="cyname" class="form-control">
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label for="cyspell" class="col-sm-3 control-label">汉语拼音</label>
            <div class="col-sm-6">
                @if(isset($cy))
                <input type="text" name="cyspell" id="cyspell"  value="{{$cy->spell}}" class="form-control">
                @else
                <input type="text" name="cyspell" id="cyspell" class="form-control">
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="cyspellshort" class="col-sm-3 control-label">首字母</label>
            <div class="col-sm-6">
                @if(isset($cy))
                <input type="text" name="cyspellshort" id="cyspellshort"  value="{{$cy->spellshort}}" class="form-control">
                @else
                <input type="text" name="cyspellshort" id="cyspellshort" class="form-control">
                @endif
            </div>
        </div>        
        
        <div class="form-group">
            <label for="cycontent" class="col-sm-3 control-label">成语解释</label>
            <div class="col-sm-6">
                @if(isset($cy))
                <textarea name="cycontent" rows="5" id="cycontent" class="form-control">{{$cy->content}}</textarea>
                @else
                <textarea name="cycontent" rows="5" id="cycontent" class="form-control"></textarea>
                @endif
            </div>
        </div>      
        
        <div class="form-group">
            <label for="cyderivation" class="col-sm-3 control-label">成语出处</label>
            <div class="col-sm-6">
                @if(isset($cy))
                <textarea name="cyderivation" rows="5" id="cyderivation" class="form-control">{{$cy->derivation}}</textarea>
                @else
                <textarea name="cyderivation" rows="5" id="cyderivation" class="form-control"></textarea>
                @endif
            </div>
        </div>        
        
        <div class="form-group">
            <label for="cydeleted" class="col-sm-3 control-label">删除</label>
            <div class="col-sm-6">
                @if(isset($cy))
                <input type="checkbox" name="cydeleted" id="cydeleted" {{$cy->deleted == "1" ? "checked" : ""}}>
                @else
                <input type="checkbox" name="cydeleted" id="cydeleted">
                @endif
            </div>
        </div>          
        
        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="button" class="btn btn-default" onclick="submitdata();">
                    <i class="fa fa-save"></i> 保存</button>
                    
                <button type="button" class="btn btn-default" onclick="history.back(-1);">
                    <i class="fa fa-reply"></i> 取消</button>
            </div>
        </div>
    </form>

@endsection