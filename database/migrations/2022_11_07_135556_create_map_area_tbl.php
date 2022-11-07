<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapAreaTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapareas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("roadid");
            $table->integer("areatype")->default(0);
            $table->String("areaname", 100)->default("");
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
            $table->double("angle1");
            $table->double("lng");
            $table->double("lat");            
            $table->double("altitude");            
            $table->double("distance");            
            $table->timestamps();
            
            $table->index(["roadid", "areatype"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('=mapareas');
    }
}
