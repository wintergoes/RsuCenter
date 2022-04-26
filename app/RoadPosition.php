<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadPosition extends Model
{
    function getTable() {
        return "roadpositions";
    }
}
