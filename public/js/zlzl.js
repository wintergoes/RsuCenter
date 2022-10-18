function initTrafficEventClass(selecterid, pcode, selectcode, token){
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN' : token } 
    });    
    
    $.ajax({
        type: "POST",
        url: "getrafficeventclass?parentcode=" + pcode,
        dataType: "json",
        success: function (data) {
            if(data.retcode === 1){
                $("#" + selecterid).empty();
                for(var i = 0; i < data.tecs.length; i++){
                    var optstr = "<option value='" + data.tecs[i].teccode + "'";
                    if(data.tecs[i].teccode === selectcode){
                        optstr += " selected ";
                    }
                    optstr += ">" + data.tecs[i].tecname + "</option>";
                    $("#" + selecterid).append(optstr);
                }
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            
        }
    });    
}

function getQueryVariable(variable){
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] === variable){return pair[1];}
       }
       return(false);
}

function formatPagelinks(){
    var objs = document.getElementById("pagelinks").getElementsByTagName("a");
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
}

function HashMap(){
    //定义长度
    var length=0;
    //创建一个对象
    var obj=new Object();

    //判断Map是否为空
    this.isEmpty=function(){
            return length==0;
    }

    //判断对象中是否包含给定Key
    this.containsKey=function(key){
            return (key in obj);
    }

    //判断对象中是否包含给定的Value
    this.containsValue=function(value){
            for(var key in obj){
                    if(obj[key]==value){
                            return true; 
                    }
            }
            return false;
    }

    //向map中添加数据
    this.put=function(key,value){
            if(!this.containsKey(key)){
                    length++;
            }
            obj[key]=value;
    }

    //根据给定的key获取Value
    this.get=function(key){
            return this.containsKey(key)?obj[key]:null;
    }

    //根据给定的Key删除一个值
    this.remove=function(key){
            if(this.containsKey(key)&&(delete obj[key])){
                    length--;
            }
    }

    //获得Map中所有的value
    this.values=function(){
            var _values=new Array();
            for(var key in obj){
                _values.push(obj[key]);
            }
            return _values;
    }

    //获得Map中的所有key
    this.keySet=function(){
            var _keys=new Array();
            for(var key in obj){
                    _keys.push(key);
            }
            return _keys;
    }

    //获得Map的长度
    this.size=function(){
            return length;
    }

    //清空Map
    this.clear=function(){
            length=0;
            obj=new Object();
    }
}

