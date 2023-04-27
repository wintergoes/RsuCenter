<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClockInFull extends Model
{
    function getTable() {
        return "clockinfull";
    }
}
