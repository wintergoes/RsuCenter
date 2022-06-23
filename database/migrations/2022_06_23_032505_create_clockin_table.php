<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClockinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clockins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("userid");
            $table->tinyInteger("citype")->default(0)->nullable();
            $table->tinyInteger("cisource")->default(0)->nullable();
            $table->integer("relatedid")->default(0)->nullable();
            $table->double("cilat")->default(0);
            $table->double("cilng")->default(0);
            $table->double("cialt")->default(0);
            $table->timestamps();
            
            $table->index(["userid", "citype", "cisource"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clockins');
    }
}
