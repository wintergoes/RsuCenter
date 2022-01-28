<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serverid')->default(0);
            $table->string('name', 50);
            $table->string('spell', 100)->nullable();
            $table->string('spellshort', 20)->nullable();
            $table->string('content', 1000)->nullable();
            $table->string('derivation', 1000)->nullable();
            $table->string('samples', 100)->nullable();
            $table->integer('viewtimes')->default(0);
            $table->tinyinteger('myfavor')->default(0);
            $table->tinyinteger('deleted')->default(0);
            $table->tinyinteger('updated')->default(0);
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
        Schema::dropIfExists('cy');
    }
}
