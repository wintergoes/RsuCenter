<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrafficSign extends Model
{
    function getTable() {
        return "trafficsigns";
    }
}
