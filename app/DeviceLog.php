<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceLog extends Model
{
    function getTable() {
        return "devicelogs";
    }
}
