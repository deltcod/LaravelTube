<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Video.
 *
 * @property $name
 * @property $category
 * @property $path
 * @property $likes
 * @property $dislikes
 */
class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'category', 'path', 'user_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * Get likes/Dislikes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getLikesDislikes()
    {
        return $this->hasMany(\App\LikeDislike::class);
    }

    /**
     * Call scope likes.
     *
     * @return mixed
     */
    public function likes()
    {
        return $this->hasMany(\App\LikeDislike::class)->likes();
    }

    /**
     * Call scope dislikes.
     *
     * @return mixed
     */
    public function dislikes()
    {
        return $this->hasMany(\App\LikeDislike::class)->dislikes();
    }

    /**
     * Get comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getComments()
    {
        return $this->hasMany(\App\Comment::class);
    }
}
