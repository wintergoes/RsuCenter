<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRsiSendRecordsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsisendrecords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("sendtype")->default(0);
            $table->integer("relatedid")->default(0);
            $table->string("log_radom", 255)->default("");
            $table->string("request_no", 255)->default("");
            $table->integer("sendstatus")->default(0);
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
        Schema::dropIfExists('rsisendrecords');
    }
}
