<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblbsmlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsmlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("deviceid")->default(0);
            $table->string("logfile", 50);
            $table->integer("lineno")->default(0);
            $table->string("logcontent", 500);            
            $table->timestamps();
            
            $table->index(["deviceid", "logfile", "lineno"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bsmlogs');
    }
}
