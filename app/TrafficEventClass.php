<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrafficEventClass extends Model
{
    function getTable() {
        return "trafficeventclasses";
    }
}
