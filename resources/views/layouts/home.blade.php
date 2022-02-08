<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Rsu管理平台</title>
        <meta name="description" content="万家环保" />
        <meta name="keywords" content="index" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="renderer" content="webkit" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="image/png" href="i/favicon.png" />
        <link rel="apple-touch-icon-precomposed" href="i/app-icon72x72@2x.png" />
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        <link rel="stylesheet" href="css/amazeui.min.css" />
        <link rel="stylesheet" href="css/admin.css" />
        <link rel="stylesheet" href="css/app.css" />
    </head>
    
    <body data-type="index">
                               
<?php 

$currentpath = Request::path();
$l1_home = in_array($currentpath, array("home", ""));

$l1_users = in_array($currentpath, array("appusers", "userpoints", "userpointdetails"));
$l2_appusers = in_array($currentpath, array("appusers"));
$l2_userpoints = in_array($currentpath, array("userpoints", "userpointdetails"));

$l1_shop = in_array($currentpath, array("goodtypes", "addgoodtype", "editgoodtype", "goods", "addgood", "editgood", "goodredeemrecords"));
$l2_goodtype = in_array($currentpath, array("goodtypes", "addgoodtype", "editgoodtype"));
$l2_goods = in_array($currentpath, array("goods", "addgood", "editgood"));
$l2_goodredeemrecords = in_array($currentpath, array("goodredeemrecords"));

$l1_neirong = in_array($currentpath, array("recycleprices", "recycleprices", "recycleknowledge", "addrecycleknowledge", "editrecycleknowledge",
    "recyclesites", "addrecyclesite", "editrecyclesite", "recyclenews", "addnews", "editnews"));
$l2_recycleprice = in_array($currentpath, array("recycleprices"));
$l2_recycleknowledge = in_array($currentpath, array("recycleknowledge", "addrecycleknowledge", "editrecycleknowledge"));
$l2_recyclesite = in_array($currentpath, array("recyclesites", "addrecyclesite", "editrecyclesite"));
$l2_recyclenews = in_array($currentpath, array("recyclenews", "addnews", "editnews"));

$l1_appts = in_array($currentpath, array("recycleappts", "recycleapptstatus"));
$l2_appts = in_array($currentpath, array("recycleappts", "recycleapptstatus"));


$l2_users = in_array($currentpath, array("users", "adduser", "edituser"));
$l2_devicelogs = in_array($currentpath, array("devicelogs"));
$l2_bsmlogs = in_array($currentpath, array('bsmlogs'));
$l1_settings = $l2_users || $l2_devicelogs || $l2_bsmlogs;
?>            
        
        <header class="am-topbar am-topbar-inverse admin-header">
            <div class="am-topbar-brand">
                <a href="javascript:;" class="tpl-logo">
                    <img src="images/rsu_logo.png" alt="" /></a>
            </div>
            <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right"></div>
            <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
                <span class="am-sr-only">导航切换</span>
                <span class="am-icon-bars"></span>
            </button>
            <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
                <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">

                    <li class="am-dropdown" data-am-dropdown="" data-am-dropdown-toggle="">
                        <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                            <span class="tpl-header-list-user-nick">{{Auth::user()->username}}</span>
                            <span class="tpl-header-list-user-ico">
                                <img src="images/user_head_img.png" /></span>
                        </a>
                        <ul class="am-dropdown-content">
                            <li>
                                <a href="#">
                                    <span class="am-icon-bell-o"></span> 资料</a>
                            </li>
                            <li>
                                <a href="resetpassword">
                                    <span class="am-icon-key"></span> 修改密码</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="am-icon-power-off"></span> 退出</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <div class="tpl-page-container tpl-page-header-fixed">
            <div class="tpl-left-nav tpl-left-nav-hover">
                <div class="tpl-left-nav-title">功能列表</div>
                <div class="tpl-left-nav-list">
                    <ul class="tpl-left-nav-menu">
                        <li class="tpl-left-nav-item">
                            <a href="/" class="nav-link {!! $l1_home ? "active" : "" !!}">
                                <i class="am-icon-home"></i>
                            
                                <span>首页</span></a>
                        </li>
                        
                       <li class="tpl-left-nav-item">
                            <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                                <i class="am-icon-cogs"></i>
                                <span>基础设置</span>
                                <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                            </a>
                            <ul class="tpl-left-nav-sub-menu" {!! $l1_settings ? "style='display:block;'" : "" !!}>
                                <li>
                                    <a href="users"{!! $l2_users ? "class='active'" : "" !!}>
                                        <i class="am-icon-angle-right" ></i>
                                        <span>人员管理</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="devicelogs"{!! $l2_devicelogs ? "class='active'" : "" !!}>
                                        <i class="am-icon-angle-right" ></i>
                                        <span>日志查看</span>
                                    </a>
                                </li>   
                            </ul>
                        </li>                          
                        
                        
                        <li class="tpl-left-nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link tpl-left-nav-link-list" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>         
                                <i class="am-icon-sign-out"></i>
                                <span>退出登录</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tpl-content-wrapper">
                @yield('content')
            </div>
        </div>

        
        <script src="js/jquery.min.js"></script>
        <script src="js/amazeui.min.js"></script>
        <script src="js/iscroll.js"></script>
        <script src="js/app.js"></script> 
    </body>

</html>
