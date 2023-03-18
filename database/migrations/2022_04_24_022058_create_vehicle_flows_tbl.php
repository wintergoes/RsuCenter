<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleFlowsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicleflow', function (Blueprint $table) {
            $table->increments('id');
            $table->string("vehnumber", 20);  // 车牌号
            $table->integer("vehposition")->default(0); // 检测的位置，对应roadpositions中的id
            $table->integer("vehspeed")->default(0)->nullable();
            $table->string("vehtype")->default(0)->nullable();
            $table->string("vehbrand")->default("")->nullable();
            $table->integer("obuid")->default(0)->nullable();
            $table->timestamps();
            
            $table->index(["obuid", "vehtype", "vehbrand"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('=vehicleflow');
    }
}
