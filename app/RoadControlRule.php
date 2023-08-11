<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadControlRule extends Model
{
    function getTable() {
        return "roadcontrolrule";
    }
}
