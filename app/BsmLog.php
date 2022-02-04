<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BsmLog extends Model
{
    function getTable(){
        return "bsmlogs";
    }
}
