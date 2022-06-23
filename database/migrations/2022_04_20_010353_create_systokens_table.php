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
        
        $insertstr = 'insert into systokens(tokentype, relatedid, tokenvalue, created_at)';
        $insertstr .= 'values(?, ?, ?, NOW())';
        DB::insert($insertstr, ['2', '1', $this->create_uuid()]);        
    }

    public static function create_uuid($prefix=""){
        $chars = md5(uniqid(mt_rand(), true));
        $uuid = substr ( $chars, 0, 8 )
            . substr ( $chars, 8, 4 ) 
            . substr ( $chars, 12, 4 )
            . substr ( $chars, 16, 4 )
            . substr ( $chars, 20, 12 );
        return $prefix.$uuid ;
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
