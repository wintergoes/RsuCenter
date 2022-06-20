<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOburoutedetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oburoutedetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("routeid")->default(0);
            $table->integer("obuid")->default(0);
            $table->integer("managerid")->default(0);            
            $table->double("lat")->default(0);
            $table->double("lng")->default(0);
            $table->double("altitude")->default(0);
            $table->tinyInteger("locationtype");
            $table->timestamps();
            
            $table->index(["routeid", "obuid", "managerid", "locationtype"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oburoutedetails');
    }
}
