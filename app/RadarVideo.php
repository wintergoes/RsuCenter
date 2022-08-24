<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadarVideo extends Model
{
    const UPDATED_AT = null;
    
    function getTable(){
        return "radarvideos";
    }
}
