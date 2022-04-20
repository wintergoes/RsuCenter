<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploadfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("obuid")->default(0);
            $table->integer("uploader")->default(0);
            $table->integer("filetype")->default(0);
            $table->string("filename", 100)->default("");
            $table->integer("filesize")->default(0)->nullable();
            $table->string("filemd5", 32)->default("")->nullable();
            $table->string("fileremark", 100)->default("")->nullable();
            $table->timestamps();
            
            $table->index(["obuid", "uploader", "filetype"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploadfiles');
    }
}
