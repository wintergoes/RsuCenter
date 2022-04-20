<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SysToken extends Model
{
    function getTable() {
        return "systokens";
    }
}
