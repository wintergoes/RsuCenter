<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadarDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radardevices', function (Blueprint $table) {
            $table->increments('id');
            $table->string("devicecode", 100)->default("");
            $table->string("macaddress", 50)->default("");
            $table->bigInteger("macaddrint")->default(0);
            $table->integer("lanenumber")->default(0);
            $table->string("lanewidth", 100)->default("");
            $table->integer("status")->default(1);
            $table->double("lat");
            $table->double("lng");
            $table->timestamps();
            
            $table->index(["macaddrint"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radardevices');
    }
}