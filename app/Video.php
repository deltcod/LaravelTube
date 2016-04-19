<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['name', 'category', 'path'];

    public function getUser()
    {
        return $this->belongsTo(\App\User::class);
    }
}
