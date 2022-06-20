<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOburouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oburoutes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("routename", "50")->default("");
            $table->integer("obuid")->default(0);
            $table->integer("managerid")->default(0);
            $table->double("startlat")->default(0);
            $table->double("startlng")->default(0);
            $table->string("startaddr", 50)->default("");
            $table->double("stoplat")->default(0);
            $table->double("stoplng")->default(0);
            $table->string("stopaddr", 50)->default("");
            $table->timestamps();
            
            $table->index(["id", "obuid", "managerid"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oburoutes');
    }
}
