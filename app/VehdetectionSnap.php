<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehdetectionSnap extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;    
    
    function getTable() {
        return "vehdetection_snap";
    }
}
