<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataApiClient extends Model
{
    function getTable() {
        return "dataapiclients";
    }
}
