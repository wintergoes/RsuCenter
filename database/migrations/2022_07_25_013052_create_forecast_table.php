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
            $table->float("temperature")->default(0)->nullable();
            $table->float("temphigh")->default(0)->nullable();
            $table->float("templow")->default(0)->nullable();
            $table->integer("humidity")->default(0)->nullable();
            $table->integer("windpower")->default(0)->nullable();
            $table->string("winddirection")->default("")->nullable();
            $table->string("windspeed")->default("")->nullable();
            $table->integer("visibility")->default(0)->nullable();
            $table->integer("pressure")->default(0)->nullable();
            $table->integer("air")->default(0)->nullable();
            $table->integer("air_pm25")->default(0)->nullable();
            $table->string("air_level")->default("")->nullable();
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
