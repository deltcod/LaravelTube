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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'category', 'path', 'likes', 'dislikes', 'user_id'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * Get User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(\App\User::class);
    }
}
