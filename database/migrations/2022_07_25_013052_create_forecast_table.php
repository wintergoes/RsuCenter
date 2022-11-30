<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForecastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecast', function (Blueprint $table) {
            $table->increments('id');
            $table->double("lat")->default(0)->nullable();
            $table->double("lng")->default(0)->nullable();            
            $table->string("weather")->default("")->nullable();
            $table->string("weathercode", 10)->default("")->nullable(); //不是每个天气api都有这个，河南复数科技有限公司接口有这个
            $table->float("temperature")->default(0)->nullable();
            $table->float("temphigh")->default(0)->nullable();
            $table->float("templow")->default(0)->nullable();
            $table->integer("humidity")->default(0)->nullable();
            $table->integer("windpower")->default(0)->nullable();
            $table->string("winddirection")->default("")->nullable();
            $table->string("windspeed")->default("")->nullable();
            $table->string("visibility", 20)->default("")->nullable();
            $table->integer("pressure")->default(0)->nullable();
            $table->integer("air")->default(0)->nullable();
            $table->integer("air_pm25")->default(0)->nullable();
            $table->string("air_level")->default("")->nullable();
            $table->string("sun_begin", 10)->default("")->nullable();
            $table->string("sun_end", 10)->default("")->nullable();
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
        Schema::dropIfExists('forecast');
    }
}
