<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbldatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldates', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ddate')->unique();
        });
        
        for($i=0; $i < 10000; $i++){
            $newdate = date("Y-m-d", strtotime("2022-01-01 +".$i." day"));
            $sql = "insert into tbldates(ddate) values('" . $newdate . "')";
            DB::insert($sql);
        }        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbldates');
    }
}
