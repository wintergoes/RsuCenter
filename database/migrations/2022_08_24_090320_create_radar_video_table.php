<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadarVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radarvideos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("radarid")->default(0);
            $table->string("filename", 100)->default("");
            $table->string("fullfilename", 100)->default("");
            $table->integer("filesize")->default(0);
            $table->float("duration")->default(0);
            $table->tinyInteger("deleted")->default(0);
            $table->timestamps();
            
            $table->index(["radarid", "deleted"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radarvideos');
    }
}
