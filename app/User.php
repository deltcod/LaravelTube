<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @property int $id
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get videos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getVideos()
    {
        return $this->hasMany(\App\Video::class);
    }

    /**
     * Get ApiKey.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function apiKey()
    {
        return $this->hasOne('Chrisbjr\ApiGuard\Models\ApiKey');
    }

    /**
     * Get likes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getLikes()
    {
        return $this->hasMany(\App\LikeDislike::class);
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
