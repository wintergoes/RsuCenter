<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGps2directionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gps2direction', function (Blueprint $table) {
            $table->increments('id');
            $table->String("dname", 50);
            $table->double("lat");
            $table->double("lng");
            $table->integer("satnum");
            $table->float("direction");
            $table->float("distance");
            $table->float("speed");
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
        Schema::dropIfExists('gps2direction');
    }
}
