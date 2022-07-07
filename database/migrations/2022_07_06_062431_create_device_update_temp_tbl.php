<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceUpdateTempTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_update_temp', function (Blueprint $table) {
            $table->string('log_radom', 255)->default("");
            $table->integer("resource_id")->default(0);
            $table->dateTime("modifydatetime")->nullable();
            $table->string("returnJSON", 255)->default(null)->nullable();
            
            $table->primary(["log_radom", "resource_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_update_temp');
    }
}
