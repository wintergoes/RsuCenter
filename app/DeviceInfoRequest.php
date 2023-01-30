<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceInfoRequest extends Model
{
    function getTable() {
        return "device_info_request";
    }
}
