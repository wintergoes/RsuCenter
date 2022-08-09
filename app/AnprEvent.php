<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnprEvent extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;    
    
    function getTable() {
        return "anprevents";
    }
}
