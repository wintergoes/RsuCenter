<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarningInfo extends Model
{
    function getTable() {
        return "warninginfo";
    }
}
