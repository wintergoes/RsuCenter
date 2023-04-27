<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClockinFullTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clockinfull', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("userid");
            $table->tinyInteger("cisource")->default(0)->nullable();
            $table->integer("relatedid")->default(0)->nullable();
            $table->timestamp("cistarttime")->nullable();
            $table->double("cistartlat")->default(0);
            $table->double("cistartlng")->default(0);
            $table->double("cistartalt")->default(0);
            $table->timestamp("ciendtime")->nullable();
            $table->double("ciendlat")->default(0);
            $table->double("ciendlng")->default(0);
            $table->double("ciendalt")->default(0);            
            $table->timestamps();
            
            $table->index(["userid", "cisource"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clockinfull');
    }
}
