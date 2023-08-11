<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoadControlRules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadcontrolrule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("rcfactor")->default(0);
            $table->integer("rcvehtype")->default(0);
            $table->float("rcstartvalue")->default(0);
            $table->float("rcendvalue")->default(0);
            $table->integer("rcsuggestspeed")->default(0);
            $table->timestamps();
            
            $table->index(['rcfactor']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roadcontrolrule');
    }
}
