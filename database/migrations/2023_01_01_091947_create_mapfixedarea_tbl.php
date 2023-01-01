<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapfixedareaTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapfixedareas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("relatedroadid")->default(0);
            $table->integer("areatype")->default(0);
            $table->string("areaname", 100);
            $table->string("coordinates", 10000);
            $table->double("centerlat")->default(0);
            $table->double("centerlng")->default(0);
            $table->string("daytexture", 100)->default("");
            $table->string("daytexture1", 100)->default("");
            $table->string("nighttexture", 100)->default("");
            $table->string("nighttexture1", 100)->default("");
            $table->string("areaparam1", 100)->default("");
            $table->string("areaparam2", 100)->default("");
            $table->string("areaparam3", 100)->default(""); 
            $table->integer("zoffset");
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
        Schema::dropIfExists('mapfixedareas');
    }
}
