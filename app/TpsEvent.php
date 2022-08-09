<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TpsEvent extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;    
    
    function getTable() {
        return "tpsevents";
    }
}
