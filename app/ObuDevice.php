<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObuDevice extends Model
{
    function getTable() {
        return "obudevices";
    }
}
