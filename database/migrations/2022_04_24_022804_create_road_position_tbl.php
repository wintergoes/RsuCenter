<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoadPositionTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadpositions', function (Blueprint $table) {
            $table->increments('id');
            $table->String("rpname", 50)->nullable()->default("");
            $table->integer("rptype")->nullable()->defult(0); // 0 - 普通位置，1 - 出入口位置
            $table->double("rpstartlat")->default(0)->nullable();
            $table->double("rpstartlng")->default(0)->nullable();
            $table->double("rpendlat")->default(0)->nullable();
            $table->double("rpendlng")->default(0)->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roadpositions');
    }
}
