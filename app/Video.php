<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['name', 'category', 'path', 'likes', 'dislikes'];

    public function getUser()
    {
        return $this->belongsTo(\App\User::class);
    }
}
