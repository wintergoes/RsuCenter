<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehDetection extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;    
    
    function getTable() {
        return "vehdetection";
    }
}
