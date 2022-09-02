<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrafficSignClass extends Model
{
    function getTable() {
        return "trafficsignclasses";
    }
}
