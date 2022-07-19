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