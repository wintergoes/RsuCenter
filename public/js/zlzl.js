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