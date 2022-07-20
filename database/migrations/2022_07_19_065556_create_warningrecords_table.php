<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarningrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warningrecords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("obuid")->default(0);
            $table->integer("eventid")->default(0)->nullable();
            $table->tinyInteger("eventtype")->default(0)->nullable();
            $table->tinyInteger("eventsource")->default(0)->nullable();
            $table->timestamp('eventstarttime')->nullable();
            $table->double("eventlat")->default(0)->nullable();
            $table->double("eventlng")->default(0)->nullable();
            $table->double("obulat")->default(0)->nullable();
            $table->double("obulng")->default(0)->nullable();
            $table->double("obualt")->default(0)->nullable();
            $table->timestamp('created_at')->nullable();
            
            $table->index(["obuid", "eventtype", "eventsource"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warningrecords');
    }
}
