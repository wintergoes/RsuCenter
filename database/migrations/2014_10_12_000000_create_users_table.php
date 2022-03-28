<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 20);
            $table->string('password');
            $table->integer('usergroup')->default(0);
            $table->string('realname', 20)->default("");
            $table->string('mobile', 15)->default("");
            $table->rememberToken();
            $table->timestamps();
        });
        
        $insertstr = 'insert into users (username, ';
        $insertstr .= 'uemail,  password, created_at) values (?, ?, ?, NOW() )';
        
        DB::insert($insertstr, ['admin', '',  bcrypt('admin')]);          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
