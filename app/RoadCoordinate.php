<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadCoordinate extends Model
{
    function getTable() {
        return "roadcoordinates";
    }
}
