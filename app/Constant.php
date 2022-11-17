<?php
define("ret_success", 1);
define("ret_error", -1);
define("ret_invalid_auth", -2);

define("ret_hw_update_added", 1001);
define("ret_hw_update_begin", 1002);
define("ret_hw_update_finish", 1003);
define("ret_hw_update_reply_blank", 1004);

define("ret_upload_error", -10);

define("upload_folder", "/var/www/rsumanager/public/uploadfiles/");
define("upload_folder_short", "uploadfiles/");

define("upd_file_obu_picture", 1);
define("upd_file_obu_video", 2);

define("token_obu_local", 1);
define("token_usertoken_on_obu", 2);

define("coord_type_wgs84", 0);
define("coord_type_gcj02", 1);
define("coord_type_bd09", 2);

define("area_type_undefined", 0);
define("area_type_tollstation", 1); //收费站
define("area_type_junction", 2);  //交叉路口，合流路口，参数1：语音播报信息，参数2：相交叉的路的id，多个id以英文逗号分隔
define("area_type_dversion_junction", 3); //分流路口
define("area_type_entry", 4); //入口，参数1：上一路段的id，多个道路以逗号分隔
define("area_type_exit", 5); //出口，参数1：下一路段的道路id

define("clockin_goto_work", 1);
define("clockin_gooff_work", 1);

define("rsi_type_rte", 1);
define("rsi_type_rts", 2);
?>