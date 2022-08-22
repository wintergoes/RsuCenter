@extends('layouts.home')

@section('content')

<script>
    function confirmDelete(gtid){
        if(confirm('确定删除这个设备吗？') == false){
            return;
        }
        
        window.location.href= 'deletedevice?deviceid=' + gtid;
    }
</script>

<h5 class="card-title">用户列表</h5>
<hr>

<div  class="dataTables_wrapper dt-bootstrap5">
    <div class="row">
        @if (count($devices) > 0)        
        <div class="col-sm-auto">           
            <table class="table mb-0 table-hover table-bordered" >
                <thead>
                    <tr role="row">
                        <th >ID</th>
                        <th >设备编号</th>
                        <th >状态</th>
                        <th >坐标</th>
                        <th >通讯时间</th>
                        <th >创建日期</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($devices as $device)
                    <?php
                    $errstr = "";
                    if($device->cfg_f_dev_ID == 1){
                        $errstr .= "，设备编号配置文件丢失"  ;
                    } else if($device->cfg_f_dev_SF == 1){
                        $errstr .= "，设备版本号配置文件丢失"  ;
                    }else if($device->cfg_f_dev_HD == 1){
                        $errstr .= "，设备硬件版本号配置文件丢失"  ;
                    }else if($device->cfg_f_radar_IP == 1){
                        $errstr .= "，雷视机IP地址配置文件丢失"  ;
                    }else if($device->cfg_f_dev_POS == 1){
                        $errstr .= "，设备坐标位置配置文件丢失"  ;
                    }else if($device->cfg_f_monitor_IP == 1){
                        $errstr .= "，设备上报监控信息主机IP配置文件丢失"  ;
                    }else if($device->cfg_f_dev_IP == 1){
                        $errstr .= "，设备IP配置文件丢失"  ;
                    }else if($device->cfg_f_AID == 1){
                        $errstr .= "，设备启动AID配置文件丢失"  ;
                    }else if($device->cfg_f_resv_AID == 1){
                        $errstr .= "，设备启动AID接收配置文件丢失"  ;
                    }else if($device->cfg_f_RSI_HZ == 1){
                        $errstr .= "，设备发射RSI频率配置文件丢失"  ;
                    }else if($device->cfg_f_RSM_HZ == 1){
                        $errstr .= "，设备发射RSM频率配置文件丢失"  ;
                    }else if($device->cfg_f_RTE_HZ == 1){
                        $errstr .= "，设备发射RTE频率配置文件丢失"  ;
                    }else if($device->cfg_f_RTS_HZ == 1){
                        $errstr .= "，设备发射RTS频率配置文件丢失"  ;
                    }else if($device->cfg_f_SPAT_HZ == 1){
                        $errstr .= "，设备发射SPAT频率配置文件丢失"  ;
                    }else if($device->cfg_f_MAP_HZ == 1){
                        $errstr .= "，设备发射MAP频率配置文件丢失"  ;
                    }else if($device->cfg_f_update_START == 1){
                        $errstr .= "，设备升级后动作配置文件丢失"  ;
                    }else if($device->cfg_f_OTA_1 == 1){
                        $errstr .= "，设备OTA升级文件1丢失"  ;
                    }else if($device->cfg_f_OTA_2 == 1){
                        $errstr .= "，设备OTA升级文件2丢失"  ;
                    }else if($device->cfg_f_OTA_3 == 1){
                        $errstr .= "，设备OTA升级文件3丢失"  ;
                    }else if($device->cfg_f_OTA_4 == 1){
                        $errstr .= "，设备OTA升级文件4丢失"  ;
                    }else if($device->cfg_f_OTA_5 == 1){
                        $errstr .= "，设备OTA升级文件5丢失"  ;
                    }else if($device->cfg_f_OTA_6 == 1){
                        $errstr .= "，设备OTA升级文件6丢失"  ;
                    }else if($device->cfg_f_OTA_7 == 1){
                        $errstr .= "，设备OTA升级文件7丢失"  ;
                    }else if($device->cfg_f_OTA_VERIFY == 1){
                        $errstr .= "，设备OTA验证文件丢失"  ;
                    }else if($device->cfg_m_MF == 1){
                        $errstr .= "，设备主模块下线"  ;
                    }else if($device->cfg_m_REPROT == 1){
                        $errstr .= "，设备汇报模块下线"  ;
                    }else if($device->cfg_m_RRADAR == 1){
                        $errstr .= "，雷达数据获取模块下线"  ;
                    }else if($device->cfg_m_FRADAR == 1){
                        $errstr .= "，RSM雷达数据发射模块下线"  ;
                    }else if($device->cfg_m_OTA == 1){
                        $errstr .= "，OTA升级模块下线"  ;
                    }else if($device->cfg_m_RELAYRSM == 1){
                        $errstr .= "，cfg_m_RELAYRSM"  ;
                    }else if($device->cfg_m_RELAYRSI == 1){
                        $errstr .= "，cfg_m_RELAYRSI"  ;
                    }else if($device->cfg_c_GPS == 1){
                        $errstr .= "，GPS无法连接"  ;
                    }else if($device->cfg_c_ONLINE == 1){
                        $errstr .= "，设备无法上网"  ;
                    }else if($device->cfg_c_RADAR == 1){
                        $errstr .= "，设备无法连接雷视设备"  ;
                    }else if($device->cfg_c_MEC == 1){
                        $errstr .= "，设备无法连接MEC"  ;
                    }
                    
                    //echo $errstr;
                    if($errstr == "，"){
                        $errstr = "";
                    } else {
                        if($errstr != ""){
                            $errstr = substr($errstr, 3);
                        }
                    }
                    ?>
                    <tr>
                        <td>{{$device->id}}</td>
                        <td>{{$device->devicecode}}</td>
                        @if ($errstr != "")
                        <td><a href="javascript:alert('{{$errstr}}');" >{{$device->score == "" ? "-" : $device->score}}</a></td>
                        @else
                        <td>{{$device->score == "" ? "-" : $device->score}}</td>
                        @endif
                        <td>{{$device->rsulat}}, {{$device->rsulng}}</td>
                        <td>{{$device->con_datetime}}</td>
                        <td>{{$device->created_at}}</td>
                        <td>
                             <div class="dropdown">
                                <button class="btn btn-light border-dark border-0 dropdown-toggle px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">操作</button>
                                <ul class="dropdown-menu" style="margin: 0px;">
                                    <li><a class="dropdown-item" href="rsusettings?id={{$device->id}}">远程设置</a></li>
                                    <li><a class="dropdown-item" href="devicelogs?devicecode={{$device->id}}">系统日志</a></li>
                                    <li><a class="dropdown-item" href="bsmlogs?devicecode={{$device->id}}">BSM日志</a></li>
                                    <li><a class="dropdown-item" href="editdevice?id={{$device->id}}">编辑</a></li>
                                    <li><a class="dropdown-item" href="javascript:confirmDelete({{$device->id}});">删除</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach                            
                </tbody>
            </table>
        </div>
        @else
        <div class="col-sm-12">
        <div class="p-4 border border-1 border-warning text-center rounded bg-light">
                <div class="text-info">设备列表为空！</div>
        </div>
        </div>
        @endif         
    </div>
</div>
 
@endsection