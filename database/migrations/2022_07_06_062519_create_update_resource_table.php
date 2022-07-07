<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_resource', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("resource_id")->default(null);
            $table->integer("devicetype")->default(0);
            $table->string("resource_hardversion", 255)->default(null);
            $table->string("resource_softversion", 255)->default(null);
            $table->string("resource_content", 255)->default(null);
            $table->integer("Is_use")->default(null);
            $table->string("resource_name", 255)->default(null);
            $table->dateTime("modifydate")->nullable()->defulat(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_resource');
    }
}
