<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataapiclientsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataapiclients', function (Blueprint $table) {
            $table->increments('id');
            $table->string("clientname", 100)->default("");
            $table->string("clientkey", 50)->default("");
            $table->string("clientremark", 200)->default("");
            $table->tinyInteger("clientisvalid")->default(1);
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
        Schema::dropIfExists('dataapiclients');
    }
}
