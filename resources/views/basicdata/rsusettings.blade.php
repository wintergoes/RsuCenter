@extends('layouts.home')

@section('content')
<script src="js/mqttws31.min.js"  type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>

<script>
function submitData(){
    if($('#username').val() === ''){
        alert('登录用户名不能为空！');
        $('#username').focus();
        return;
    }

    $('#form1').submit();
}

</script>

<h5 class="card-title">RSU设置 [{{$rsudevice->devicecode}}]</h5>
<hr>

<div class="row">
    <div class="col col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                    <ul class="nav nav-tabs nav-primary mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                                    </div>
                                                    <div class="tab-title">基本设置</div>
                                            </div>
                                    </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                                    </div>
                                                    <div class="tab-title">信号灯设置</div>
                                            </div>
                                    </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class="bx bx-microphone font-18 me-1"></i>
                                                    </div>
                                                    <div class="tab-title">其他设置</div>
                                            </div>
                                    </a>
                            </li>
                    </ul>
                    <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                                <div class="row">
                                    <div class="col col-lg-11 mx-auto">
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label ">区域限速值(km/h)：</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="username" name="username" placeholder="">
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="button" class="form-control" value="发送">
                                            </div>                                            
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label ">急弯路预告信息：</label>
                                            <div class="col-sm-1">
                                                <input type="button" class="form-control" value="发送">
                                            </div>                                            
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label ">服务区预告信息：</label>
                                            <div class="col-sm-1">
                                                <input type="button" class="form-control" value="发送">
                                            </div>                                            
                                        </div>

                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label ">道路湿滑信息：</label>
                                            <div class="col-sm-1">
                                                <input type="button" class="form-control" value="发送">
                                            </div>                                            
                                        </div>

                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label ">车辆事故信息：</label>
                                            <div class="col-sm-1">
                                                <input type="button" class="form-control" value="发送">
                                            </div>                                            
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label ">道路拥堵信息：</label>
                                            <div class="col-sm-1">
                                                <input type="button" class="form-control" value="发送">
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="primaryprofile" role="tabpanel">
                                <div class="row">
                                    <div class="col col-lg-11 mx-auto">
                                        <div class="row mb-3">
                                            <label for="redlighttime" class="col-sm-2 col-form-label ">红灯：</label>
                                            <div class="col-sm-1">
                                                <input type="number" class="form-control" id="redlighttime" name="redlighttime" value="33">
                                            </div>
                                            <label for="greenlighttime" class="col-sm-1 col-form-label ">绿灯：</label>
                                            <div class="col-sm-1">
                                                <input type="number" class="form-control" id="greenlighttime" name="greenlighttime" value="30">
                                            </div>
                                            <label for="yellowlighttime" class="col-sm-1 col-form-label ">黄灯：</label>
                                            <div class="col-sm-1">
                                                <input type="number" class="form-control" id="yellowlighttime" name="yellowlighttime" value="3">
                                            </div>                                            
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label ">当前时间：</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="currenttime" name="currenttime" onClick="WdatePicker({el:this,dateFmt:'HH-mm-ss'})">
                                            </div>                                           
                                        </div>
                                        
                                        <hr>                                      
                                        
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label ">相位数：</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="phasecount" name="phasecount" value="4">
                                            </div>
                                            
                                            <div class="col-sm-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                                                <label class="form-check-label" for="flexCheckChecked">使用UTC时间</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="lightcolor" class="col-sm-2 col-form-label ">红绿灯颜色：</label>
                                            <div class="col-sm-1">
                                                <select class="form-select mb-3" id="lightcolor">
                                                        <option value="1">红色</option>
                                                        <option value="2">绿色</option>
                                                        <option value="3">蓝色</option>
                                                </select>
                                            </div>
                                            <label for="starttime" class="col-sm-1 col-form-label ">开始时间：</label>
                                            <div class="col-sm-1">
                                                <input type="number" class="form-control" id="starttime" name="starttime" value="3591" />
                                            </div>                                          
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                                    
                            </div>
                    </div>
            </div>
        </div>
    <div>
</div>

        
        
        
        

<script>
    var hostname = '114.116.195.168', //'192.168.1.2',
        port = 8083,
        clientId = 'ewwl',
        timeout = 5,
        keepAlive = 100,
        cleanSession = false,
        ssl = false,
        userName = 'liujunchang',
        password = '111111',
        topic = 'rsu/manager';
    client = new Paho.MQTT.Client(hostname, port, clientId);
    //建立客户端实例
    var options = {
        invocationContext: {
            host: hostname,
            port: port,
            path: client.path,
            clientId: clientId
        },
        timeout: timeout,
        keepAliveInterval: keepAlive,
        cleanSession: cleanSession,
        useSSL: ssl,
        userName: userName,  
        password: password,  
        onSuccess: onConnect,
        onFailure: function (e) {
            console.log(e);
            s = "{time:" + new Date().Format("yyyy-MM-dd hh:mm:ss") + ", onFailure()}";
            console.log(s);
        }
    };
    client.connect(options);
    //连接服务器并注册连接成功处理事件  
    function onConnect() {
        console.log("onConnected");
        s = "{time:" + new Date().Format("yyyy-MM-dd hh:mm:ss") + ", onConnected()}";
        console.log(s);
        client.subscribe(topic);
    }

    client.onConnectionLost = onConnectionLost;

    //注册连接断开处理事件  
    client.onMessageArrived = onMessageArrived;

    //注册消息接收处理事件  
    function onConnectionLost(responseObject) {
        console.log(responseObject);
        s = "{time:" + new Date().Format("yyyy-MM-dd hh:mm:ss") + ", onConnectionLost()}";
        console.log(s);
        if (responseObject.errorCode !== 0) {
            console.log("onConnectionLost:" + responseObject.errorMessage);
            console.log("连接已断开");
        }
    }

    function onMessageArrived(message) {
        s = "{time:" + new Date().Format("yyyy-MM-dd hh:mm:ss") + ", onMessageArrived()}";
        console.log(s);
        //console.log("收到消息:" + message.payloadString);
     //var msg = JSON.parse(message.payloadString+"");
     if(message.destinationName === "rsu/manager"){
        alert("收到消息:" + message.payloadString);
//        var msgbody = eval("(" + message.payloadString + ")");
//        alert(msgbody.username);
     }else{
        alert("发送成功");
     }
     
    }

    function send() {
        var s = document.getElementById("msg").value;
        if (s) {
            //s = "{time:" + new Date().Format("yyyy-MM-dd hh:mm:ss") + ", content:" + (s) + ", from: web console}";
            message = new Paho.MQTT.Message(s);
            message.destinationName = "rsu/manager";
            client.send(message);
            document.getElementById("msg").value = "";
        }
    }

    var count = 0;

    function start() {
        window.tester = window.setInterval(function () {
            if (client.isConnected) {
                var s = "{time:" + new Date().Format("yyyy-MM-dd hh:mm:ss") + ", content:" + (count++) +
                    ", from: web console}";
                message = new Paho.MQTT.Message(s);
                message.destinationName = topic;
                client.send(message);
            }
        }, 1000);
    }

    function stop() {
        window.clearInterval(window.tester);
    }

    Date.prototype.Format = function (fmt) { //author: meizz 
        var o = {
            "M+": this.getMonth() + 1, //月份 
            "d+": this.getDate(), //日 
            "h+": this.getHours(), //小时 
            "m+": this.getMinutes(), //分 
            "s+": this.getSeconds(), //秒 
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
            "S": this.getMilliseconds() //毫秒 
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[
                k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }
</script>
@endsection