<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoadlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadlinks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("roadid");
            $table->integer("rcid");
            $table->integer("linkroadid");
            $table->integer("linkrcid");
            $table->tinyinteger("linktype")->comment("1-下行，2-上行");
            $table->timestamps();
            
            $table->index(["roadid", "rcid"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roadlinks');
    }
}
