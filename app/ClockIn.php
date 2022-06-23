<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClockIn extends Model
{
    function getTable() {
        return "clockins";
    }
}
