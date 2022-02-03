/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var now = new Date(); //当前日期 
var nowDayOfWeek = now.getDay(); //今天本周的第几天 
var nowDay = now.getDate(); //当前日 
var nowMonth = now.getMonth(); //当前月 
var nowYear = now.getYear(); //当前年 
nowYear += (nowYear < 2000) ? 1900 : 0; //

var lastMonthDate = new Date(); //上月日期
lastMonthDate.setDate(1);
lastMonthDate.setMonth(lastMonthDate.getMonth()-1);
var lastYear = lastMonthDate.getYear();
var lastMonth = lastMonthDate.getMonth();

//格式化日期：yyyy-MM-dd 
function formatDate(date) { 
    var myyear = date.getFullYear(); 
    var mymonth = date.getMonth()+1; 
    var myweekday = date.getDate(); 

    if(mymonth < 10){ 
        mymonth = "0" + mymonth; 
    } 
    if(myweekday < 10){ 
        myweekday = "0" + myweekday; 
    } 
    return (myyear+"-"+mymonth + "-" + myweekday); 
} 

function fillQuickDateSelector(selectid, datefromid, datetoid){
    var dateselector = $("#" + selectid);
    dateselector.innerHTML = "";
    
     var opt = $("<option></option>").text("快捷选择").val("shortcut");
     dateselector.append(opt);
     opt = $("<option></option>").text("今天").val("thisday");
     dateselector.append(opt);
     opt = $("<option></option>").text("昨天").val("yesterday");
     dateselector.append(opt);
     opt = $("<option></option>").text("本月").val("thismonth");
     dateselector.append(opt);
     opt = $("<option></option>").text("上月").val("lastmonth");
     dateselector.append(opt);
     opt = $("<option></option>").text("本季度").val("thisquarter");
     dateselector.append(opt);
     opt = $("<option></option>").text("本年").val("thisyear");
     dateselector.append(opt);     
     
     dateselector.change(function(){
         if(dateselector.val() === "thisday"){
             $("#" + datefromid).val(getThisDayDate());
             $("#" + datetoid).val(getThisDayDate());
         }else if(dateselector.val() === "yesterday"){
             $("#" + datefromid).val(getYesterdayDate());
             $("#" + datetoid).val(getYesterdayDate());
         }else if(dateselector.val() === "thismonth"){
             $("#" + datefromid).val(getMonthStartDate());
             $("#" + datetoid).val(getMonthEndDate());
         }else  if(dateselector.val() === "lastmonth"){
             $("#" + datefromid).val(getLastMonthStartDate());
             $("#" + datetoid).val(getLastMonthEndDate());
         }else  if(dateselector.val() === "thisquarter"){
             $("#" + datefromid).val(getQuarterStartDate());
             $("#" + datetoid).val(getQuarterEndDate());
         }else  if(dateselector.val() === "thisyear"){
             $("#" + datefromid).val(getYearStartDate());
             $("#" + datetoid).val(getYearEndDate());
         }
     });
}

//获得某月的天数 
function getMonthDays(myMonth){ 
    var monthStartDate = new Date(nowYear, myMonth, 1); 
    var monthEndDate = new Date(nowYear, myMonth + 1, 1); 
    var days = (monthEndDate - monthStartDate)/(1000 * 60 * 60 * 24); 
    return days; 
} 

//获得本季度的开始月份 
function getQuarterStartMonth(){ 
    var quarterStartMonth = 0; 
    if(nowMonth<3){ 
        quarterStartMonth = 0; 
    } 
    if(2<nowMonth && nowMonth<6){ 
        quarterStartMonth = 3; 
    } 
    if(5<nowMonth && nowMonth<9){ 
        quarterStartMonth = 6; 
    } 
    if(nowMonth>8){ 
        quarterStartMonth = 9; 
    } 
    return quarterStartMonth; 
} 

function getThisDayDate() { 
    var thisdayDate = new Date(nowYear, nowMonth, nowDay); 
    return formatDate(thisdayDate); 
} 

function getYesterdayDate() { 
    var today=new Date();
    var t=today.getTime()-1000*60*60*24;
    var yesterday=new Date(t);
    return formatDate(yesterday); 
}

//获得本周的开始日期 
function getWeekStartDate() { 
    var weekStartDate = new Date(nowYear, nowMonth, nowDay - nowDayOfWeek); 
    return formatDate(weekStartDate); 
} 

//获得本周的结束日期 
function getWeekEndDate() { 
    var weekEndDate = new Date(nowYear, nowMonth, nowDay + (6 - nowDayOfWeek)); 
    return formatDate(weekEndDate); 
} 

//获得本月的开始日期 
function getMonthStartDate(){ 
    var monthStartDate = new Date(nowYear, nowMonth, 1); 
    return formatDate(monthStartDate); 
} 

//获得本月的结束日期 
function getMonthEndDate(){ 
    var monthEndDate = new Date(nowYear, nowMonth, getMonthDays(nowMonth)); 
    return formatDate(monthEndDate); 
}

//获得上月开始时间
function getLastMonthStartDate(){
    var lastMYear = nowYear;
    var lastMMonth = lastMonth;
    
    if(nowMonth === 0){
        lastMYear = nowYear - 1;
        lastMMonth = 11;
    }
    
    var lastMonthStartDate = new Date(lastMYear, lastMMonth, 1);
    return formatDate(lastMonthStartDate); 
}

//获得上月结束时间
function getLastMonthEndDate(){
    var lastMYear = nowYear;
    var lastMMonth = lastMonth;
    
    if(nowMonth === 0){
        lastMYear = nowYear - 1;
        lastMMonth = 11;
    }    
    
    var lastMonthEndDate = new Date(lastMYear, lastMMonth, getMonthDays(lastMMonth));
    return formatDate(lastMonthEndDate); 
}

//获得本季度的开始日期 
function getQuarterStartDate(){ 
    var quarterStartDate = new Date(nowYear, getQuarterStartMonth(), 1); 
    return formatDate(quarterStartDate); 
} 

//或的本季度的结束日期 
function getQuarterEndDate(){ 
    var quarterEndMonth = getQuarterStartMonth() + 2; 
    var quarterStartDate = new Date(nowYear, quarterEndMonth, getMonthDays(quarterEndMonth)); 
    return formatDate(quarterStartDate); 
}

//获得本季度的开始日期 
function getYearStartDate(){ 
    var yearStartDate = new Date(nowYear, 0, 1); 
    return formatDate(yearStartDate); 
} 

//或的本季度的结束日期 
function getYearEndDate(){ 
    var yearEndDate = new Date(nowYear, 11, 31); 
    return formatDate(yearEndDate); 
}