<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    function getTable() {
        return "forecast";
    }
}
