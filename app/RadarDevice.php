<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadarDevice extends Model
{
    function getTable() {
        return "radardevices";
    }
}
