@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个用户吗？') == false){
            return;
        }
        
        window.location.href= 'deleteuser?userid=' + gtid;
    }
</script>

<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-list"></span>　用户列表
        </div>

    </div>
    
    <div class="tpl-block">
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default am-btn-success" onclick="location.href='/adduser'"><span class="am-icon-plus"></span> 新增</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                @if (count($users) > 0)
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                        <tr>
                            <th class="table-id">ID</th>
                            <th class="table-title">用户名</th>
                            <th class="table-date am-hide-sm-only">创建日期</th>
                            <th class="table-set">操作</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td class="am-hide-sm-only">{{$user->created_at}}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="confirmDelete({{$user->id}});"><span class="am-icon-trash-o"></span> 删除</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                @else
                <div class="note note-info" style="margin-top: 10px;">
                    <p><span class="label label-danger">提示:</span> 暂时还没有任何用户哦。
                    </p>
                </div>                
                @endif
                
            </div>
        </div>
    </div>

</div>

@endsection