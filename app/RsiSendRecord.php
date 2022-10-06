<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RsiSendRecord extends Model
{
    function getTable() {
        return "rsisendrecords";
    }
}
