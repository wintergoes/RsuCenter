<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObuDeviceLogTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_log', function (Blueprint $table) {
            $table->string('log_radom', 255)->default(null)->primary();
            $table->string("device_ID", 255)->default(null);
            $table->string("hardversion", 255)->default(null);
            $table->string("softversion", 255)->default(null);
            $table->integer("Is_online")->default(null);
            $table->dateTime("log_datetime")->nullable()->defult(null);
            $table->dateTime("con_datetime")->nullable()->default(null);
            
            $table->index(["device_ID"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_log');
    }
}
