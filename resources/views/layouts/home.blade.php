<!DOCTYPE html>
<html class="color-header headercolor1">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
        <script src="assets/js/jquery.min.js"></script>
	<title>RSU管理后台</title>
</head>

<body>
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

$l2_radar_anpr = in_array($currentpath, array("anprevents"));
$l2_radar_aidevents = in_array($currentpath, array("aidevents"));
$ll_data = $l2_radar_anpr | $l2_radar_aidevents;

$l2_oburoute = in_array($currentpath, array("oburoute"));
$l2_eventstat = in_array($currentpath, array("eventstat"));
$l2_clockins = in_array($currentpath, array("clockins"));
$l2_vehflowstat = in_array($currentpath, array("vehflowstat"));
$l2_warningrecordstat = in_array($currentpath, array("warningrecordstat"));
$l1_stat = $l2_eventstat | $l2_clockins | $l2_oburoute | $l2_vehflowstat | $l2_warningrecordstat;

$l2_trafficsign = in_array($currentpath, array("trafficsigns", "addtrafficsign", "edittrafficsign"));
$l2_warninginfo = in_array($currentpath, array("warninginfo", "addwarninginfo", "editwarninginfo"));
$l2_road = in_array($currentpath, array("roads", "addroad", "addroadsave", "editroad", "editroadsave"));
$l1_road = $l2_warninginfo | $l2_road | $l2_trafficsign;

$l2_obuvideos = in_array($currentpath, array("obuvideos"));
$l2_radarvideos = in_array($currentpath, array("radarvideos"));
$l1_videos = $l2_obuvideos | $l2_radarvideos;

$l2_devicelogs = in_array($currentpath, array("devicelogs", "devicelogfilecontent"));
$l2_bsmlogs = in_array($currentpath, array('bsmlogs', 'bsmlogfilecontent'));
$l1_logmanager = $l2_devicelogs || $l2_bsmlogs;

$l2_users = in_array($currentpath, array("users", "adduser", "edituser", "resetpassword"));
$l2_devices = in_array($currentpath, array("devices", "editdevice", "rsusettings"));
$l2_obudevices = in_array($currentpath, array("obudevices"));
$l2_radardevices = in_array($currentpath, array("obudevices", "addradardevice", "editradardevice"));
$l2_usergroups = in_array($currentpath, array("usergroups", "addusergroup", "editusergroup"));;
$l2_hwupdate = in_array($currentpath, array('hardware', 'hwupdateres', 'addhwupdateres'));
$l1_settings = $l2_users | $l2_devices | $l2_obudevices | $l2_radardevices | $l2_usergroups | $l2_hwupdate;


