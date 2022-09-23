<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrafficSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trafficsigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("tscid")->default(0);
            $table->string("tsname", 50)->default("");
            $table->double("tslat")->default(0);
            $table->double("tslng")->default(0);
            $table->double("tsmanager")->default(0);
            $table->string("tsparam1", 50)->default("");
            $table->string("tsparam2", 50)->default("");
            $table->timestamp("starttime")->nullable();
            $table->timestamp("endtime")->nullable();            
            $table->timestamps();
            
            $table->index(["tscid"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trafficsigns');
    }
}
