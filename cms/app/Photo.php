<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    public function imagetable() {

        return $this->morphTo();

    }
}
