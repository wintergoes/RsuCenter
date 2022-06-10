<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadLink extends Model
{
    function getTable() {
        return "roadlinks";
    }
}
