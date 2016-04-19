<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    public function getUser()
    {
        return $this->belongsTo(\App\User::class);
    }
}
