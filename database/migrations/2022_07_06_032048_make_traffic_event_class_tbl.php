<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeTrafficEventClassTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trafficeventclasses', function (Blueprint $table) {
            $table->increments('id');
            $table->string("teccode", 4)->default("");
            $table->string("tecparentcode", 4)->default("");
            $table->string("tecname", 50)->default("");
            
            $table->index(["teccode"]);
        });

        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('01', '', '交通事故')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('02', '', '交通灾害')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('03', '', '交通气象')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('04', '', '路面状况')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('05', '', '道路施工')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('06', '', '活动')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('07', '', '重大事件')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('09', '', '其他')");

        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0100', '01', '无')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0101', '01', '车辆故障')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0102', '01', '人车事故')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0103', '01', '车车事故')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0104', '01', '设施相关')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0199', '01', '其他')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0200', '02', '无')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0201', '02', '车辆火灾')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0202', '02', '路面火灾')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0203', '02', '路边火灾')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0204', '02', '隧道火灾')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0205', '02', '道路设施火灾')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0206', '02', '地质灾害')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0207', '02', '水灾')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0299', '02', '其他')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0300', '03', '无')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0301', '03', '暴雨')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0302', '03', '冰雹')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0303', '03', '雷电')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0304', '03', '大风')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0305', '03', '大雾')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0306', '03', '高温')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0307', '03', '干旱')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0308', '03', '暴雪')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0309', '03', '霜冻')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0310', '03', '霾')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0399', '03', '其他')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0400', '04', '无')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0401', '04', '散乱物体')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0402', '04', '液体')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0403', '04', '机油泄露')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0404', '04', '道路障碍')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0405', '04', '人')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0406', '04', '动物')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0407', '04', '积水')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0408', '04', '湿滑')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0409', '04', '道路结冰')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0499', '04', '其他')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0500', '05', '无')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0501', '05', '占道施工')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0502', '05', '断路施工')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0599', '05', '其他')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0600', '06', '无')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0601', '06', '文体商业活动')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0602', '06', '外交政务活动')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0699', '06', '其他')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0700', '07', '无')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0701', '07', '燃气事故')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0702', '07', '化学污染')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0703', '07', '核事故')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0704', '07', '爆炸')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0705', '07', '电力事故')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0706', '07', '公共暴力')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0707', '07', '交通集中阻塞')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0799', '07', '其他')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0900', '09', '无')");
        DB::insert("insert into trafficeventclasses(teccode, tecparentcode, tecname) values('0999', '09', '其他')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trafficeventclasses');
    }
}
