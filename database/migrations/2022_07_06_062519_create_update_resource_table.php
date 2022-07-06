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
            $table->integer("resource_id")->default(0);
            $table->integer("devicetype")->default(0);
            $table->string("resource_hardversion", 255)->default("");
            $table->string("resource_softversion", 255)->default("");
            $table->string("resource_content", 255)->default("");
            $table->integer("Is_use")->default(0);
            $table->string("resource_name", 255)->default("");
            $table->dateTime("modifydate")->nullable();
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
