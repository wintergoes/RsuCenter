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
            $table->string('log_radom', 255)->default("")->primary();
            $table->integer("resource_id")->default(0)->primary();
            $table->dateTime("modifydatetime")->nullable();
            $table->string("returnJSON", 255)->default('')->nullable();
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
