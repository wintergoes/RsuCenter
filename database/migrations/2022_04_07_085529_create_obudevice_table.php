<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObudeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obudevices', function (Blueprint $table) {
            $table->increments('id');
            $table->string("obuid", 20)->default("");
            $table->string("obulocalid", 32)->nullable();
            $table->integer("obustatus")->default(1);
            $table->double("obulatitude")->default(0);
            $table->double("obulongtitude")->default(0);
            $table->float("obudirection")->default(0);
            $table->string("obuhardware", 50)->default("");
            $table->string("plateno", 50)->default("");
            $table->timestamp("positiontime");
            $table->string("oburemark", 200)->default("");
            $table->timestamps();
            
            $table->index(["obuid", "obustatus"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obudevices');
    }
}
