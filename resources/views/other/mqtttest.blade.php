@extends('layouts.home')

@section('content')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js"  type="text/javascript"></script>-->
<script src="js/mqttws31.min.js"  type="text/javascript"></script>
<input type="text" id="msg" />
<input type="button" onclick="send();" value="send"/>

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