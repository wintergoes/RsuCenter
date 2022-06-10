<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoadcoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadcoordinates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("coordtype");
            $table->integer("roadid");
            $table->tinyInteger("laneno")->default(0);
            $table->tinyInteger("lanetype")->default(0);
            $table->double("lat1");
            $table->double("lng1");
            $table->double("lat2");
            $table->double("lng2");
            $table->double("lat3");
            $table->double("lng3");
            $table->double("lat4");
            $table->double("lng4");
            $table->double("maxlat");
            $table->double("minlat");
            $table->double("maxlng");
            $table->double("minlng");
            $table->double("angle");
            $table->timestamps();
            
            $table-index(["roadid", "laneno", "lanetype"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roadcoordinates');
    }
}
