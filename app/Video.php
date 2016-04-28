<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 *
 * @property $name
 * @property $category
 * @property $path
 * @property $likes
 * @property $dislikes
 *
 * @package App
 */

class Video extends Model
{
    protected $fillable = ['name', 'category', 'path', 'likes', 'dislikes'];

    public function getUser()
    {
        return $this->belongsTo(\App\User::class);
    }
}
