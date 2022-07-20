<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarningRecord extends Model
{
    const UPDATED_AT = null;
            
    function getTable() {
        return "warningrecords";
    }
}
