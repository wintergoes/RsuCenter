<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarninginfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warninginfo', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger("witype")->default(0);
            $table->string("winame", 500)->default("");
            $table->string("teccode", 4)->default("");
            $table->tinyInteger("wistatus")->defult(0);
            $table->tinyInteger("wisource")->default(0); //预警信息来源，1-人工，10-气象接口，20-交通接口
            $table->integer("wicreator")->default(0); //预警信息添加者
            $table->double("startlat")->default(0);
            $table->double("startlng")->default(0);
            $table->double("stoplat")->default(0);
            $table->double("stoplng")->default(0);
            $table->integer("wiradius")->default(0);
            $table->timestamp("starttime")->nullable();
            $table->timestamp("endtime")->nullable();
            $table->timestamps();
            
            $table->index(["witype", "wisource", "wistatus", "created_at"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warninginfo');
    }
}
