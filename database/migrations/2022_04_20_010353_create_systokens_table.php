<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("tokentype")->default(0);
            $table->integer("relatedid")->default(0);
            $table->string("tokenvalue", 32)->default("");
            $table->timestamp("expireddate");
            $table->timestamps();
            
            $table->index(["tokentype", "relatedid"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systokens');
    }
}
