<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    function getTable() {
        return "uploadfiles";
    }
}