?>

	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">

			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="/home">
						<div class="parent-icon"><i  class='bx bx-home'></i>
						</div>
						<div class="menu-title">管理首页</div>
					</a>
				</li>
                                
				<li {!! $ll_data ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">
                                                    <i class='bx bx-data'></i>
						</div>
						<div class="menu-title">数据查询</div>
					</a>
					<ul>
                                            <li {!! $l2_radar_anpr ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="anprevents"><i class="bx bx-right-arrow-alt" ></i>车辆识别查询</a></li>
                                            <li {!! $l2_radar_aidevents ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="aidevents"><i class="bx bx-right-arrow-alt" ></i>雷视事件检测</a></li>
					</ul>
				</li>                                
                                
				<li {!! $l1_stat ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">
                                                    <i class='bx bx-stats'></i>
						</div>
						<div class="menu-title">统计分析</div>
					</a>
					<ul>
                                            <li {!! $l2_eventstat ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="eventstat"><i class="bx bx-right-arrow-alt" ></i>道路事件统计</a></li>                                            
                                            <li {!! $l2_warningrecordstat ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="warningrecordstat"><i class="bx bx-right-arrow-alt" ></i>预警记录统计</a></li>
                                            <li {!! $l2_oburoute ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="oburoute"><i class="bx bx-right-arrow-alt" ></i>车辆运行轨迹</a></li>
                                            <li {!! $l2_vehflowstat ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="vehflowstat"><i class="bx bx-right-arrow-alt" ></i>车流量统计</a></li>
                                            <li {!! $l2_clockins ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="clockins"><i class="bx bx-right-arrow-alt" ></i>考勤打卡记录</a></li>                                            
					</ul>
				</li>
                                
				<li {!! $l1_road ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">
                                                    <i class='bx bx-rocket'></i>
						</div>
						<div class="menu-title">道路管理</div>
					</a>
					<ul>
                                            <li {!! $l2_road ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="roads"><i class="bx bx-right-arrow-alt" ></i>路段管理</a></li>
                                            <li {!! $l2_warninginfo ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="warninginfo"><i class="bx bx-right-arrow-alt" ></i>事件管理</a></li>
                                            <li {!! $l2_trafficsign ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="trafficsigns"><i class="bx bx-right-arrow-alt" ></i>交通标志管理</a></li>
					</ul>
				</li>
                                
				<li {!! $l1_videos ? "class='mm-active'" : "" !!}>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">
                                                    <i class='bx bx-video-recording'></i>
						</div>
						<div class="menu-title">影像信息</div>
					</a>
					<ul>
                                            <li {!! $l2_obuvideos ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="obuvideos"><i class="bx bx-right-arrow-alt" ></i>OBU视频</a></li>
                                            <li {!! $l2_radarvideos ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="radarvideos"><i class="bx bx-right-arrow-alt" ></i>雷视视频</a></li>
					</ul>
				</li>
                                
				<li {!! $l1_logmanager ? "class='mm-active'" : "" !!}>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-file'></i>
						</div>
						<div class="menu-title">日志管理</div>
					</a>
					<ul>
						<li {!! $l2_devicelogs ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="devicelogs"><i class="bx bx-right-arrow-alt"></i>系统日志</a>
						</li>
						<li {!! $l2_bsmlogs ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="bsmlogs?logtype=1"><i class="bx bx-right-arrow-alt"></i>BSM日志</a>
						</li>
					</ul>
				</li>
                                
				<li {!! $l1_settings ? "class='mm-active'" : "" !!}>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">
                                                    <i class='bx bx-braille'></i>
						</div>
						<div class="menu-title">基础设置</div>
					</a>
					<ul>
                                            <li {!! $l2_usergroups ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="usergroups"><i class="bx bx-right-arrow-alt" ></i>用户组管理</a></li>
                                            <li {!! $l2_users ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="users"><i class="bx bx-right-arrow-alt" ></i>人员管理</a></li>
                                            <li {!! $l2_devices ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="devices"><i class="bx bx-right-arrow-alt"></i>RSU管理</a></li>
                                            <li {!! $l2_obudevices ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="obudevices"><i class="bx bx-right-arrow-alt"></i>OBU管理</a></li>
                                            <li {!! $l2_radardevices ? "class='mm-active secondlevel'" : "class='secondlevel'" !!}> <a href="radardevices"><i class="bx bx-right-arrow-alt"></i>雷视设备管理</a></li>
					</ul>
				</li>                                
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
                    <div class="topbar d-flex align-items-center">
                            <nav class="navbar navbar-expand">
                    <div class="sidebar-header">
                        <div>
                                <h4 class="logo-text"><img src="images/site_title_icon.png" alt="RSU管理后台"></h4>
                        </div>
                        <div class="toggle-icon ms-auto logo-text"><i class='bx bx-arrow-to-left'></i>
                        </div>
                    </div>                                    
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                                <div class="top-menu ms-auto">
                                            
                                    </div>
                                    <div class="user-box dropdown">
                                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                                                    <div class="user-info ps-3">
                                                            <p class="user-name mb-0">{{ Auth::user()->username }}</p>
                                                            <p class="designattion mb-0">
                                                                <?php
                                                                $usergroups = App\UserGroup::where('id', Auth::user()->usergroup)
                                                                        ->select("groupname")
                                                                        ->get();
                                                                
                                                                if(count($usergroups) > 0){
                                                                    echo $usergroups[0]->groupname;
                                                                } else {
                                                                    echo "普通用户";
                                                                }
                                                                ?>
                                                            </p>
                                                    </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="resetpassword"><i class='bx bx-home-circle'></i><span>修改密码</span></a></li>
                                                    <li>
                                                            <div class="dropdown-divider mb-0"></div>
                                                    </li>
                                                    <li><form method="post" action="/logout" name="formlogout"></form><a class="dropdown-item" href="javascript:document.formlogout.submit();"><i class='bx bx-log-out-circle'></i><span>退出登录</span></a></li>
                                            </ul>
                                    </div>
                            </nav>
                    </div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
                    <div class="page-content">
                    @yield('content')
                    </div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
                    <footer class="page-footer">
                            <p class="mb-0">Copyright © 2022. 中路智链 All right reserved.</p>
                    </footer>
                </div>
	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>