<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    function getTable() {
        return "roads";
    }
}
